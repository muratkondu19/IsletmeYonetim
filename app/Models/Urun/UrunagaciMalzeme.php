<?php

namespace App\Models\Urun;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrunagaciMalzeme extends Model
{
    use HasFactory;
    protected $guarded=[];

    static function getSatırTip($kod){
        $c= UrunagaciMalzeme::where('urunagacimalzemeSatırTip',$kod)->count();
        if($c!=0){
            $w=UrunagaciMalzeme::where('urunagacimalzemeSatırTip',$kod)->get();
            return $w[0]["urunagacimalzemeSatırTip"];
        }else{
            return "#";
        }
    }
}
