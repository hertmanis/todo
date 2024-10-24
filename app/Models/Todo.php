<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    // This ensures that the 'title' field can be mass assigned
    protected $fillable = ['title'];

    // Optionally, you can add any relationships or custom methods below
}
