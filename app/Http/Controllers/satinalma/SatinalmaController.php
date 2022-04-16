<?php

namespace App\Http\Controllers\satinalma;

use App\Http\Controllers\Controller;
use App\Models\Envanter\StokHareket;
use App\Models\Logger;
use App\Models\Muhasebe\Cari;
use App\Models\Muhasebe\SatinalmaFatura;
use App\Models\Satinalma\Satinalma;
use App\Models\Satinalma\SatinalmaIslem;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SatinalmaController extends Controller
{
    public function satinalmasiparis()
    {
        return view('modul.satinalmasiparis.satinalmasiparis');
    }
    

    public function satinalmasiparisCreate()
    {
        return view('modul.satinalmasiparis.satinalmasiparisekle');
    }

    public function satinalmasiparisStore(Request $request)
    {
        $all = $request->except('_token');
        $islem = $all["islem"];
        unset($all["islem"]);
        $create = Satinalma::create($all);
        if ($create) {
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

                $stokarray=[
                    'stokHareketId'=>$create->id,
                    'stokHareketTip'=>$v["satinalmaSiparisTip"],
                    'stokHareketDepo'=>$v["satinalmaSiparisDepoId"],
                    'stokHareketAd'=>$v["satinalmaSiparisStokAd"],
                    'stokHareketBirim'=>$v["satinalmaSiparisBirim"],
                    'stokHareketMiktar'=>$v["satinalmaSiparisMiktar"],
                    'stokHareketBirimFiyat'=>$v["satinalmaSiparisBirimFiyat"],
                    'stokHareketToplamTutar'=>$v["satinalmaSiparisToplamTutar"],
                    'stokHareketDurum'=>'Girdi',
                ];
                StokHareket::create($stokarray);
                Logger::insert("Satınalma eklendi","Satınalma İşlemleri");
            }
            return redirect()->back()->with("success", "Satınalma Siparişi Başarıyla Oluşturuldu");
        }

    }
    public function satinalmasiparisDelete($id)
    {
        $c = Satinalma::where('id', $id)->count();
        if ($c != 0) {
            $data = Satinalma::where('id', $id)->get();
            Satinalma::where('id', $id)->delete();
            SatinalmaIslem::where('satinalmaSiparisId',$id)->delete();
            Logger::insert(\App\Models\Satinalma\Satinalma::getSatinalma($id). " Silindi","Satınalma İşlemleri");
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
    public function satinalmasiparisEdit($id)
    {
        $c = Satinalma::where('id', $id)->count();
        if ($c != 0) {
            $data = Satinalma::where('id', $id)->get();
            $dataIslem=SatinalmaIslem::where('satinalmaSiparisId',$id)->get();
            return view('modul.satinalmasiparis.satinalmasiparisduzenle', ['data' => $data,'dataIslem'=>$dataIslem]);
        } else {
            return view('/');
        }
    }

    public function satinalmasiparisUpdate(Request $request)
    { 
        $id=$request->route('id');
        $all = $request->except('_token');
        $islem = $all["islem"];
        unset($all["islem"]);
        $data=Satinalma::where('id',$id)->get();
        if (count($islem)!=0) {
            SatinalmaIslem::where('satinalmaSiparisId',$id)->delete();
            foreach ($islem as $k => $v) {
                $islemarray = [
                    'satinalmaSiparisId' => $id,
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
                Logger::insert(\App\Models\Satinalma\Satinalma::getSatinalma($id). " Düzenlendi","Satınalma İşlemleri");
            }
            $update=Satinalma::where('id',$id)->update($all);
            return redirect()->back()->with("success", "Satınalma Siparişi Başarıyla Güncellendi");
        }
    }

    public function satinalmasiparisData(Request $request)
    {
        $table = Satinalma::query();
        $data = DataTables::of($table)
        ->addColumn('edit', function ($table) {
                return '<button type="button" class="btn btn-primary btn-sm "><a style="color: white;" href="' . route('satinalma.satinalmasiparisEdit', ['id' => $table->id]) . '">Düzenle / İncele / Fatura Oluştur</a></button>';
            })->addColumn('delete', function ($table) {
                return '<button type="button" class="btn btn-danger btn-sm"><a style="color: white;" href="' . route('satinalma.satinalmasiparisDelete', ['id' => $table->id]) . '">Sil</a></button>';
            })->addColumn('firma',function($table){
                return User::getPublicName($table->satinalmaSiparisFirmaId);
            })->addColumn('cari',function($table){
                return Cari::getCariAd($table->satinalmaSiparisCariId);
            })->addColumn('faturadurum',function($table){
                $faturadurum=SatinalmaFatura::ggetSatisFaturaSorgu($table->satinalmaSiparisBelgeNo);
                if($faturadurum=="Fatura Mevcut Değil"){
                    return '<span style="color:red">'.$faturadurum.'</span>';
                }elseif($faturadurum!="Fatura Mevcut Değil"){
                    return'<span style="color:green">'.$faturadurum.'</span>';
                }else{
                    return $faturadurum;
                }
            })->rawColumns(['faturadurum','edit','delete','cari','firma'])->make(true);
        return $data;
    }
}
