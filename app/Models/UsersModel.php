<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'password', 'name', 'school', 'location', 'notelp'];
    protected $table = 'users';
    protected $guarded = [];
    protected $hidden = ['password'];
    public $timestamps = false;
}