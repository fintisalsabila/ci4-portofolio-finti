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
        
        $data = [
            'portfolios' => $portfolioModel->findAll(),
            'tech_stacks' => $techStackModel->findAll(),
            'certifications' => $this->getCertifications(),
            'skills' => $this->getSkills(),
            'experiences' => $this->getExperiences(),
            'freelance_projects' => $this->getFreelanceProjects(),
            'education' => $this->getEducation(),
            'projects' => $this->getProjects(),
            'contact_info' => $this->getContactInfo()
        ];
        
        return view('portfolio/index', $data);
    }
    
    private function getExperiences()
    {
        return [
            [
                'title' => 'Mobile Application Developer', 
                'company' => 'PT Wahana Makmur Sejati', 
                'period' => 'Maret 2024 - Februari 2025',
                'duration' => '1 Tahun',
                'description' => [
                    'Mengembangkan aplikasi Android Audit Tools Mekanik yang mengurangi penggunaan formulir manual hingga 80%',
                    'Membangun aplikasi Android Order Tools Mekanik untuk mempermudah pemesanan alat dan mempercepat respon hingga 40%',
                    'Mengembangkan aplikasi Android Pendaftaran Training Mekanik guna menggantikan proses manual dan mencegah duplikasi data',
                    'Merancang Web Services (Node.js + MySQL) untuk sistem pendaftaran training dengan integrasi mobile-backend',
                    'Berkolaborasi dengan Departemen Technical Training agar aplikasi sesuai kebutuhan operasional'
                ]
            ],
            [
                'title' => 'Web Developer - Freelance', 
                'company' => 'Various Clients', 
                'period' => 'Agustus 2021 - Saat ini',
                'duration' => '3+ Tahun',
                'description' => [
                    'Mengembangkan web sistem KPI karyawan untuk PT DKB dengan fitur input penilaian, sub-kriteria, perhitungan bobot, dan hasil akhir',
                    'Membangun web administrasi gereja dengan fitur pendaftaran baptis, jemaat baru, dan jemaat keluar',
                    'Membuat portal berita berbasis PHP Native dengan fitur manajemen artikel, kategori, dan editor konten',
                    'Mendesain web administrasi servis motor dengan fitur booking service, riwayat perbaikan, dan manajemen pelanggan',
                    'Menggunakan PHP, MySQL, JavaScript, Laravel, CodeIgniter, dan Bootstrap'
                ]
            ],
            [
                'title' => 'Web Developer - Project Based Learning', 
                'company' => 'Academic Projects', 
                'period' => '2023',
                'duration' => '1 Tahun',
                'description' => [
                    'Membangun web pendaftaran mahasiswa baru dengan fitur registrasi online, validasi data, dan cetak bukti pendaftaran',
                    'Mengembangkan web e-Ticketing untuk pemesanan dan monitoring layanan servis ruang kelas',
                    'Mengerjakan aplikasi Android pengadaan barang dengan fitur permintaan, persetujuan prodi, manajemen stok, dan pelaporan',
                    'Mengintegrasikan API antara web dan Android menggunakan Retrofit dan MySQL',
                    'Berperan sebagai Back End Developer dengan tanggung jawab backend (PHP/Node.js) dan integrasi database'
                ]
            ]
        ];
    }
    
    private function getFreelanceProjects()
    {
        return [
            ['name' => 'Sistem KPI Karyawan PT DKB', 'tech' => 'PHP, MySQL, JavaScript', 'description' => 'Sistem penilaian kinerja dengan input penilaian, sub-kriteria, perhitungan bobot, dan hasil akhir'],
            ['name' => 'Web Administrasi Gereja', 'tech' => 'CodeIgniter, MySQL', 'description' => 'Pendaftaran baptis, jemaat baru, dan jemaat keluar'],
            ['name' => 'Portal Berita', 'tech' => 'PHP Native, MySQL', 'description' => 'Manajemen artikel, kategori, dan editor konten'],
            ['name' => 'Web Servis Motor', 'tech' => 'Laravel, Bootstrap', 'description' => 'Booking service, riwayat perbaikan, manajemen pelanggan']
        ];
    }
    
    private function getCertifications()
    {
        return [
            ['name' => 'Back-End Developer', 'provider' => 'DBS Foundation', 'date' => 'Sep 2024', 'icon' => 'blue'],
            ['name' => 'Full Stack Web Development', 'provider' => 'Harisenin Coding Camp', 'date' => '2024', 'icon' => 'green'],
            ['name' => 'Meta Android Developer', 'provider' => 'Coursera', 'date' => 'Aug 2023', 'icon' => 'purple'],
            ['name' => 'IT Support Google Specialization', 'provider' => 'Coursera', 'date' => 'Aug 2023', 'icon' => 'blue'],
            ['name' => 'Mobile Development and JavaScript', 'provider' => 'Coursera', 'date' => 'Aug 2023', 'icon' => 'green']
        ];
    }
    
    private function getSkills()
    {
        return [
            'tools' => ['Android Studio', 'Visual Studio Code', 'XAMPP', 'Postman', 'GitHub & Git'],
            'backend' => ['Node.js (Express)', 'PHP (Native, Laravel, CodeIgniter)', 'RESTful API Design', 'MySQL Database', 'Query Optimization'],
            'frontend' => ['HTML5', 'CSS3', 'Bootstrap', 'JavaScript', 'jQuery', 'AJAX', 'React'],
            'mobile' => ['Kotlin', 'Java', 'XML Layout Design', 'Retrofit', 'MVVM', 'Firebase'],
            'system' => ['Server Configuration', 'Database Administration', 'API Integration', 'System Troubleshooting'],
            'softskills' => ['Problem-solving', 'Teamwork', 'Time Management', 'Attention to Detail', 'Communication', 'Adaptability', 'Discipline', 'Shift Work']
        ];
    }
    
    private function getEducation()
    {
        return [
            ['degree' => 'D3/S1 Informatika/Teknologi Informasi', 'university' => 'Universitas/Politeknik Jakarta', 'year' => '2020-2024', 'icon' => 'university'],
            ['degree' => 'Full Stack Web Development', 'university' => 'Harisenin Coding Camp', 'year' => 'Bootcamp Intensif', 'icon' => 'code'],
            ['degree' => 'Back-End Development', 'university' => 'DBS Foundation', 'year' => 'Sep 2024', 'icon' => 'graduation-cap']
        ];
    }
    
    private function getProjects()
    {
        return [
            ['name' => 'Website Prodi SIIO', 'tech' => 'CodeIgniter 4, PHP, MySQL, Bootstrap', 'type' => 'web', 'description' => 'Sistem Informasi dan Otomasi - website resmi program studi dengan fitur informasi akademik'],
            ['name' => 'Website Prodi TRO', 'tech' => 'Laravel, PHP, MySQL, Tailwind', 'type' => 'web', 'description' => 'Teknik Rekayasa Otomasi - website dengan manajemen konten dan galeri kegiatan'],
            ['name' => 'Website Prodi TIO', 'tech' => 'CodeIgniter 4, MySQL, Bootstrap', 'type' => 'web', 'description' => 'Teknik Informatika dan Otomasi - portal informasi akademik terintegrasi'],
            ['name' => 'Website Prodi TKP', 'tech' => 'PHP, MySQL, Bootstrap', 'type' => 'web', 'description' => 'Teknik Konstruksi - manajemen konten berita dan informasi akademik'],
            ['name' => 'Website Prodi ABO', 'tech' => 'Laravel, MySQL, Bootstrap', 'type' => 'web', 'description' => 'Administrasi Bisnis Online - portal informasi mahasiswa dan manajemen berita'],
            ['name' => 'Web LSP', 'tech' => 'CodeIgniter 4, MySQL, Bootstrap, AJAX', 'type' => 'fullstack', 'description' => 'Lembaga Sertifikasi Profesi - sistem manajemen sertifikasi dengan pendaftaran peserta'],
            ['name' => 'Web SPM', 'tech' => 'Laravel, MySQL, Chart.js, Bootstrap', 'type' => 'fullstack', 'description' => 'Sistem Penjaminan Mutu - dashboard monitoring akreditasi'],
            ['name' => 'Assessment TVET', 'tech' => 'CodeIgniter 4, MySQL, jQuery', 'type' => 'fullstack', 'description' => 'Platform penilaian kompetensi TVET dengan ujian online'],
            ['name' => 'Web E-Ticketing', 'tech' => 'Laravel, MySQL, QR Code, Midtrans', 'type' => 'fullstack', 'description' => 'Sistem tiket elektronik dengan pembelian online dan verifikasi QR'],
            ['name' => 'Android E-Learning', 'tech' => 'Kotlin, Retrofit, Firebase', 'type' => 'android', 'description' => 'Aplikasi e-learning dengan materi multimedia dan kuis interaktif']
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
        
        if ($clientModel->insert($data)) {
            return redirect()->to('/#contact')->with('success', 'Terima kasih! Kami akan menghubungi Anda segera.');
        }
        
        return redirect()->to('/#contact')->with('error', 'Gagal mengirim pesan. Silakan coba lagi.');
    }
}