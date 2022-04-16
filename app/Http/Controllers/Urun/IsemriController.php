<?php

namespace App\Http\Controllers\Urun;

use App\Http\Controllers\Controller;
use App\Models\Logger;
use App\Models\Urun\Isemri;
use App\Models\Urun\UretimGiris;
use App\Models\Urun\Urunagaci;
use App\Models\Urun\UrunagaciMalzeme;
use App\Models\Urun\Urunrota;
use App\Models\Urun\UrunrotaIslem;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class IsemriController extends Controller
{
    public function isemri()
    {
        return view('modul.urun.isemri.isemri');
    }

    public function isemriCreate()
    {
        return view('modul.urun.isemri.isemriekle');
    }

    public function isemriStore(Request $request)
    {
        $all = $request->except('_token');
        
        $create = Isemri::create($all);
        if ($create) {
            Logger::insert("İş emri eklendi","İş Emri İşlemleri");
            return redirect()->back()->with("success", "İş Emri Başarılı Olarak Eklendi");
        } else {
            return redirect()->back()->with("error", "İş Eklenemedi");
        }
    }

    

    public function isemriDetay($id)
    {
        $c = Isemri::where('id', $id)->count();
        if ($c != 0) {
            $data = Isemri::where('id', $id)->get();
            $rota=Urunrota::all();
            $rotaIslem=UrunrotaIslem::all();
            $agac=Urunagaci::all();
            $agacmalzeme=UrunagaciMalzeme::all();
            return view('modul.urun.isemri.isemridetay', ['data' => $data,'rota'=>$rota,'rotaIslem'=>$rotaIslem,'agac'=>$agac,'agacmalzeme'=>$agacmalzeme]);
        } else {
            return view('/');
        }
    }



    public function isemriDelete($id)
    {
        $c = Isemri::where('id', $id)->count();
        if ($c != 0) {
            $data = Isemri::where('id', $id)->get();
            Isemri::where('id', $id)->delete();
            Logger::insert(\App\Models\Urun\Isemri::getIsEmriKod($id). " Silindi","İş Emri İşlemleri");
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
    public function isemriEdit($id)
    {
        $c = Isemri::where('id', $id)->count();
        if ($c != 0) {
            $data = Isemri::where('id', $id)->get();
            $dataIslem=Isemri::where('isemriId',$id)->get();
            return view('modul.urun.isemri.isemriduzenle', ['data' => $data,'dataIslem'=>$dataIslem]);
        } else {
            return view('/');
        }
    }

    public function isemriUpdate(Request $request)
    {
       
        $id=$request->route('id');
        $all = $request->except('_token');
        $islem=$all['islem'];
        unset($all["islem"]);
        $data=Isemri::where('id',$id)->get();
        if (count($islem)!=0) {
            Isemri::where('isemriId',$id)->delete();
            foreach ($islem as $k => $v) {
                $islemarray = [
                    'isemriId' => $id,
                    'isemriOperasyonKod' => $v["isemriOperasyonKod"],
                    'isemriIsmerkezKod' => $v["isemriIsmerkezKod"],
                    'isemriIsistasyonKod' => $v["isemriIsistasyonKod"],
                ];
                Isemri::create($islemarray);
                Logger::insert(\App\Models\Urun\Isemri::getIsEmriKod($id). " Düzenlendi","İş Emri İşlemleri");
            }
            $update=Isemri::where('id',$id)->update($all);
            return redirect()->back()->with("success", "İş Emri Başarıyla Güncellendi");
        }
    }

    public function isemriData(Request $request)
    {
        $table = Isemri::query();
        $data = DataTables::of($table)
            ->addColumn('edit', function ($table) {
                return '<button type="button" class="btn btn-primary btn-sm "><a style="color: white;" href="' . route('urun.isemriEdit', ['id' => $table->id]) . '">Düzenle / İncele</a></button>';
            })->addColumn('delete', function ($table) {
                return '<button type="button" class="btn btn-danger btn-sm"><a style="color: white;" href="' . route('urun.isemriDelete', ['id' => $table->id]) . '">Sil</a></button>';
            })->addColumn('detay', function ($table) {
                return '<button type="button" class="btn btn-success btn-sm"><a style="color: white;" href="' . route('urun.isemriDetay', ['id' => $table->id]) . '">İş Emri Detay</a></button>';
            })->addColumn('firma',function($table){
                return User::getPublicName($table->isemriFirmaKod);
            })->addColumn('uretimdurum',function($table){
                $uretimgiris=UretimGiris::getUretimIsEmriKod($table->isemriNumara);
                if($uretimgiris=="Üretim Girişi Yok"){
                    return '<span style="color:red">'.$uretimgiris.'</span>';
                }elseif($uretimgiris!="Üretim Girişi Yok"){
                    return'<span style="color:green">'.$uretimgiris.'</span>';
                }else{
                    return $uretimgiris;
                }
            })->rawColumns(['uretimdurum','edit', 'delete','detay'])->make(true);
        return $data;
    }
}
