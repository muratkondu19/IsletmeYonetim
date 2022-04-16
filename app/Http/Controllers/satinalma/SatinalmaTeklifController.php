<?php

namespace App\Http\Controllers\satinalma;

use App\Http\Controllers\Controller;
use App\Models\Logger;
use App\Models\Muhasebe\Cari;
use App\Models\Satinalma\SatinalmaTeklif;
use App\Models\Satinalma\SatinalmaTeklifIslem;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SatinalmaTeklifController extends Controller
{
    public function satinalmateklif()
    {
        return view('modul.satinalmasiparis.satinalmateklif');
    }

    public function satinalmateklifCreate()
    {
        return view('modul.satinalmasiparis.satinalmateklifekle');
    }

    public function satinalmateklifStore(Request $request)
    {
        $all = $request->except('_token');
        $islem = $all["islem"];
        unset($all["islem"]);
        $create = SatinalmaTeklif::create($all);
        if ($create) {
            foreach ($islem as $k => $v) {
                $islemarray = [
                    'satinalmaTeklifId' => $create->id,
                    'satinalmaTeklifTip' => $v["satinalmaTeklifTip"],
                    'satinalmaTeklifDepoId' => $v["satinalmaTeklifDepoId"],
                    'satinalmaTeklifStokId' => $v["satinalmaTeklifStokId"],
                    'satinalmaTeklifStokAd' => $v["satinalmaTeklifStokAd"],
                    'satinalmaTeklifBirim' => $v["satinalmaTeklifBirim"],
                    'satinalmaTeklifMiktar' => $v["satinalmaTeklifMiktar"],
                    'satinalmaTeklifBirimFiyat' => $v["satinalmaTeklifBirimFiyat"],
                    'satinalmaTeklifToplamTutar' => $v["satinalmaTeklifToplamTutar"],
                ];
                SatinalmaTeklifIslem::create($islemarray);
                Logger::insert("Satınalma teklifi eklendi","Satınalma Teklifi İşlemleri");
            }
            return redirect()->back()->with("success", "Satınalma Teklifi Başarıyla Oluşturuldu");
        }

    }
    public function satinalmateklifDelete($id)
    {
        $c = SatinalmaTeklif::where('id', $id)->count();
        if ($c != 0) {
            $data = SatinalmaTeklif::where('id', $id)->get();
            SatinalmaTeklif::where('satinalmaTeklifId', $id)->delete();
            Logger::insert(\App\Models\Satinalma\SatinalmaTeklif::getSatinalmaTeklif($id). " Silindi.","Satınalma Teklif İşlemleri");
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
    public function satinalmateklifEdit($id)
    {
        $c = SatinalmaTeklif::where('id', $id)->count();
        if ($c != 0) {
            $data = SatinalmaTeklif::where('id', $id)->get();
            $dataIslem=SatinalmaTeklifIslem::where('satinalmaTeklifId',$id)->get();
            return view('modul.satinalmasiparis.satinalmateklifduzenle', ['data' => $data,'dataIslem'=>$dataIslem]);
        } else {
            return view('/');
        }
    }

    public function satinalmateklifUpdate(Request $request)
    { 
        $id=$request->route('id');
        $all = $request->except('_token');
        $islem = $all["islem"];
        unset($all["islem"]);
        $data=SatinalmaTeklif::where('id',$id)->get();
        if (count($islem)!=0) {
            SatinalmaTeklifIslem::where('satinalmaTeklifId',$id)->delete();
            foreach ($islem as $k => $v) {
                $islemarray = [
                    'satinalmaTeklifId' => $id,
                    'satinalmaTeklifTip' => $v["satinalmaTeklifTip"],
                    'satinalmaTeklifDepoId' => $v["satinalmaTeklifDepoId"],
                    'satinalmaTeklifStokId' => $v["satinalmaTeklifStokId"],
                    'satinalmaTeklifStokAd' => $v["satinalmaTeklifStokAd"],
                    'satinalmaTeklifBirim' => $v["satinalmaTeklifBirim"],
                    'satinalmaTeklifMiktar' => $v["satinalmaTeklifMiktar"],
                    'satinalmaTeklifBirimFiyat' => $v["satinalmaTeklifBirimFiyat"],
                    'satinalmaTeklifToplamTutar' => $v["satinalmaTeklifToplamTutar"],
                ];
                SatinalmaTeklifIslem::create($islemarray);
                Logger::insert(\App\Models\Satinalma\SatinalmaTeklif::getSatinalmaTeklif($id). " Düzenlendi.","Satınalma Teklif İşlemleri");
            }
            $update=SatinalmaTeklif::where('id',$id)->update($all);
            return redirect()->back()->with("success", "Satış Teklifi Başarıyla Güncellendi");
        }
    }

    public function satinalmateklifData(Request $request)
    {
        $table = SatinalmaTeklif::query();
        $data = DataTables::of($table)
            ->addColumn('edit', function ($table) {
                return '<button type="button" class="btn btn-primary btn-sm "><a style="color: white;" href="' . route('satinalma.satinalmateklifEdit', ['id' => $table->id]) . '">Düzenle / İncele</a></button>';
            })->addColumn('delete', function ($table) {
                return '<button type="button" class="btn btn-danger btn-sm"><a style="color: white;" href="' . route('satinalma.satinalmateklifDelete', ['id' => $table->id]) . '">Sil</a></button>';
            })->addColumn('firma',function($table){
                return User::getPublicName($table->satinalmaTeklifFirmaId);
            })->addColumn('cari',function($table){
                return Cari::getCariAd($table->satinalmaTeklifCariId);
            })->rawColumns(['edit', 'delete'])->make(true);
        return $data;
    }
}
