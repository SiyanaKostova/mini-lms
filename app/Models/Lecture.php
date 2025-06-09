<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lecture extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'order', 'description', 'youtube_url'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}