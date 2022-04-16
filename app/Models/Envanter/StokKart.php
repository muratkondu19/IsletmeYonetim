<?php

namespace App\Models\Envanter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokKart extends Model
{
    use HasFactory;
    protected $guarded=[];

    static function getStokAd($id){
        $c= StokKart::where('id',$id)->count();
        if($c!=0){
            $w=StokKart::where('id',$id)->get();
            return $w[0]["stokAd"];
        }else{
            return "#";
        }
    }

    static function getStokKod($id){
        $c= StokKart::where('id',$id)->count();
        if($c!=0){
            $w=StokKart::where('id',$id)->get();
            return $w[0]["stokKod"];
        }else{
            return "#";
        }
    }

    static function getStokBirim($id){
        $c= StokKart::where('id',$id)->count();
        if($c!=0){
            $w=StokKart::where('id',$id)->get();
            return $w[0]["stokBirim"];
        }else{
            return "#";
        }
    }

    static function getStokAdKod($kod){
        $c= StokKart::where('stokKod',$kod)->count();
        if($c!=0){
            $w=StokKart::where('stokKod',$kod)->get();
            return $w[0]["stokAd"];
        }else{
            return "#";
        }
    }
}
