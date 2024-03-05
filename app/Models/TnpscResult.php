<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TnpscResult extends Model
{
    use HasFactory;
    protected $table = 'tnpsc_result';

    public function getExam(){
        return $this->hasOne('App\Models\TnpscName','id','exam');
        }
}
