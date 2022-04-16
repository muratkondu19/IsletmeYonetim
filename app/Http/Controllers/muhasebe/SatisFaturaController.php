<?php

namespace App\Http\Controllers\muhasebe;

use App\Http\Controllers\Controller;
use App\Models\Logger;
use App\Models\Muhasebe\Cari;
use App\Models\Muhasebe\SatisFatura;
use App\Models\Muhasebe\SatisFaturaIslem;
use App\Models\Satis\SatisSiparis;
use App\Models\Satis\SatisSiparisIslem;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SatisFaturaController extends Controller
{
    public function satisfatura()
    {
        return view('modul.muhasebe.satisfatura.satisfatura');
    }

    public function satisfaturaCreate()
    {
        return view('modul.muhasebe.satisfatura.satisfaturaekle');
    }

    public function satisfaturaOlustur($satisId)
    {
        $c = SatisSiparis::where('id', $satisId)->count();
        if ($c != 0) {
            $data = SatisSiparis::where('id', $satisId)->get();
            $dataIslem=SatisSiparisIslem::where('satisSiparisId',$satisId)->get();
        return view('modul.muhasebe.satisfatura.satisfaturaekle',['data' => $data,'dataIslem'=>$dataIslem]);
        } else {
        return view('/');
    }
    }

    public function satisfaturaStore(Request $request)
    {
        $all = $request->except('_token');
        $islem = $all["islem"];
        unset($all["islem"]);
        $create = SatisFatura::create($all);
        if ($create) {
            foreach ($islem as $k => $v) {
                $islemarray = [
                    'satisfaturaId' => $create->id,
                    'satisDepoKod' => $v["satisDepoKod"],
                    'satisfaturaDepoAd' => $v["satisfaturaDepoAd"],
                    'satisMuhasebeKod' => $v["satisMuhasebeKod"],
                    'satisMuhasebeAd' => $v["satisMuhasebeAd"],
                    'satisBirim' => $v["satisBirim"],
                    'satisMiktar' => $v["satisMiktar"],
                    'satisBirimFiyat' => $v["satisBirimFiyat"],
                    'satisToplamTutar' => $v["satisToplamTutar"],
                ];
                SatisFaturaIslem::create($islemarray);
                Logger::insert("Satış fatura eklendi","Satış Faturası İşlemleri");
            }
            return redirect()->back()->with("success", "Satış Faturası Başarıyla Oluşturuldu");
        }
    }
    public function satisfaturaDelete($id)
    {
        $c = SatisFatura::where('id', $id)->count();
        if ($c != 0) {
            $data = SatisFatura::where('id', $id)->get();
            SatisFatura::where('id', $id)->delete();
            SatisFaturaIslem::where('satisfaturaId',$id)->delete();
            Logger::insert(\App\Models\Muhasebe\SatisFatura::getSatisFaturaKod($id). " Silindi","Satış Fatura");
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
    public function satisfaturaEdit($id)
    {
        $c = SatisFatura::where('id', $id)->count();
        if ($c != 0) {
            $data = SatisFatura::where('id', $id)->get();
            $dataIslem=SatisFaturaIslem::where('satisfaturaId',$id)->get();
            return view('modul.muhasebe.satisfatura.satisfaturaduzenle', ['data' => $data,'dataIslem'=>$dataIslem]);
        } else {
            return view('/');
        }
    }

    public function satisfaturaUpdate(Request $request)
    {
        $id=$request->route('id');
        $all = $request->except('_token');
        $islem = $all["islem"];
        unset($all["islem"]);
        $data=SatisFatura::where('id',$id)->get();
        if (count($islem)!=0) {
            SatisFaturaIslem::where('satisfaturaId',$id)->delete();
            foreach ($islem as $k => $v) {
                $islemarray = [
                    'satisfaturaId' => $id,
                    'satisDepoKod' => $v["satisDepoKod"],
                    'satisfaturaDepoAd' => $v["satisfaturaDepoAd"],
                    'satisMuhasebeKod' => $v["satisMuhasebeKod"],
                    'satisMuhasebeAd' => $v["satisMuhasebeAd"],
                    'satisBirim' => $v["satisBirim"],
                    'satisMiktar' => $v["satisMiktar"],
                    'satisBirimFiyat' => $v["satisBirimFiyat"],
                    'satisToplamTutar' => $v["satisToplamTutar"],
                ];
                SatisFaturaIslem::create($islemarray);
                Logger::insert(\App\Models\Muhasebe\SatisFatura::getSatisFaturaKod($id). " Düzenlendi","Satış Fatura");
            }
            $update=SatisFatura::where('id',$id)->update($all);
            return redirect()->back()->with("success", "Satış Faturası Başarıyla Güncellendi");
        }
    }

    public function satisfaturaData(Request $request)
    {
        $table = SatisFatura::query();
        $data = DataTables::of($table)
        ->addColumn('firma',function($table){
            return User::getPublicName($table->satisfaturaFirmaId);
        })->addColumn('edit', function ($table) {
                return '<button type="button" class="btn btn-primary btn-sm "><a style="color: white;" href="' . route('muhasebe.satisfaturaEdit', ['id' => $table->id]) . '">Düzenle / İncele</a></button>';
            })->addColumn('delete', function ($table) {
                return '<button type="button" class="btn btn-danger btn-sm"><a style="color: white;" href="' . route('muhasebe.satisfaturaDelete', ['id' => $table->id]) . '">Sil</a></button>';
            })->rawColumns(['firma','edit', 'delete'])->make(true);
        return $data;
    }


}
