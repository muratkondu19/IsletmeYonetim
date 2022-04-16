<?php

namespace App\Models\Muhasebe;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasa extends Model
{
    use HasFactory;
    protected $guarded=[];

    static function getKasaAd($id){
        $c= Kasa::where('id',$id)->count();
        if($c!=0){
            $w=Kasa::where('id',$id)->get();
            return $w[0]["kasaAd"];
        }else{
            return "#";
        }
    }
}
