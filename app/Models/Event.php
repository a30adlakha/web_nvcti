<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'form_link',
        'pdf_link',
        'category',
        'tags',
        'image_path',
        // 'title',
        // 'links',
        // 'otherlinks',
        'description'
    ];
}
