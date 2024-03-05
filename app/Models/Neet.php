<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Neet extends Model
{
    use HasFactory;
    protected $table = 'neet_mark';
    public function getExam(){
        return $this->hasOne('App\Models\NeetName','id','exam');
        }
}
