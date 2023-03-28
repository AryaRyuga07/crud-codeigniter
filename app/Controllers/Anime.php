<?php

namespace App\Controllers;

use \App\Models\AnimeModel;

class Anime extends BaseController
{
    protected $animeModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->animeModel = new AnimeModel();
    }
    
    public function index()
    {
        // $anime = $this->animeModel->findAll();
        $data = [
            'title' => 'Anime List',
            'anime' => $this->animeModel->getAnime()
        ];


        return view('anime/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detailed Anime',
            'anime' => $this->animeModel->getAnime($slug)
        ];

        if (empty($data['anime'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul anime ' . $slug . ' tidak ditemukan');
        }
        return view('anime/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add Anime',
            'validation' => \Config\Services::validation()
        ];

        return view('/Anime/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[tb_anime.judul]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} anime sudah terdaftar'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/Anime/create')->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true); 
        $this->animeModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'studio' => $this->request->getVar('studio'),
            'genre' => $this->request->getVar('genre'),
            'sampul' => $this->request->getVar('image'),
            'audio' => $this->request->getVar('audio')
        ]);

        session()->setFlashdata('pesan', 'Add Data Success');

        return redirect()->to('/anime');
    }

    public function delete($id)
    {
        $this->animeModel->delete($id);
        session()->setFlashdata('pesan', 'Delete Data Success');
        return redirect()->to('/anime');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Edit Anime',
            'validation' => \Config\Services::validation(),
            'anime' => $this->animeModel->getAnime($slug)
        ];

        return view('/Anime/edit', $data);
    }

    public function update($id)
    {
        $animeLama = $this->animeModel->getAnime($this->request->getVar('slug'));
        if ($animeLama['judul'] == $this->request->getVar('judul')) {
            $rules_judul = 'required';
        } else {
            $rules_judul = 'required|is_unique[tb_anime.judul]';
        }

        if (!$this->validate([
            'judul' => [
                'rules' => $rules_judul,
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} anime sudah terdaftar'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/Anime/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true); 
        $this->animeModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'studio' => $this->request->getVar('studio'),
            'genre' => $this->request->getVar('genre'),
            'sampul' => $this->request->getVar('image'),
            'audio' => $this->request->getVar('audio')
        ]);

        session()->setFlashdata('pesan', 'Update Data Success');

        return redirect()->to('/anime');
    }
}
