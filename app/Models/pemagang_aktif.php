<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemagang_aktif extends Model
{
    use HasFactory;
    protected $table = 'pemagang_aktif';
    protected $guarded = [];
    protected $fillable = ['id_company', 'id_lamaran', 'id_user', 'username', 'companyname', 'email_user', 'posisi'];

}