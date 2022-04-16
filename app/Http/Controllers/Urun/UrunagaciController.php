<?php

namespace App\Http\Controllers\Urun;

use App\Http\Controllers\Controller;
use App\Models\Logger;
use App\Models\Urun\Urunagaci;
use App\Models\Urun\UrunagaciMalzeme;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UrunagaciController extends Controller
{
    public function urunagaci()
    {
        return view('modul.urun.urunagaci.urunagaci');
    }

    public function urunagaciCreate()
    {
        return view('modul.urun.urunagaci.urunagaciekle');
    }

    public function urunagaciStore(Request $request)
    {
        $all = $request->except('_token');
        $islem=$all['islem'];
        unset($all["islem"]);
        $create = Urunagaci::create($all);
        if ($create) {
            foreach ($islem as $k => $v) {
                $islemarray = [
                    'urunagaciId' => $create->id,
                    'urunagacimalzemeSatırTip' => $v["urunagacimalzemeSatırTip"],
                    'urunagacimalzemeStokKod' => $v["urunagacimalzemeStokKod"],
                    'urunagacimalzemeStokAd' => $v["urunagacimalzemeStokAd"],
                    'urunagacimalzemeOperasyonAd' => $v["urunagacimalzemeOperasyonAd"],
                    'urunagacimalzemeBirim' => $v["urunagacimalzemeBirim"],
                    'urunagacimalzemeMiktar' => $v["urunagacimalzemeMiktar"],

                ];
                UrunagaciMalzeme::create($islemarray);
                Logger::insert("Ürün ağacı eklendi","Ürün Ağacı İşlemleri");
            }
            return redirect()->back()->with("success", "Ürün Ağacı Başarıyla Oluşturuldu");
        }
    }

    public function urunagaciDelete($id)
    {
        $c = Urunagaci::where('id', $id)->count();
        if ($c != 0) {
            $data = Urunagaci::where('id', $id)->get();
            Urunagaci::where('id', $id)->delete();
            UrunagaciMalzeme::where('urunagaciId',$id)->delete();
            
            Logger::insert(\App\Models\Urun\Urunagaci::getUrunAgaci($id). " Silindi","Ürün Ağacı İşlemleri");
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
    public function urunagaciEdit($id)
    {
        $c = Urunagaci::where('id', $id)->count();
        if ($c != 0) {
            $data = Urunagaci::where('id', $id)->get();
            $dataIslem=UrunagaciMalzeme::where('urunagaciId',$id)->get();
            return view('modul.urun.urunagaci.urunagaciduzenle', ['data' => $data,'dataIslem'=>$dataIslem]);
        } else {
            return view('/');
        }
    }

    public function urunagaciUpdate(Request $request)
    {
        $id=$request->route('id');
        $all = $request->except('_token');
        $islem=$all['islem'];
        unset($all["islem"]);
        $data=Urunagaci::where('id',$id)->get();
        if (count($islem)!=0) {
            UrunagaciMalzeme::where('urunagaciId',$id)->delete();
            foreach ($islem as $k => $v) {
                $islemarray = [
                    'urunagaciId' => $id,
                    'urunagacimalzemeSatırTip' => $v["urunagacimalzemeSatırTip"],
                    'urunagacimalzemeStokKod' => $v["urunagacimalzemeStokKod"],
                    'urunagacimalzemeStokAd' => $v["urunagacimalzemeStokAd"],
                    'urunagacimalzemeOperasyonAd' => $v["urunagacimalzemeOperasyonAd"],
                    'urunagacimalzemeBirim' => $v["urunagacimalzemeBirim"],
                    'urunagacimalzemeMiktar' => $v["urunagacimalzemeMiktar"],
                ];
                UrunagaciMalzeme::create($islemarray);
            }
            $update=Urunagaci::where('id',$id)->update($all);
            Logger::insert(\App\Models\Urun\Urunagaci::getUrunAgaci($id). " Düzenlendi","Ürün Ağacı İşlemleri");
            return redirect()->back()->with("success", "Ürün Ağacı Başarıyla Güncellendi");
        }
    }

    public function urunagaciData(Request $request)
    {
        $table = Urunagaci::query();
        $data = DataTables::of($table)
            ->addColumn('edit', function ($table) {
                return '<button type="button" class="btn btn-primary btn-sm "><a style="color: white;" href="' . route('urun.urunagaciEdit', ['id' => $table->id]) . '">Düzenle / İncele</a></button>';
            })->addColumn('delete', function ($table) {
                return '<button type="button" class="btn btn-danger btn-sm"><a style="color: white;" href="' . route('urun.urunagaciDelete', ['id' => $table->id]) . '">Sil</a></button>';
            })->addColumn('firma',function($table){
                return User::getPublicName($table->urunagaciFirmaKod);
            })->rawColumns(['edit', 'delete'])->make(true);
        return $data;
    }
}
