<?php
namespace App\Models;

use CodeIgniter\Model;

class AnimeModel extends Model
{
    protected $table = 'tb_anime';
    protected $useTimeStamps = true;
    protected $allowedFields = ['judul','slug', 'studio', 'genre', 'sampul', 'audio'];

    public function getAnime($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}

?>