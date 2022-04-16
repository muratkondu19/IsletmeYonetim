<?php

namespace App\Http\Controllers\Urun;

use App\Http\Controllers\Controller;
use App\Models\Envanter\StokHareket;
use App\Models\Logger;
use App\Models\Urun\UretimGiris;
use App\Models\Urun\UretimGirisMalzeme;
use App\Models\Urun\UretimgirisRotaa;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UretimgirisController extends Controller
{
    public function uretimgiris()
    {
        return view('modul.urun.isemri.uretimgiris');
    }


    public function isemriUretimGiris(Request $request)
    {
        $all = $request->except('_token');
        $rota=$all['rota'];
        unset($all["rota"]);
        $malzeme=$all['malzeme'];
        unset($all['malzeme']);
        $create = UretimGiris::create($all);
        if ($create) {
            foreach ($rota as $k => $v) {
                $rotaarray = [
                    'uretimgirisId' => $create->id,
                    'uretimrotaIsistasyonKod' => $v["uretimrotaisistasyon"],
                    'uretimrotaOperasyonKod' => $v["uretimrotaoperasyonkod"],

                ];
                UretimgirisRotaa::create($rotaarray);
            }
            foreach ($malzeme as $k => $v) {
                $malzemearray = [
                    'uretimgirisId' => $create->id,
                    'uretimmalzemeSatırTip' => $v["uretimmalzemeSatırTip"],
                    'uretimmalzemeStokKod' => $v["uretimmalzemeStokAd"],
                    'uretimmalzemeStokAd' => $v["uretimmalzemeStokKod"],
                    'uretimmalzemeOperasyon' => $v["uretimmalzemeOperasyonAd"],
                    'uretimmalzemeBirim' => $v["uretimmalzemeBirim"],
                    'uretimmalzemeMiktar' => $v["uretimmalzemeMiktar"],

                ];
                UretimGirisMalzeme::create($malzemearray);
                Logger::insert("Üretim girişi eklendi","Üretim Giriş İşlemleri");
            }
            return redirect()->back()->with("success", "Üretim Girişi Başarıyla Oluşturuldu");
        }
    }

    public function uretimgirisEdit($id)
    {
        $c = UretimGiris::where('id', $id)->count();
        if ($c != 0) {
            $data=UretimGiris::where('id',$id)->get();
            $rota = UretimgirisRotaa::where('uretimgirisId', $id)->get();
            $malzeme=UretimGirisMalzeme::where('uretimgirisId',$id)->get();
            return view('modul.urun.isemri.uretimgirisduzenle', ['rota' => $rota,'malzeme'=>$malzeme,'data'=>$data]);
        } else {
            return view('/');
        }
    }

    
    public function uretimgirisUpdate(Request $request)
    {
        $id=$request->route('id');
        $all = $request->except('_token');
        $rota=$all['rota'];
        unset($all["rota"]);
        $malzeme=$all['malzeme'];
        unset($all['malzeme']);
        $data=UretimGiris::where('id',$id)->get();
        if (count($rota)!=0) {
            UretimgirisRotaa::where('uretimgirisId',$id)->delete();
            foreach ($rota as $k => $v) {
                $rotaarray =[
                    'uretimgirisId' => $id,
                    'uretimrotaIsistasyonKod' => $v["uretimrotaIsistasyonKod"],
                    'uretimrotaOperasyonKod' => $v["uretimrotaOperasyonKod"],

                ];
                UretimgirisRotaa::create($rotaarray);
            }
            UretimGirisMalzeme::where('uretimgirisId',$id)->delete();
            foreach ($malzeme as $k => $v) {
                $malzemearray = [
                    'uretimgirisId' => $id,
                    'uretimmalzemeSatırTip' => $v["uretimmalzemeSatırTip"],
                    'uretimmalzemeStokKod' => $v["uretimmalzemeStokKod"],
                    'uretimmalzemeStokAd' => $v["uretimmalzemeStokAd"],
                    'uretimmalzemeOperasyon' => $v["uretimmalzemeOperasyon"],
                    'uretimmalzemeBirim' => $v["uretimmalzemeBirim"],
                    'uretimmalzemeMiktar' => $v["uretimmalzemeMiktar"],

                ];
     

                UretimGirisMalzeme::create($malzemearray);
            }
            $update=UretimGiris::where('id',$id)->update($all);
            Logger::insert(\App\Models\Urun\UretimGiris::getUretimGirisKod($id). " Düzenlendi","Üretim Giriş İşlemleri");
            return redirect()->back()->with("success", "Üretim Girişi Başarıyla Oluşturuldu");
        }
    }

    
    public function uretimgirisDelete($id)
    {
        $c = UretimGiris::where('id', $id)->count();
        if ($c != 0) {
            $data = UretimGiris::where('id', $id)->get();
            UretimGiris::where('id', $id)->delete();
            UretimgirisRotaa::where('uretimgirisId',$id)->delete();
            UretimGirisMalzeme::where('uretimgirisId',$id)->delete();
            Logger::insert(\App\Models\Urun\UretimGiris::getUretimGirisKod($id). " Silindi","Üretim Giriş İşlemleri");
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }

    public function uretimgirisData(Request $request)
    {
        $table = UretimGiris::query();
        $data = DataTables::of($table)
            ->addColumn('edit', function ($table) {
                return '<button type="button" class="btn btn-primary btn-sm "><a style="color: white;" href="' . route('urun.uretimgirisEdit', ['id' => $table->id]) . '">Düzenle / İncele</a></button>';
            })->addColumn('delete', function ($table) {
                return '<button type="button" class="btn btn-danger btn-sm"><a style="color: white;" href="' . route('urun.uretimgirisDelete', ['id' => $table->id]) . '">Sil</a></button>';
            })->addColumn('firma',function($table){
                return User::getPublicName($table->uretimgirisFirmaKod);
            })->rawColumns(['edit', 'delete'])->make(true);
        return $data;
    }
}
