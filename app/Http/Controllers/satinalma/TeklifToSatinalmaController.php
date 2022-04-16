<?php

namespace App\Http\Controllers\satinalma;

use App\Http\Controllers\Controller;
use App\Models\Muhasebe\Cari;
use App\Models\Satinalma\Satinalma;
use App\Models\Satinalma\SatinalmaIslem;
use App\Models\Satinalma\SatinalmaTeklif;
use App\Models\Satinalma\SatinalmaTeklifIslem;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TeklifToSatinalmaController extends Controller
{
    public function teklifsatinalma(){
        return view('modul.satinalmasiparis.teklifsatinalma');
    }

    public function tekliftosatinalmaCreate($id)
    {
        $c = SatinalmaTeklif::where('id', $id)->count();
        if ($c != 0) {
            $data = SatinalmaTeklif::where('id', $id)->get();
            $dataIslem=SatinalmaTeklifIslem::where('satinalmaTeklifId',$id)->get();
            return view('modul.satinalmasiparis.teklifsatinalmaolustur', ['data' => $data,'dataIslem'=>$dataIslem]);
        } else {
            return view('/');
        }
    }

    public function tekliftosatinalmaUpdate(Request $request)
    {
        $id=$request->route('id');
        $all = $request->except('_token');
        $islem = $all["islem"];
        unset($all["islem"]);
        $create = Satinalma::create($all);
        if ($create) {
            SatinalmaTeklifIslem::where('satinalmaTeklifId',$id)->delete();
            SatinalmaTeklif::where('id',$id)->delete();
            foreach ($islem as $k => $v) {
                $islemarray = [
                    'satinalmaSiparisId' => $create->id,
                    'satinalmaSiparisTip' => $v["satinalmaSiparisTip"],
                    'satinalmaSiparisDepoId' => $v["satinalmaSiparisDepoId"],
                    'satinalmaSiparisStokId' => $v["satinalmaSiparisStokId"],
                    'satinalmaSiparisStokAd' => $v["satinalmaSiparisStokAd"],
                    'satinalmaSiparisBirim' => $v["satinalmaSiparisBirim"],
                    'satinalmaSiparisMiktar' => $v["satinalmaSiparisMiktar"],
                    'satinalmaSiparisBirimFiyat' => $v["satinalmaSiparisBirimFiyat"],
                    'satinalmaSiparisToplamTutar' => $v["satinalmaSiparisToplamTutar"],
                ];
                SatinalmaIslem::create($islemarray);
               
            }
            return view('modul.satinalmasiparis.teklifsatinalma')->with("success", "Tekliften Satış Siparişi Oluşturma Başarılı.");
        }

    }

    public function tekliftosatinalmaData(Request $request)
    {
        $table = SatinalmaTeklif::query();
        $data = DataTables::of($table)
            ->addColumn('siparis', function ($table) {
                return '<button type="button" class="btn btn-primary btn-sm"><a style="color: white;" href="' . route('satinalma.tekliftosatinalmaCreate', ['id' => $table->id]) . '">Sipariş Oluştur</a></button>';
            })->addColumn('firma',function($table){
                return User::getPublicName($table->satinalmaTeklifFirmaId);
            })->addColumn('cari',function($table){
                return Cari::getCariAd($table->satinalmaTeklifCariId);
            })->rawColumns(['siparis'])->make(true);
        return $data;
    }
}
