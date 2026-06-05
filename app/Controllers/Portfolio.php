<?php

namespace App\Controllers;

use App\Models\PortfolioModel;
use App\Models\TechStackModel;
use App\Models\ClientModel;

class Portfolio extends BaseController
{
    public function index()
    {
        $portfolioModel = new PortfolioModel();
        $techStackModel = new TechStackModel();
        
        // Get data from database
        $portfolios = $portfolioModel->findAll();
        $tech_stacks = $techStackModel->findAll();
        
        // If no data in database, use default data
        if(empty($portfolios)) {
            $portfolios = $this->getDefaultPortfolios();
        }
        
        if(empty($tech_stacks)) {
            $tech_stacks = $this->getDefaultTechStacks();
        }
        
        $data = [
            'portfolios' => $portfolios,
            'tech_stacks' => $tech_stacks,
            'certifications' => $this->getCertifications(),
            'skills' => $this->getSkills(),
            'experiences' => $this->getExperiences(),
            'education' => $this->getEducation(),
            'projects' => $this->getProjects(),
            'contact_info' => $this->getContactInfo()
        ];
        
        return view('portfolio/index', $data);
    }
    
    private function getDefaultPortfolios()
    {
        return [
            [
                'id' => 1,
                'title' => 'Aplikasi E-Learning Android',
                'category' => 'android',
                'description' => 'Aplikasi mobile learning dengan fitur video streaming, kuis interaktif, dan sertifikasi.',
                'image' => 'https://via.placeholder.com/400x300',
                'technologies' => 'Kotlin, Firebase, Retrofit',
                'project_url' => '#'
            ],
            [
                'id' => 2,
                'title' => 'Sistem Informasi Prodi SIIO',
                'category' => 'web',
                'description' => 'Website manajemen akademik untuk program studi Sistem Informasi',
                'image' => 'https://via.placeholder.com/400x300',
                'technologies' => 'PHP, Laravel, MySQL',
                'project_url' => '#'
            ],
            [
                'id' => 3,
                'title' => 'E-Ticketing System',
                'category' => 'web',
                'description' => 'Sistem tiket online untuk event management',
                'image' => 'https://via.placeholder.com/400x300',
                'technologies' => 'CodeIgniter 4, JavaScript, MySQL',
                'project_url' => '#'
            ]
        ];
    }
    
    private function getDefaultTechStacks()
    {
        return [
            ['name' => 'Android Studio', 'category' => 'tools', 'icon' => 'android', 'level' => 5],
            ['name' => 'Kotlin', 'category' => 'mobile', 'icon' => 'code', 'level' => 4],
            ['name' => 'PHP', 'category' => 'backend', 'icon' => 'php', 'level' => 5],
            ['name' => 'Laravel', 'category' => 'backend', 'icon' => 'laravel', 'level' => 4],
            ['name' => 'CodeIgniter', 'category' => 'backend', 'icon' => 'code', 'level' => 5],
            ['name' => 'React', 'category' => 'frontend', 'icon' => 'react', 'level' => 3],
            ['name' => 'MySQL', 'category' => 'backend', 'icon' => 'database', 'level' => 5],
            ['name' => 'Git', 'category' => 'tools', 'icon' => 'git-alt', 'level' => 4]
        ];
    }
    
    private function getCertifications()
    {
        return [
            ['name' => 'Back-End Developer', 'provider' => 'DBS Foundation', 'date' => 'Sep 2024'],
            ['name' => 'Full Stack Web Development', 'provider' => 'Harisenin Coding Camp', 'date' => '2024'],
            ['name' => 'Meta Android Developer', 'provider' => 'Coursera', 'date' => 'Aug 2023'],
            ['name' => 'IT Support Google Specialization', 'provider' => 'Coursera', 'date' => 'Aug 2023'],
            ['name' => 'Mobile Development and JavaScript', 'provider' => 'Coursera', 'date' => 'Aug 2023']
        ];
    }
    
    private function getSkills()
    {
        return [
            'tools' => ['Android Studio', 'Visual Studio Code', 'XAMPP', 'Postman', 'GitHub & Git'],
            'backend' => ['Node.js (Express)', 'PHP (Native, Laravel, CodeIgniter)', 'RESTful API Design & Development', 'MySQL (Database Design, Query Optimization)'],
            'frontend' => ['HTML5', 'CSS3', 'Bootstrap', 'JavaScript (Vanilla, jQuery, AJAX)', 'Kotlin & Java', 'XML Layout Design', 'Retrofit (API Integration)', 'React'],
            'system' => ['Server configuration & maintenance', 'Database administration', 'API integration', 'System troubleshooting', 'Administrative management'],
            'productivity' => ['Microsoft Office (Excel, Word, PowerPoint)'],
            'softskills' => ['Problem-solving', 'Teamwork', 'Time Management', 'Attention to Detail', 'Communication', 'Adaptability', 'Discipline', 'Able to work in shifts']
        ];
    }
    
