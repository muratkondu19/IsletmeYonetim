<?php

namespace App\Models\Urun;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Isistasyon extends Model
{
    use HasFactory;
    protected $guarded=[];

    static function getIstasyonAdKod($kod){
        $c= Isistasyon::where('isistasyonKod',$kod)->count();
        if($c!=0){
            $w=Isistasyon::where('isistasyonKod',$kod)->get();
            return $w[0]["isistasyonAd"];
        }else{
            return "#";
        }
    }

    static function getIsistasyonAd($id){
        $c= Isistasyon::where('id',$id)->count();
        if($c!=0){
            $w=Isistasyon::where('id',$id)->get();
            return $w[0]["isistasyonAd"];
        }else{
            return "#";
        }
    }
}
