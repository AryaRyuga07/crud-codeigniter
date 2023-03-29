<?php
namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'menu';
    protected $useTimeStamps = true;
    protected $allowedFields = ['nama', 'jenis'];

    public function search($keyword)
    {
        // $builder = $this->table('menu');
        // $builder->like('nama', $keyword);
        // return $builder;

        return $this->table('menu')->like('nama', $keyword)->orlike('jenis', $keyword);
    }
}

?>