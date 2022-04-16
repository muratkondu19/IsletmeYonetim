<?php

namespace App\Models\Satis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatisSiparis extends Model
{
    use HasFactory;
    protected $guarded=[];

    static function getSatis($id){
        $c= SatisSiparis::where('id',$id)->count();
        if($c!=0){
            $w=SatisSiparis::where('id',$id)->get();
            return $w[0]["satisSiparisBelgeNo"];
        }else{
            return "#";
        }
    }

    static function getSatisCount(){
        return SatisSiparis::count();
    }
}
