<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penumpang extends Model
{
    use HasFactory;

    protected $table = "penumpang";

    public function attributes()
    {
        return [
            'penerbangan_id' => 'Penerbangan',
            'nama' => 'Nama Penumpang',
            'no_ktp' => 'No KTP',
            'alamat' => 'Alamat',
            'created_by' => 'Dibuat oleh',
            'updated_by' => 'Diperbaharui oleh',
        ];
    }
}
