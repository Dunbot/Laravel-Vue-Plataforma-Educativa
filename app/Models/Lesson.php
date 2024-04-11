<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categories(){
        #many2many relationship
        return $this->belongsToMany(Category::class);
    }

    public function level(){
        $this->belongsTo(Level::class);
    }
}
