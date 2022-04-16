<?php

namespace App\Models\Urun;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RotaTip extends Model
{
    use HasFactory;
    protected $guarded=[];

    static function getRotatipKod($id){
        $c= RotaTip::where('id',$id)->count();
        if($c!=0){
            $w=RotaTip::where('id',$id)->get();
            return $w[0]["rotatipKod"];
        }else{
            return "#";
        }
    }

    static function getRotatipAd($id){
        $c= RotaTip::where('id',$id)->count();
        if($c!=0){
            $w=RotaTip::where('id',$id)->get();
            return $w[0]["rotatipAd"];
        }else{
            return "#";
        }
    }

    

}
