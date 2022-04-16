<?php

namespace App\Models\Muhasebe;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatisFatura extends Model
{
    use HasFactory;
    protected $guarded=[];

    static function ggetSatisFaturaSorgu($faturano){
        $c= SatisFatura::where('satisfaturaBelgeNumara',$faturano)->count();
        if($c!=0){
            $w=SatisFatura::where('satisfaturaBelgeNumara',$faturano)->get();
            return 'Fatura Mevcut';
        }else{
            return "Fatura Mevcut Değil";
        }
    }

    static function getSatisFaturaKod($id){
        $c= SatinalmaFatura::where('id',$id)->count();
        if($c!=0){
            $w=SatinalmaFatura::where('id',$id)->get();
            return $w[0]["satisfaturaBelgeNumara"];
        }else{
            return "#";
        }
    }
}
