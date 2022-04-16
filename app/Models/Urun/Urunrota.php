<?php

namespace App\Models\Urun;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urunrota extends Model
{
    use HasFactory;
    protected $guarded=[];

    static function getUrunRotaTip($id){
        $c= Urunrota::where('id',$id)->count();
        if($c!=0){
            $w=Urunrota::where('id',$id)->get();
            return $w[0]["urunrotaRotaTip"];
        }else{
            return "#";
        }
    }
}
