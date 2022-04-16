<?php

namespace App\Models\Muhasebe;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IslemTip extends Model
{
    use HasFactory;
    protected $guarded=[];

    static function getIslemTipKod($id){
        $c= IslemTip::where('id',$id)->count();
        if($c!=0){
            $w=IslemTip::where('id',$id)->get();
            return $w[0]["islemTipKod"];
        }else{
            return "#";
        }
    }

    static function getIslemTipAd($id){
        $c= IslemTip::where('id',$id)->count();
        if($c!=0){
            $w=IslemTip::where('id',$id)->get();
            return $w[0]["islemTipAd"];
        }else{
            return "#";
        }
    }
}
