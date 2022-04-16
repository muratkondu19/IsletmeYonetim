<?php

namespace App\Http\Controllers\satissiparis;

use App\Http\Controllers\Controller;
use App\Models\Logger;
use App\Models\Muhasebe\Cari;
use App\Models\Satis\SatisTeklif;
use App\Models\Satis\SatisTeklifIslem;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SatisTeklifController extends Controller
{
    public function satisteklif()
    {
        return view('modul.satissiparis.satisteklif');
    }

    public function satisteklifCreate()
    {
        return view('modul.satissiparis.satisteklifekle');
    }

    public function satisteklifStore(Request $request)
    {
        $all = $request->except('_token');
        $islem = $all["islem"];
        unset($all["islem"]);
        $create = SatisTeklif::create($all);
        if ($create) {
            foreach ($islem as $k => $v) {
                $islemarray = [
                    'satisTeklifId' => $create->id,
                    'satisTeklifTip' => $v["satisTeklifTip"],
                    'satisTeklifDepoId' => $v["satisTeklifDepoId"],
                    'satisTeklifStokId' => $v["satisTeklifStokId"],
                    'satisTeklifStokAd' => $v["satisTeklifStokAd"],
                    'satisTeklifBirim' => $v["satisTeklifBirim"],
                    'satisTeklifMiktar' => $v["satisTeklifMiktar"],
                    'satisTeklifBirimFiyat' => $v["satisTeklifBirimFiyat"],
                    'satisTeklifToplamTutar' => $v["satisTeklifToplamTutar"],
                ];
                SatisTeklifIslem::create($islemarray);
                Logger::insert("Satış teklifi eklendi","Satış Teklif İşlemleri");
            }
            return redirect()->back()->with("success", "Satış Teklifi Başarıyla Oluşturuldu");
        }

    }
    public function satisteklifDelete($id)
    {
        $c = SatisTeklif::where('id', $id)->count();
        if ($c != 0) {
            $data = SatisTeklif::where('id', $id)->get();
            SatisTeklif::where('id', $id)->delete();
            SatisTeklifIslem::where('satisTeklifId',$id)->delete();
            Logger::insert(\App\Models\Satis\SatisTeklif::getSatisTeklif($id). " Silindi","Satış Teklif İşlemleri");
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
    public function satisteklifEdit($id)
    {
        $c = SatisTeklif::where('id', $id)->count();
        if ($c != 0) {
            $data = SatisTeklif::where('id', $id)->get();
            $dataIslem=SatisTeklifIslem::where('satisTeklifId',$id)->get();
            return view('modul.satissiparis.satisteklifduzenle', ['data' => $data,'dataIslem'=>$dataIslem]);
        } else {
            return view('/');
        }
    }

    public function satisteklifUpdate(Request $request)
    { 
        $id=$request->route('id');
        $all = $request->except('_token');
        $islem = $all["islem"];
        unset($all["islem"]);
        $data=SatisTeklif::where('id',$id)->get();
        if (count($islem)!=0) {
            SatisTeklifIslem::where('satisTeklifId',$id)->delete();
            foreach ($islem as $k => $v) {
                $islemarray = [
                    'satisTeklifId' => $id,
                    'satisTeklifTip' => $v["satisTeklifTip"],
                    'satisTeklifDepoId' => $v["satisTeklifDepoId"],
                    'satisTeklifStokId' => $v["satisTeklifStokId"],
                    'satisTeklifStokAd' => $v["satisTeklifStokAd"],
                    'satisTeklifBirim' => $v["satisTeklifBirim"],
                    'satisTeklifMiktar' => $v["satisTeklifMiktar"],
                    'satisTeklifBirimFiyat' => $v["satisTeklifBirimFiyat"],
                    'satisTeklifToplamTutar' => $v["satisTeklifToplamTutar"],
                ];
                SatisTeklifIslem::create($islemarray);
                Logger::insert(\App\Models\Satis\SatisTeklif::getSatisTeklif($id). " Düzenlendi","Satış Teklif İşlemleri");
            }
            $update=SatisTeklif::where('id',$id)->update($all);
            return redirect()->back()->with("success", "Satış Teklifi Başarıyla Güncellendi");
        }
    }

    public function satisteklifData(Request $request)
    {
        $table = SatisTeklif::query();
        $data = DataTables::of($table)
            ->addColumn('edit', function ($table) {
                return '<button type="button" class="btn btn-primary btn-sm "><a style="color: white;" href="' . route('satis.satisteklifEdit', ['id' => $table->id]) . '">Düzenle / İncele</a></button>';
            })->addColumn('delete', function ($table) {
                return '<button type="button" class="btn btn-danger btn-sm"><a style="color: white;" href="' . route('satis.satisteklifDelete', ['id' => $table->id]) . '">Sil</a></button>';
            })->addColumn('firma',function($table){
                return User::getPublicName($table->satisTeklifFirmaId);
            })->addColumn('cari',function($table){
                return Cari::getCariAd($table->satisTeklifCariId);
            })->rawColumns(['edit', 'delete'])->make(true);
        return $data;
    }
}
