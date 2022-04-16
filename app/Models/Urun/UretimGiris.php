<?php

namespace App\Models\Urun;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UretimGiris extends Model
{
    use HasFactory;
    protected $guarded=[];

    static function getUretimIsEmriKod($isemrino){
        $c= UretimGiris::where('uretimgirisIsEmriKod',$isemrino)->count();
        if($c!=0){
            $w=UretimGiris::where('uretimgirisIsEmriKod',$isemrino)->get();
            return 'Üretim Girişi Mevcut';
        }else{
            return "Üretim Girişi Yok";
        }
    }

    static function getUretimGirisKod($id){
        $c= UretimGiris::where('id',$id)->count();
        if($c!=0){
            $w=UretimGiris::where('id',$id)->get();
            return $w[0]["uretimgirisIsEmriKod"];
        }else{
            return "#";
        }
    }

    static function getUretimGirisCount(){
        return UretimGiris::count();
    }

}
