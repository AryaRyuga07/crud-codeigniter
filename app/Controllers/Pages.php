<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | CodeIgniter',
            'test' => ['satu', 'dua', 'tiga']
        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About | CodeIgniter',
        ];
        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact | CodeIgniter',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jln Kemayoran No 321',
                    'kota' => 'Bogor'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jln Kehidupan No 212',
                    'kota' => 'Bekasi'
                ]
            ]
        ];
        return view('pages/contact', $data);
    }
}
