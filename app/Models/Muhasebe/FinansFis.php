<?php

namespace App\Models\Muhasebe;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinansFis extends Model
{
    use HasFactory;
    protected $guarded=[];

    static function getFinansFisKod($id){
        $c= FinansFis::where('id',$id)->count();
        if($c!=0){
            $w=FinansFis::where('id',$id)->get();
            return $w[0]["fiFisNo"];
        }else{
            return "#";
        }
    }
}
