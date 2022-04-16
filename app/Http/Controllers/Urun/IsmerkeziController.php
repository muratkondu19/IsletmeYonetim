<?php

namespace App\Http\Controllers\Urun;

use App\Http\Controllers\Controller;
use App\Models\Logger;
use App\Models\Urun\Ismerkezi;
use App\Models\Urun\IsmerkeziOperasyon;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class IsmerkeziController extends Controller
{
    public function ismerkezi()
    {
        return view('modul.urun.ismerkezi.ismerkezi');
    }

    public function ismerkeziCreate()
    {
        return view('modul.urun.ismerkezi.ismerkeziekle');
    }

    public function ismerkeziStore(Request $request)
    {
        $all = $request->except('_token');
        $operasyon=$all['operasyon'];
        unset($all["operasyon"]);
        $create = Ismerkezi::create($all);
        if ($create) {
            foreach ($operasyon as $k => $v) {
                $islemarray = [
                    'ismerkeziId' => $create->id,
                    'ismerkeziOperasyonKod' => $v["ismerkeziOperasyonKod"],
                    'ismerkeziOperasyonAd' => $v["ismerkeziOperasyonAd"],
                ];
                IsmerkeziOperasyon::create($islemarray);
                Logger::insert("İş merkezi eklendi","İş Merkezi İşlemleri");
            }
            return redirect()->back()->with("success", "İş Merkezi Başarıyla Oluşturuldu");
        }
    }



    public function ismerkeziDelete($id)
    {
        $c = Ismerkezi::where('id', $id)->count();
        if ($c != 0) {
            $data = Ismerkezi::where('id', $id)->get();
            Ismerkezi::where('id', $id)->delete();
            IsmerkeziOperasyon::where('ismerkeziId',$id)->delete();
            Logger::insert(\App\Models\Urun\Ismerkezi::getIsMerkezAd($id). " Silindi","İş Merkezi İşlemleri");
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
    public function ismerkeziEdit($id)
    {
        $c = Ismerkezi::where('id', $id)->count();
        if ($c != 0) {
            $data = Ismerkezi::where('id', $id)->get();
            $dataIslem=IsmerkeziOperasyon::where('ismerkeziId',$id)->get();
            return view('modul.urun.ismerkezi.ismerkeziduzenle', ['data' => $data,'dataIslem'=>$dataIslem]);
        } else {
            return view('/');
        }
    }

    public function ismerkeziUpdate(Request $request)
    {
       
        $id=$request->route('id');
        $all = $request->except('_token');
        $operasyon=$all['operasyon'];
        unset($all["operasyon"]);
        $data=Ismerkezi::where('id',$id)->get();
        if (count($operasyon)!=0) {
            IsmerkeziOperasyon::where('ismerkeziId',$id)->delete();
            foreach ($operasyon as $k => $v) {
                $islemarray = [
                    'ismerkeziId' => $id,
                    'ismerkeziOperasyonKod' => $v["ismerkeziOperasyonKod"],
                    'ismerkeziOperasyonAd' => $v["ismerkeziOperasyonAd"],
                ];
                IsmerkeziOperasyon::create($islemarray);
            }
            $update=Ismerkezi::where('id',$id)->update($all);
            Logger::insert(\App\Models\Urun\Ismerkezi::getIsMerkezAd($id). " Düzenlendi","İş Merkezi İşlemleri");
            return redirect()->back()->with("success", "İş Merkezi Başarıyla Güncellendi");
        }
    }

    public function ismerkeziData(Request $request)
    {
        $table = Ismerkezi::query();
        $data = DataTables::of($table)
            ->addColumn('edit', function ($table) {
                return '<button type="button" class="btn btn-primary btn-sm "><a style="color: white;" href="' . route('urun.ismerkeziEdit', ['id' => $table->id]) . '">Düzenle / İncele</a></button>';
            })->addColumn('delete', function ($table) {
                return '<button type="button" class="btn btn-danger btn-sm"><a style="color: white;" href="' . route('urun.ismerkeziDelete', ['id' => $table->id]) . '">Sil</a></button>';
            })->addColumn('firma',function($table){
                return User::getPublicName($table->ismerkeziFirmaId);
            })->rawColumns(['edit', 'delete'])->make(true);
        return $data;
    }
}
