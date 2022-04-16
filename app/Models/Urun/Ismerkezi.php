<?php

namespace App\Models\Urun;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ismerkezi extends Model
{
    use HasFactory;
    protected $guarded=[];

    static function getIsMerkezAd($id){
        $c= Ismerkezi::where('id',$id)->count();
        if($c!=0){
            $w=Ismerkezi::where('id',$id)->get();
            return $w[0]["ismerkeziAd"];
        }else{
            return "#";
        }
    }

    static function getIsMerkezKod($id){
        $c= Ismerkezi::where('id',$id)->count();
        if($c!=0){
            $w=Ismerkezi::where('id',$id)->get();
            return $w[0]["ismerkeziKod"];
        }else{
            return "#";
        }
    }

    static function getIsmerkezAdKod($kod){
        $c= Ismerkezi::where('ismerkeziKod',$kod)->count();
        if($c!=0){
            $w=Ismerkezi::where('ismerkeziKod',$kod)->get();
            return $w[0]["ismerkeziAd"];
        }else{
            return "#";
        }
    }
}
