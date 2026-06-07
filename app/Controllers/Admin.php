<?php

namespace App\Controllers;

use App\Models\ProjectModel;
use App\Models\SkillModel;
use App\Models\CertificationModel;
use App\Models\ExperienceModel;
use App\Models\InquiryModel;
use App\Models\SettingModel;
use App\Models\UserModel;

class Admin extends BaseController
{
    private $projectModel;
    private $skillModel;
    private $certModel;
    private $expModel;
    private $inquiryModel;
    private $settingModel;
    private $userModel;
    
    public function __construct()
    {
        if (!session()->get('isLoggedIn')) {
            exit(redirect()->to('/auth/login'));
        }
        
        $this->projectModel = new ProjectModel();
        $this->skillModel = new SkillModel();
        $this->certModel = new CertificationModel();
        $this->expModel = new ExperienceModel();
        $this->inquiryModel = new InquiryModel();
        $this->settingModel = new SettingModel();
        $this->userModel = new UserModel();
    }
    
    public function index()
    {
        $data = [
            'total_projects' => $this->projectModel->countAll(),
            'total_inquiries' => $this->inquiryModel->where('status', 'new')->countAllResults(),
            'total_clients' => $this->inquiryModel->countAll(),
            'total_certs' => $this->certModel->countAll(),
            'recent_inquiries' => $this->inquiryModel->orderBy('created_at', 'DESC')->limit(5)->findAll(),
            'projects' => $this->projectModel->orderBy('order', 'ASC')->findAll(),
            'skills' => $this->skillModel->orderBy('order', 'ASC')->findAll(),
            'certifications' => $this->certModel->orderBy('issue_date', 'DESC')->findAll(),
            'experiences' => $this->expModel->orderBy('order', 'DESC')->findAll(),
            'all_inquiries' => $this->inquiryModel->orderBy('created_at', 'DESC')->findAll(),
            'settings' => $this->settingModel->getAllSettings(),
            'user' => $this->userModel->find(session()->get('user_id'))
        ];
        
        return view('admin/index', $data);
    }
    
    // API Methods for AJAX calls
    public function saveProject()
    {
        $data = [
            'title' => $this->request->getPost('title'),
            'category' => $this->request->getPost('category'),
            'description' => $this->request->getPost('description'),
            'tech_stack' => $this->request->getPost('tech_stack'),
            'demo_url' => $this->request->getPost('demo_url'),
            'github_url' => $this->request->getPost('github_url'),
            'status' => $this->request->getPost('status'),
            'order' => $this->request->getPost('order', 0)
        ];
        
        if ($this->projectModel->insert($data)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Project saved']);
        }
        return $this->response->setJSON(['success' => false, 'message' => 'Failed to save']);
    }
    
    public function updateProject($id)
    {
        $data = $this->request->getPost();
        if ($this->projectModel->update($id, $data)) {
            return $this->response->setJSON(['success' => true]);
        }
        return $this->response->setJSON(['success' => false]);
    }
    
    public function deleteProject($id)
    {
        if ($this->projectModel->delete($id)) {
            return $this->response->setJSON(['success' => true]);
        }
        return $this->response->setJSON(['success' => false]);
    }
    
    public function saveSkill()
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'category' => $this->request->getPost('category'),
            'level' => $this->request->getPost('level'),
            'order' => $this->request->getPost('order', 0)
        ];
        
        if ($this->skillModel->insert($data)) {
            return $this->response->setJSON(['success' => true]);
        }
        return $this->response->setJSON(['success' => false]);
    }
    
    public function deleteSkill($id)
    {
        if ($this->skillModel->delete($id)) {
            return $this->response->setJSON(['success' => true]);
        }
        return $this->response->setJSON(['success' => false]);
    }
    
    public function saveCertification()
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'issuer' => $this->request->getPost('issuer'),
            'issue_date' => $this->request->getPost('issue_date'),
            'expiry_date' => $this->request->getPost('expiry_date'),
            'credential_url' => $this->request->getPost('credential_url'),
            'icon' => $this->request->getPost('icon', 'blue'),
            'order' => $this->request->getPost('order', 0)
        ];
        
        if ($this->certModel->insert($data)) {
            return $this->response->setJSON(['success' => true]);
        }
        return $this->response->setJSON(['success' => false]);
    }
    
    public function deleteCertification($id)
    {
        if ($this->certModel->delete($id)) {
            return $this->response->setJSON(['success' => true]);
        }
        return $this->response->setJSON(['success' => false]);
    }
    
    public function saveExperience()
    {
        $data = [
            'company' => $this->request->getPost('company'),
            'position' => $this->request->getPost('position'),
            'type' => $this->request->getPost('type'),
            'start_date' => $this->request->getPost('start_date'),
            'end_date' => $this->request->getPost('end_date'),
            'is_current' => $this->request->getPost('is_current', 0),
            'description' => $this->request->getPost('description'),
            'order' => $this->request->getPost('order', 0)
        ];
        
        if ($this->expModel->insert($data)) {
            return $this->response->setJSON(['success' => true]);
        }
        return $this->response->setJSON(['success' => false]);
    }
    
    public function deleteExperience($id)
    {
        if ($this->expModel->delete($id)) {
            return $this->response->setJSON(['success' => true]);
        }
        return $this->response->setJSON(['success' => false]);
    }
    
    public function updateInquiryStatus($id)
    {
        $status = $this->request->getPost('status');
        if ($this->inquiryModel->update($id, ['status' => $status])) {
            return $this->response->setJSON(['success' => true]);
        }
        return $this->response->setJSON(['success' => false]);
    }
    
    public function deleteInquiry($id)
    {
        if ($this->inquiryModel->delete($id)) {
            return $this->response->setJSON(['success' => true]);
        }
        return $this->response->setJSON(['success' => false]);
    }
    
    public function updateProfile()
    {
        $settings = [
            'fullname' => $this->request->getPost('fullname'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'location' => $this->request->getPost('location'),
            'bio' => $this->request->getPost('bio'),
            'github_url' => $this->request->getPost('github_url'),
            'linkedin_url' => $this->request->getPost('linkedin_url')
        ];
        
        foreach ($settings as $key => $value) {
            $this->settingModel->set($key, $value);
        }
        
        return redirect()->to('/admin')->with('success', 'Profile updated successfully');
    }
    
    public function changePassword()
    {
        $user = $this->userModel->find(session()->get('user_id'));
        $oldPassword = $this->request->getPost('old_password');
        $newPassword = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');
        
        if (!password_verify($oldPassword, $user['password'])) {
            return redirect()->back()->with('error', 'Current password is incorrect');
        }
        
        if ($newPassword !== $confirmPassword) {
            return redirect()->back()->with('error', 'New passwords do not match');
        }
        
        if (strlen($newPassword) < 6) {
            return redirect()->back()->with('error', 'Password must be at least 6 characters');
        }
        
        $this->userModel->update($user['id'], ['password' => password_hash($newPassword, PASSWORD_BCRYPT)]);
        return redirect()->to('/admin')->with('success', 'Password changed successfully');
    }
}