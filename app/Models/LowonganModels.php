<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LowonganModels extends Model
{
    use HasFactory;
    protected $table = 'lowongan';
    protected $fillable = ['title', 'description', 'created_by', 'name', 'profile', 'location'];
    protected $guarded = [];
}