<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompaniesModel extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $guarded = ['id'];
    protected $hidden = ['password'];
    public $timestamps = false;
    protected $fillable = ['id', 'nama', 'email', 'password', 'location', 'notelp', 'companyName', 'companyProfile'];
}