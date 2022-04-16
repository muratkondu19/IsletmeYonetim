<?php

namespace App\Models\Urun;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Isemri extends Model
{
    use HasFactory;
    protected $guarded=[];

    static function getIsEmriKod($id){
        $c= Isemri::where('id',$id)->count();
        if($c!=0){
            $w=Isemri::where('id',$id)->get();
            return $w[0]["isemriNumara"];
        }else{
            return "#";
        }
    }

    static function getIsemriCount(){
        return Isemri::count();
    }
}
