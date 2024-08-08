<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable =['nama','jeniskel','tempatlahir','tanggallahir','alamat','foto_profile','id_user','statusAkun','statusMahasiswa','noktp'];
}
