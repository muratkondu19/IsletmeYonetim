<?php

namespace App\Models\Muhasebe;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HesapKod extends Model
{
    use HasFactory;
    protected $guarded=[];

    static function getHesapNo($id){
        $c= HesapKod::where('id',$id)->count();
        if($c!=0){
            $w=HesapKod::where('id',$id)->get();
            return $w[0]["hesapKod"];
        }else{
            return "#";
        }
    }

    static function getHesapAd($id){
        $c= HesapKod::where('id',$id)->count();
        if($c!=0){
            $w=HesapKod::where('id',$id)->get();
            return $w[0]["hesapAd"];
        }else{
            return "#";
        }
    }

}
