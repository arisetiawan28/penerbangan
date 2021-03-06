<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bandara extends Model
{
    use HasFactory;

    protected $table = "bandara";

    public function attributes()
    {
        return [
            'kode_bandara' => 'Kode Bandara',
            'nama_bandara' => 'Nama Bandara',
            'alamat_bandara' => 'Alamat',
            'created_at' => 'Dibuat oleh',
            'updated_at' => 'Diperbaharui oleh',
        ];
    }
}
