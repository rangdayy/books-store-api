<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    use HasFactory;
    public  $timestamps = false;
    protected $dateFormat = 'Y-m-d';
    protected $table = 'books';
    protected $fillable = ['title', 'author', 'release_date', 'publisher','preview', 'img', 'genre'];
}
