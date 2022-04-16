<?php

namespace App\Http\Controllers\Urun;

use App\Http\Controllers\Controller;
use App\Models\Logger;
use App\Models\Urun\Urunrota;
use App\Models\Urun\UrunrotaIslem;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UrunrotaController extends Controller
{
    public function urunrota()
    {
        return view('modul.urun.urunrota.urunrota');
    }

    public function urunrotaCreate()
    {
        return view('modul.urun.urunrota.urunrotaekle');
    }

    public function urunrotaStore(Request $request)
    {
        $all = $request->except('_token');
        $islem=$all['islem'];
        unset($all["islem"]);
        $create = Urunrota::create($all);
        if ($create) {
            foreach ($islem as $k => $v) {
                $islemarray = [
                    'urunrotaId' => $create->id,
                    'urunrotaOperasyonKod' => $v["urunrotaOperasyonKod"],
                    'urunrotaIsmerkezKod' => $v["urunrotaIsmerkezKod"],
                    'urunrotaIsistasyonKod' => $v["urunrotaIsistasyonKod"],
                ];
                UrunrotaIslem::create($islemarray);
                Logger::insert("Ürün rotası eklendi","Ürün Rota İşlemleri");
            }
            return redirect()->back()->with("success", "Ürün Rota Başarıyla Oluşturuldu");
        }
    }



    public function urunrotaDelete($id)
    {
        $c = Urunrota::where('id', $id)->count();
        if ($c != 0) {
            $data = Urunrota::where('id', $id)->get();
            Urunrota::where('id', $id)->delete();
            UrunrotaIslem::where('urunrotaId',$id)->delete();
            Logger::insert(\App\Models\Urun\Urunrota::getUrunRotaTip($id). " Silindi","Ürün Rota İşlemleri");
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
    public function urunrotaEdit($id)
    {
        $c = Urunrota::where('id', $id)->count();
        if ($c != 0) {
            $data = Urunrota::where('id', $id)->get();
            $dataIslem=UrunrotaIslem::where('urunrotaId',$id)->get();
            return view('modul.urun.urunrota.urunrotaduzenle', ['data' => $data,'dataIslem'=>$dataIslem]);
        } else {
            return view('/');
        }
    }

    public function urunrotaUpdate(Request $request)
    {
       
        $id=$request->route('id');
        $all = $request->except('_token');
        $islem=$all['islem'];
        unset($all["islem"]);
        $data=Urunrota::where('id',$id)->get();
        if (count($islem)!=0) {
            UrunrotaIslem::where('urunrotaId',$id)->delete();
            foreach ($islem as $k => $v) {
                $islemarray = [
                    'urunrotaId' => $id,
                    'urunrotaOperasyonKod' => $v["urunrotaOperasyonKod"],
                    'urunrotaIsmerkezKod' => $v["urunrotaIsmerkezKod"],
                    'urunrotaIsistasyonKod' => $v["urunrotaIsistasyonKod"],
                ];
                UrunrotaIslem::create($islemarray);
            }
            $update=Urunrota::where('id',$id)->update($all);
            Logger::insert(\App\Models\Urun\Urunrota::getUrunRotaTip($id). " Düzenlendi","Ürün Rota İşlemleri");
            return redirect()->back()->with("success", "Ürün Rota Başarıyla Güncellendi");
        }
    }

    public function urunrotaData(Request $request)
    {
        $table = Urunrota::query();
        $data = DataTables::of($table)
            ->addColumn('edit', function ($table) {
                return '<button type="button" class="btn btn-primary btn-sm "><a style="color: white;" href="' . route('urun.urunrotaEdit', ['id' => $table->id]) . '">Düzenle / İncele</a></button>';
            })->addColumn('delete', function ($table) {
                return '<button type="button" class="btn btn-danger btn-sm"><a style="color: white;" href="' . route('urun.urunrotaDelete', ['id' => $table->id]) . '">Sil</a></button>';
            })->addColumn('firma',function($table){
                return User::getPublicName($table->urunrotaFirmaKod);
            })->rawColumns(['edit', 'delete'])->make(true);
        return $data;
    }
}
