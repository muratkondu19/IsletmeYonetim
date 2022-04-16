<?php

namespace App\Models\Satinalma;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatinalmaTeklif extends Model
{
    use HasFactory;
    protected $guarded=[];

    static function getSatinalmaTeklif($id){
        $c= Satinalma::where('id',$id)->count();
        if($c!=0){
            $w=Satinalma::where('id',$id)->get();
            return $w[0]["satinalmaTeklifBelgeNo"];
        }else{
            return "#";
        }
    }

    static function getSatinalmaTeklifCount(){
        return SatinalmaTeklif::count();
    }
    
}
