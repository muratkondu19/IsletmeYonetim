<?php

namespace App\Models\Urun;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operasyon extends Model
{
    use HasFactory;
    protected $guarded=[];

    static function getOperasyonAdKod($kod){
        $c= Operasyon::where('operasyonKod',$kod)->count();
        if($c!=0){
            $w=Operasyon::where('operasyonKod',$kod)->get();
            return $w[0]["operasyonAd"];
        }else{
            return "#";
        }
    }

    static function getOperasyonAd($id){
        $c= Operasyon::where('id',$id)->count();
        if($c!=0){
            $w=Operasyon::where('id',$id)->get();
            return $w[0]["operasyonAd"];
        }else{
            return "#";
        }
    }

}
