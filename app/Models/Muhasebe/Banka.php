<?php

namespace App\Models\Muhasebe;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banka extends Model
{
    use HasFactory;
    protected $guarded=[];

    static function getBankaAd($id){
        $c= Banka::where('id',$id)->count();
        if($c!=0){
            $w=Banka::where('id',$id)->get();
            return $w[0]["bankaAd"];
        }else{
            return "#";
        }
    }
}
