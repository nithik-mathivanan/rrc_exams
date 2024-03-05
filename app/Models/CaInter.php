<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaInter extends Model
{
    use HasFactory;
    protected $table = 'ca_inter';
     public function getCaInter(){
        return $this->hasOne('App\Models\CaExam','id','exam');
        }
}
