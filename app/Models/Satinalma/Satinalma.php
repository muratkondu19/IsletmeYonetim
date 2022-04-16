<?php

namespace App\Models\Satinalma;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satinalma extends Model
{
    use HasFactory;
    protected $guarded=[];

    static function getSatinalma($id){
        $c= Satinalma::where('id',$id)->count();
        if($c!=0){
            $w=Satinalma::where('id',$id)->get();
            return $w[0]["satinalmaSiparisBelgeNo"];
        }else{
            return "#";
        }
    }

    static function getSatinalmaCount(){
        return Satinalma::count();
    }
}
