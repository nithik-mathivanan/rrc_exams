<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jee extends Model
{
    use HasFactory;
    protected $table = 'jee_mark';
    public function getExam(){
        return $this->hasOne('App\Models\JeeName','id','exam');
        }
}
