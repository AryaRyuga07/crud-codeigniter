<?php

namespace App\Controllers;

use \App\Models\MenuModel;

class Menu extends BaseController
{
    protected $menuModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->menuModel = new menuModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_menu') ? $this->request->getVar('page_menu') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $menu = $this->menuModel->search($keyword);
        } else {
            $menu = $this->menuModel;
        }

        $data = [
            'title' => 'Menu List',
            'menu' => $menu->paginate(10, 'menu'),
            'pager' => $this->menuModel->pager,
            'currentPage' => $currentPage
        ];

        return view('menu/index', $data);
    }
}
