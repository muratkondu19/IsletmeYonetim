<?php

namespace App\Http\Controllers\Urun;

use App\Http\Controllers\Controller;
use App\Models\Logger;
use App\Models\Urun\Isistasyon;
use App\Models\Urun\IsistasyonOperasyon;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Services\DataTable;

class IsistasyonController extends Controller
{
    public function isistasyon()
    {
        return view('modul.urun.isistasyon.isistasyon');
    }

    public function isistasyonCreate()
    {
        return view('modul.urun.isistasyon.isistasyonekle');
    }

    public function isistasyonStore(Request $request)
    {
        $all = $request->except('_token');
        $create = Isistasyon::create($all);
        if ($create) {
            Logger::insert("İş istasyonu eklendi","İş İstasyonu İşlemleri");
            return redirect()->back()->with("success", "İş İstasyonu Başarıyla Eklendi");
        } else {
            return redirect()->back()->with("error", "İş İstasyonu Eklenemedi.");
        }
    }



    public function isistasyonDelete($id)
    {
        $c = Isistasyon::where('id', $id)->count();
        if ($c != 0) {
            $data = Isistasyon::where('id', $id)->get();
            Isistasyon::where('id', $id)->delete();
            Logger::insert(\App\Models\Urun\Isistasyon::getIsistasyonAd($id). " Silindi","İş İstasyon İşlemleri");
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
    public function isistasyonEdit($id)
    {
        $c = Isistasyon::where('id', $id)->count();
        if ($c != 0) {
            $data = Isistasyon::where('id', $id)->get();
            $dataIslem=IsistasyonOperasyon::where('isistasyonId',$id)->get();
            return view('modul.urun.isistasyon.isistasyonduzenle', ['data' => $data,'dataIslem'=>$dataIslem]);
        } else {
            return view('/');
        }
    }

    public function isistasyonUpdate(Request $request)
    {
        $id = $request->route('id');
        $c = Isistasyon::where('id', $id)->count();
        if ($c != 0) {
            $all = $request->except('_token');
            $data = Isistasyon::where('id', $id)->get();
            $update = Isistasyon::where('id', $id)->update($all);
            if ($update) {
                Logger::insert(\App\Models\Urun\Isistasyon::getIsistasyonAd($id). " Düzenlendi","İş İstasyon İşlemleri");
                return redirect()->back()->with("success", "İş İstasyonu Başarıyla Güncellendi");
            } else {
                return redirect()->back()->with("error", "İş İstasyonu Güncellenemedi");
            }
        } else {
            return redirect('/');
        }
    }
    public function isistasyonData(Request $request)
    {
        $table = Isistasyon::query();
        $data = DataTables::of($table)
            ->addColumn('edit', function ($table) {
                return '<button type="button" class="btn btn-primary btn-sm "><a style="color: white;" href="' . route('urun.isistasyonEdit', ['id' => $table->id]) . '">Düzenle / İncele</a></button>';
            })->addColumn('delete', function ($table) {
                return '<button type="button" class="btn btn-danger btn-sm"><a style="color: white;" href="' . route('urun.isistasyonDelete', ['id' => $table->id]) . '">Sil</a></button>';
            })->addColumn('firma',function($table){
                return User::getPublicName($table->isistasyonFirmaId);
            })->rawColumns(['edit', 'delete'])->make(true);
        return $data;
    }
}
