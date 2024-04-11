<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lessons(){
        #if does not have foreign key is has many
        # when have foreign key is belongs to
        return $this->hasMany(Lesson::class);
    }
}
