<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
	
	//protected array $cast = ["answer" => "json"];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
 