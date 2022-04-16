<?php

namespace App\Models\Urun;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urunagaci extends Model
{
    use HasFactory;
    protected $guarded=[];

    static function getUrunagacCount(){
        return Urunagaci::count();
    }

    static function getUrunAgaci($id){
        $c= Urunagaci::where('id',$id)->count();
        if($c!=0){
            $w=Urunagaci::where('id',$id)->get();
            return $w[0]["urunagaciStokAd"];
        }else{
            return "#";
        }
    }
}
