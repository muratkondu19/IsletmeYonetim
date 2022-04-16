<?php

namespace App\Http\Controllers\satissiparis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Satis\SatisTeklif;
use App\Models\Satis\SatisTeklifIslem;
use App\Models\User;
use App\Models\Muhasebe\Cari;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Satis\SatisSiparis;
use App\Models\Satis\SatisSiparisIslem;
class TeklifToSatisController extends Controller
{
    public function teklifsatis(){
        return view('modul.satissiparis.teklifsatis');
    }

    public function tekliftosatisCreate($id)
    {
        $c = SatisTeklif::where('id', $id)->count();
        if ($c != 0) {
            $data = SatisTeklif::where('id', $id)->get();
            $dataIslem=SatisTeklifIslem::where('satisTeklifId',$id)->get();
            return view('modul.satissiparis.teklifsatisolustur', ['data' => $data,'dataIslem'=>$dataIslem]);
        } else {
            return view('/');
        }
    }

    public function tekliftosatisUpdate(Request $request)
    {
        $id=$request->route('id');
        $all = $request->except('_token');
        $islem = $all["islem"];
        unset($all["islem"]);
        $create = SatisSiparis::create($all);
        if ($create) {
            SatisTeklifIslem::where('satisTeklifId',$id)->delete();
            SatisTeklif::where('id',$id)->delete();
            foreach ($islem as $k => $v) {
                $islemarray = [
                    'satisSiparisId' => $create->id,
                    'satisSiparisTip' => $v["satisSiparisTip"],
                    'satisSiparisDepoId' => $v["satisSiparisDepoId"],
                    'satisSiparisStokId' => $v["satisSiparisStokId"],
                    'satisSiparisStokAd' => $v["satisSiparisStokAd"],
                    'satisSiparisBirim' => $v["satisSiparisBirim"],
                    'satisSiparisMiktar' => $v["satisSiparisMiktar"],
                    'satisSiparisBirimFiyat' => $v["satisSiparisBirimFiyat"],
                    'satisSiparisToplamTutar' => $v["satisSiparisToplamTutar"],
                ];
                SatisSiparisIslem::create($islemarray);
               
            }
            return view('modul.satissiparis.teklifsatis')->with("success", "Tekliften Satış Siparişi Oluşturma Başarılı");
        }

    }

    public function tekliftosatisData(Request $request)
    {
        $table = SatisTeklif::query();
        $data = DataTables::of($table)
            ->addColumn('siparis', function ($table) {
                return '<button type="button" class="btn btn-primary btn-sm"><a style="color: white;" href="' . route('satis.tekliftosatisCreate', ['id' => $table->id]) . '">Sipariş Oluştur</a></button>';
            })->addColumn('firma',function($table){
                return User::getPublicName($table->satisTeklifFirmaId);
            })->addColumn('cari',function($table){
                return Cari::getCariAd($table->satisTeklifCariId);
            })->rawColumns(['siparis'])->make(true);
        return $data;
    }
}
