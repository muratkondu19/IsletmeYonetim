<?php

namespace App\Models\Envanter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokHareket extends Model
{
    use HasFactory;
    protected $guarded=[];

    static function getHareketDurum($id){
        $c= StokHareket::where('id',$id)->count();
        if($c!=0){
            $w=StokHareket::where('id',$id)->get();
            return $w[0]["stokHareketDurum"];
        }else{
            return "#";
        }
    }

    static function getStokCount(){
        return StokKart::count();
    }

    static function getDepoCount(){
        return Depo::count();
    }

    static function getToplamÇıkı(){
        return StokHareket::where('stokHareketDurum','Çıktı')->sum('stokHareketToplamTutar');
    }

    static function getToplamGirdi(){
        return StokHareket::where('stokHareketDurum','Girdi')->sum('stokHareketToplamTutar');
    }
}
