<?php

namespace App\Models\Envanter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depo extends Model
{
    use HasFactory;
    protected $guarded=[];

    static function getDepoAd($id){
        $c= Depo::where('id',$id)->count();
        if($c!=0){
            $w=Depo::where('id',$id)->get();
            return $w[0]["depoAd"];
        }else{
            return "#";
        }
    }

    static function getDepoKod($id){
        $c= Depo::where('id',$id)->count();
        if($c!=0){
            $w=Depo::where('id',$id)->get();
            return $w[0]["depoKod"];
        }else{
            return "#";
        }
    }

    
}
