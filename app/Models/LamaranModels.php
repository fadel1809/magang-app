<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LamaranModels extends Model
{
    use HasFactory;
    protected $table = 'lamaran';
    protected $guarded = [];
    protected $fillable = ['cv_user', 'id_lowongan', 'title_lowongan', 'created_by', 'location', 'company', 'company_id', 'email_user'];

}