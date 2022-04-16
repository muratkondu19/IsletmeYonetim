<?php

namespace App\Models\Muhasebe;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cari extends Model
{
    use HasFactory;
    protected $guarded=[];

    static function getCariAd($id){
        $c= Cari::where('id',$id)->count();
        if($c!=0){
            $w=Cari::where('id',$id)->get();
            return $w[0]["cariAd"];
        }else{
            return "#";
        }
    }

    static function getCariKod($id){
        $c= Cari::where('id',$id)->count();
        if($c!=0){
            $w=Cari::where('id',$id)->get();
            return $w[0]["cariKod"];
        }else{
            return "#";
        }
    }

    static function getCariMHK($id){
        $c= Cari::where('id',$id)->count();
        if($c!=0){
            $w=Cari::where('id',$id)->get();
            $hk= $w[0]["cariMHK"];
            $h=HesapKod::where('id',$hk)->get();
            return $h[0]["hesapKod"];
        }else{
            return "#";
        }
    }

    static function getCariCount(){
        return Cari::count();
    }

}
