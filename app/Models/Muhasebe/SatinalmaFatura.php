<?php

namespace App\Models\Muhasebe;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatinalmaFatura extends Model
{
    use HasFactory;
    protected $guarded=[];
    static function ggetSatisFaturaSorgu($faturano){
        $c= SatinalmaFatura::where('satinalmafaturaBelgeNumara',$faturano)->count();
        if($c!=0){
            $w=SatinalmaFatura::where('satinalmafaturaBelgeNumara',$faturano)->get();
            return 'Fatura Mevcut';
        }else{
            return "Fatura Mevcut Değil";
        }
    }

    static function getSatinalmaFaturaKod($id){
        $c= SatinalmaFatura::where('id',$id)->count();
        if($c!=0){
            $w=SatinalmaFatura::where('id',$id)->get();
            return $w[0]["satinalmafaturaBelgeNumara"];
        }else{
            return "#";
        }
    }
}
