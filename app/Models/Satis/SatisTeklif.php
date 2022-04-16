<?php

namespace App\Models\Satis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatisTeklif extends Model
{
    use HasFactory;
    protected $guarded=[];

    static function getSatisTeklif($id){
        $c= SatisTeklif::where('id',$id)->count();
        if($c!=0){
            $w=SatisTeklif::where('id',$id)->get();
            return $w[0]["satisTeklifBelgeNo"];
        }else{
            return "#";
        }
    }

    static function getSatisTeklifCount(){
        return SatisTeklif::count();
    }
    
}
