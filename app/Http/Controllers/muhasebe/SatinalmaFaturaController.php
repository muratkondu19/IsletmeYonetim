<?php

namespace App\Http\Controllers\muhasebe;

use App\Http\Controllers\Controller;
use App\Models\Logger;
use App\Models\Muhasebe\Cari;
use App\Models\Muhasebe\SatinalmaFatura;
use App\Models\Muhasebe\SatinalmaFaturaIslem;
use App\Models\Satinalma\Satinalma;
use App\Models\Satinalma\SatinalmaIslem;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SatinalmaFaturaController extends Controller
{
    public function satinalmafatura()
    {
        return view('modul.muhasebe.satinalmafatura.satinalmafatura');
    }

    public function satinalmafaturaOlustur($satinalmaId)
    {
        $c = Satinalma::where('id', $satinalmaId)->count();
        if ($c != 0) {
            $data = Satinalma::where('id', $satinalmaId)->get();
            $dataIslem=SatinalmaIslem::where('satinalmasiparisId',$satinalmaId)->get();
        return view('modul.muhasebe.satinalmafatura.satinalmafaturaekle',['data' => $data,'dataIslem'=>$dataIslem]);
    } else {
        return view('/');
    }
    }

    public function satinalmafaturaCreate()
    {

        return view('modul.muhasebe.satinalmafatura.satinalmafaturaekle');
    }

    public function satinalmafaturaStore(Request $request)
    {
        $all = $request->except('_token');
        $islem = $all["islem"];
        unset($all["islem"]);
        $create = SatinalmaFatura::create($all);
        if ($create) {
            foreach ($islem as $k => $v) {
                $islemarray = [
                    'satinalmafaturaId' => $create->id,
                    'satinalmaDepoKod' => $v["satinalmaDepoKod"],
                    'satinalmafaturaDepoAd' => $v["satinalmafaturaDepoAd"],
                    'satinalmaMuhasebeKod' => $v["satinalmaMuhasebeKod"],
                    'satinalmaMuhasebeAd' => $v["satinalmaMuhasebeAd"],
                    'satinalmaBirim' => $v["satinalmaBirim"],
                    'satinalmaMiktar' => $v["satinalmaMiktar"],
                    'satinalmaBirimFiyat' => $v["satinalmaBirimFiyat"],
                    'satinalmaToplamTutar' => $v["satinalmaToplamTutar"],
                ];
                SatinalmaFaturaIslem::create($islemarray);
                Logger::insert("Satınalma faturası eklendi","Satınalma Fatura");
            }
            return redirect()->back()->with("success", "Satınalma Faturası Başarıyla Oluşturuldu");
        }
    }
    public function satinalmafaturaDelete($id)
    {
        $c = SatinalmaFatura::where('id', $id)->count();
        if ($c != 0) {
            $data = SatinalmaFatura::where('id', $id)->get();
            SatinalmaFatura::where('id', $id)->delete();
            SatinalmaFaturaIslem::where('satinalmafaturaId', $id)->delete();
            Logger::insert(\App\Models\Muhasebe\SatinalmaFatura::getSatinalmaFaturaKod($id). " Silindi","Satınalma Fatura");
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
    public function satinalmafaturaEdit($id)
    {
        $c = SatinalmaFatura::where('id', $id)->count();
        if ($c != 0) {
            $data = SatinalmaFatura::where('id', $id)->get();
            $dataIslem=SatinalmaFaturaIslem::where('satinalmafaturaId',$id)->get();
            return view('modul.muhasebe.satinalmafatura.satinalmafaturaduzenle', ['data' => $data,'dataIslem'=>$dataIslem]);
        } else {
            return view('/');
        }
    }

    public function satinalmafaturaUpdate(Request $request)
    {
        $id=$request->route('id');
        $all = $request->except('_token');
        $islem = $all["islem"];
        unset($all["islem"]);
        $data=SatinalmaFatura::where('id',$id)->get();
        if (count($islem)!=0) {
            SatinalmaFaturaIslem::where('satinalmafaturaId',$id)->delete();
            foreach ($islem as $k => $v) {
                $islemarray = [
                    'satinalmafaturaId' => $id,
                    'satinalmaDepoKod' => $v["satinalmaDepoKod"],
                    'satinalmafaturaDepoAd' => $v["satinalmafaturaDepoAd"],
                    'satinalmaMuhasebeKod' => $v["satinalmaMuhasebeKod"],
                    'satinalmaMuhasebeAd' => $v["satinalmaMuhasebeAd"],
                    'satinalmaBirim' => $v["satinalmaBirim"],
                    'satinalmaMiktar' => $v["satinalmaMiktar"],
                    'satinalmaBirimFiyat' => $v["satinalmaBirimFiyat"],
                    'satinalmaToplamTutar' => $v["satinalmaToplamTutar"],
                ];
                SatinalmaFaturaIslem::create($islemarray);
                Logger::insert(\App\Models\Muhasebe\SatinalmaFatura::getSatinalmaFaturaKod($id). " Düzenlendi","Satınalma Fatura");
            }
            $update=SatinalmaFatura::where('id',$id)->update($all);
            return redirect()->back()->with("success", "Satınalma Faturası Başarıyla Güncellendi");
        }
    }

    public function satinalmafaturaData(Request $request)
    {
        $table = SatinalmaFatura::query();
        $data = DataTables::of($table)
        ->addColumn('firma',function($table){
            return User::getPublicName($table->satinalmafaturaFirmaId);
        })->addColumn('edit', function ($table) {
                return '<button type="button" class="btn btn-primary btn-sm "><a style="color: white;" href="' . route('muhasebe.satinalmafaturaEdit', ['id' => $table->id]) . '">Düzenle / İncele</a></button>';
            })->addColumn('delete', function ($table) {
                return '<button type="button" class="btn btn-danger btn-sm"><a style="color: white;" href="' . route('muhasebe.satinalmafaturaDelete', ['id' => $table->id]) . '">Sil</a></button>';
            })->rawColumns(['firma','edit', 'delete'])->make(true);
        return $data;
    }

}
