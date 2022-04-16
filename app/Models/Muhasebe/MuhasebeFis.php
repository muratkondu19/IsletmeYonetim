<?php

namespace App\Models\Muhasebe;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MuhasebeFis extends Model
{
    use HasFactory;
    protected $guarded=[];

    static function getMuhasebeFisKod($id){
        $c= MuhasebeFis::where('id',$id)->count();
        if($c!=0){
            $w=MuhasebeFis::where('id',$id)->get();
            return $w[0]["miFisNo"];
        }else{
            return "#";
        }
    }
    
    static function getMuhasebeFisKayit($id){
        $c= MuhasebeFis::where('id',$id)->count();
        if($c!=0){
            $w=MuhasebeFis::where('id',$id)->get();
            return $w[0]["miFisTipKod"].$w[0]["miAciklama"];
        }else{
            return "#";
        }
    }
}
