<?php

namespace App\Http\Controllers\satissiparis;

use App\Http\Controllers\Controller;
use App\Models\Envanter\StokHareket;
use App\Models\Logger;
use App\Models\Muhasebe\Cari;
use App\Models\Muhasebe\SatisFatura;
use Illuminate\Http\Request;
use App\Models\Satis\SatisSiparis;
use App\Models\Satis\SatisSiparisIslem;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
class SatisSiparisController extends Controller
{
    public function satissiparis()
    {
        return view('modul.satissiparis.satissiparis');
    }

    public function satissiparisCreate()
    {
        return view('modul.satissiparis.satissiparisekle');
    }

    public function satissiparisStore(Request $request)
    {
        $all = $request->except('_token');
        $islem = $all["islem"];
        unset($all["islem"]);
        $create = SatisSiparis::create($all);
        if ($create) {
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

                $stokarray=[
                    'stokHareketId'=>$create->id,
                    'stokHareketTip'=>$v["satisSiparisTip"],
                    'stokHareketDepo'=>$v["satisSiparisDepoId"],
                    'stokHareketAd'=>$v["satisSiparisStokAd"],
                    'stokHareketBirim'=>$v["satisSiparisBirim"],
                    'stokHareketMiktar'=>$v["satisSiparisMiktar"],
                    'stokHareketBirimFiyat'=>$v["satisSiparisBirimFiyat"],
                    'stokHareketToplamTutar'=>$v["satisSiparisToplamTutar"],
                    'stokHareketDurum'=>'????kt??',
                ];
                StokHareket::create($stokarray);
                Logger::insert("Sat???? sipari??i eklendi","Sat???? Sipar??i ????lemleri");
            }
            return redirect()->back()->with("success", "Sat???? Sipari??i Ba??ar??yla Olu??turuldu");
        }

    }
    public function satissiparisDelete($id)
    {
        $c = SatisSiparis::where('id', $id)->count();
        if ($c != 0) {
            $data = SatisSiparis::where('id', $id)->get();
            SatisSiparis::where('id', $id)->delete();
            SatisSiparisIslem::where('satisSiparisId',$id)->delete();
            Logger::insert(\App\Models\Satis\SatisSiparis::getSatis($id). " Silindi","Sat???? Sipari?? ????lemleri");
            
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
    public function satissiparisEdit($id)
    {
        $c = SatisSiparis::where('id', $id)->count();
        if ($c != 0) {
            $data = SatisSiparis::where('id', $id)->get();
            $dataIslem=SatisSiparisIslem::where('satisSiparisId',$id)->get();
            return view('modul.satissiparis.satissiparisduzenle', ['data' => $data,'dataIslem'=>$dataIslem]);
        } else {
            return view('/');
        }
    }

    public function satissiparisUpdate(Request $request)
    { 
        $id=$request->route('id');
        $all = $request->except('_token');
        $islem = $all["islem"];
        unset($all["islem"]);
        $data=SatisSiparis::where('id',$id)->get();
        if (count($islem)!=0) {
            SatisSiparisIslem::where('satisSiparisId',$id)->delete();
            foreach ($islem as $k => $v) {
                $islemarray = [
                    'satisSiparisId' => $id,
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
                Logger::insert(\App\Models\Satis\SatisSiparis::getSatis($id). " D??zenlendi","Sat???? Sipari?? ????lemleri");
            }
            $update=SatisSiparis::where('id',$id)->update($all);
            return redirect()->back()->with("success", "Sat???? Sipari??i Ba??ar??yla G??ncellendi");
        }
    }

    public function satissiparisData(Request $request)
    {
        $table = SatisSiparis::query();
        $data = DataTables::of($table)
            ->addColumn('edit', function ($table) {
                return '<button type="button" class="btn btn-primary btn-sm "><a style="color: white;" href="' . route('satis.satissiparisEdit', ['id' => $table->id]) . '">D??zenle / ??ncele / Fatura Olu??tur</a></button>';
            })->addColumn('delete', function ($table) {
                return '<button type="button" class="btn btn-danger btn-sm"><a style="color: white;" href="' . route('satis.satissiparisDelete', ['id' => $table->id]) . '">Sil</a></button>';
            })->addColumn('firma',function($table){
                return User::getPublicName($table->satisSiparisFirmaId);
            })->addColumn('cari',function($table){
                return Cari::getCariAd($table->satisSiparisCariId);
            })->addColumn('faturadurum',function($table){
                $faturadurum=SatisFatura::ggetSatisFaturaSorgu($table->satisSiparisBelgeNo);
                if($faturadurum=="Fatura Mevcut De??il"){
                    return '<span style="color:red">'.$faturadurum.'</span>';
                }elseif($faturadurum!="Fatura Mevcut De??il"){
                    return'<span style="color:green">'.$faturadurum.'</span>';
                }else{
                    return $faturadurum;
                }
            })->rawColumns(['faturadurum','edit', 'delete'])->make(true);
        return $data;
    }
}
