<?php

namespace App\Models\Muhasebe;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FisTip extends Model
{
    use HasFactory;
    protected $guarded=[];

    static function getFisTipKod($id)
    {
        $data = FisTip::where('id', $id)->get();
        return $data[0]["fisTipKod"];
    }

    static function getFisTipAd($id)
    {
        $data = FisTip::where('id', $id)->get();
        return $data[0]["fisTipAd"];
    }
}