    private function getExperiences()
    {
        return [
            [
                'title' => 'Mobile Developer', 
                'company' => 'PT Wahana Makmur Sejati', 
                'duration' => '1 tahun', 
                'description' => 'Mengembangkan dan memelihara aplikasi mobile Android menggunakan Kotlin dan Java. Berkolaborasi dengan tim backend untuk integrasi API menggunakan Retrofit. Melakukan debugging dan optimasi performa aplikasi.'
            ],
            [
                'title' => 'Fullstack Developer', 
                'company' => 'Kontrak - Various Projects', 
                'duration' => '6 bulan', 
                'description' => 'Pengembangan web fullstack menggunakan Laravel dan React. Membangun RESTful API, database design, dan implementasi fitur real-time. Menangani deployment dan maintenance server.'
            ]
        ];
    }
    
    private function getEducation()
    {
        return [
            ['degree' => 'S1 Sistem Informasi', 'university' => 'Universitas Contoh', 'year' => '2020-2024']
        ];
    }
    
    private function getProjects()
    {
        return [
            ['name' => 'Website Prodi SIIO', 'tech' => 'PHP, Laravel, MySQL', 'type' => 'web', 'description' => 'Sistem informasi akademik prodi Sistem Informasi'],
            ['name' => 'Website Prodi TRO', 'tech' => 'CodeIgniter, MySQL, Bootstrap', 'type' => 'web', 'description' => 'Portal informasi prodi Teknologi Radiologi'],
            ['name' => 'Website Prodi TIO', 'tech' => 'Node.js, Express, MongoDB', 'type' => 'web', 'description' => 'Website manajemen inventaris prodi Teknik Instrumentasi'],
            ['name' => 'Website Prodi TKP', 'tech' => 'Python, Django, PostgreSQL', 'type' => 'web', 'description' => 'Sistem monitoring prodi Teknik Keselamatan Penerbangan'],
            ['name' => 'Website Prodi ABO', 'tech' => 'React, Laravel, MySQL', 'type' => 'web', 'description' => 'Aplikasi manajemen data prodi Analisa Bahan Organik'],
            ['name' => 'Website LSP', 'tech' => 'PHP Native, JavaScript', 'type' => 'web', 'description' => 'Website Lembaga Sertifikasi Profesi untuk ujian kompetensi'],
            ['name' => 'Website SPM', 'tech' => 'CodeIgniter 4, AJAX', 'type' => 'web', 'description' => 'Sistem Penilaian Mandiri untuk evaluasi kinerja'],
            ['name' => 'Assessment TVET', 'tech' => 'Laravel, Vue.js, MySQL', 'type' => 'web', 'description' => 'Platform assessment untuk pendidikan vokasi'],
            ['name' => 'Website E-Ticketing', 'tech' => 'PHP, MySQL, Bootstrap', 'type' => 'web', 'description' => 'Sistem pemesanan tiket online untuk event'],
            ['name' => 'Android E-Learning', 'tech' => 'Kotlin, Firebase, Firebase Storage', 'type' => 'android', 'description' => 'Aplikasi mobile learning dengan materi multimedia']
        ];
    }
    
    private function getContactInfo()
    {
        return [
            'address' => 'Jakarta Utara, Indonesia',
            'phone' => '+62 895-1618-9819',
            'email' => 'finti.sasa.sabila@gmail.com'
        ];
    }
    
    public function submitInterest()
    {
        $clientModel = new ClientModel();
        
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'service_interest' => $this->request->getPost('service'),
            'message' => $this->request->getPost('message'),
            'status' => 'new',
            'created_at' => date('Y-m-d H:i:s')
        ];
        
        // Validate
        if (!$clientModel->validate($data)) {
            return redirect()->to('/#contact')->with('error', implode(', ', $clientModel->errors()));
        }
        
        if ($clientModel->insert($data)) {
            return redirect()->to('/#contact')->with('success', 'Terima kasih! Kami akan menghubungi Anda segera.');
        }
        
        return redirect()->to('/#contact')->with('error', 'Gagal mengirim pesan. Silakan coba lagi.');
    }
}