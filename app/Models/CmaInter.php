<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmaInter extends Model
{
    use HasFactory;
    protected $table = 'cma_inter';
     public function getCmaInter(){
        return $this->hasOne('App\Models\CaExam','id','exam');
        }
}
