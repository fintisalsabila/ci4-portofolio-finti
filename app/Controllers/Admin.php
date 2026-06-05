<?php

namespace App\Controllers;

use App\Models\PortfolioModel;
use App\Models\ClientModel;
use App\Models\TechStackModel;

class Admin extends BaseController
{
    public function index()
    {
        $portfolioModel = new PortfolioModel();
        $clientModel = new ClientModel();
        
        $data = [
            'total_portfolios' => $portfolioModel->countAll(),
            'total_clients' => $clientModel->where('status', 'new')->countAllResults(),
            'portfolios' => $portfolioModel->findAll(5),
            'clients' => $clientModel->where('status', 'new')->findAll(5)
        ];
        
        return view('admin/dashboard', $data);
    }
    
    public function portfolios()
    {
        $portfolioModel = new PortfolioModel();
        $data['portfolios'] = $portfolioModel->findAll();
        return view('admin/portfolios', $data);
    }
    
    public function clients()
    {
        $clientModel = new ClientModel();
        $data['clients'] = $clientModel->findAll();
        return view('admin/clients', $data);
    }
    
    public function savePortfolio()
    {
        $portfolioModel = new PortfolioModel();
        
        $data = [
            'title' => $this->request->getPost('title'),
            'category' => $this->request->getPost('category'),
            'description' => $this->request->getPost('description'),
            'technologies' => $this->request->getPost('technologies'),
            'project_url' => $this->request->getPost('project_url')
        ];
        
        // Handle image upload
        $file = $this->request->getFile('image');
        if($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/portfolio', $newName);
            $data['image'] = 'uploads/portfolio/' . $newName;
        }
        
        if($portfolioModel->save($data)) {
            return redirect()->to('/admin/portfolios')->with('success', 'Portfolio saved successfully');
        }
        
        return redirect()->back()->with('error', 'Failed to save portfolio');
    }
}