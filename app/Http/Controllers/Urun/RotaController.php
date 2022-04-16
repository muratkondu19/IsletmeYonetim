<?php

namespace App\Http\Controllers\Urun;

use App\Http\Controllers\Controller;
use App\Models\Logger;
use App\Models\Urun\Operasyon;
use App\Models\Urun\RotaTip;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RotaController extends Controller
{
    public function operasyon()
    {
        return view('modul.urun.operasyon.operasyon');
    }

    public function operasyonCreate()
    {
        return view('modul.urun.operasyon.operasyonekle');
    }

    public function operasyonStore(Request $request)
    {
        $all = $request->except('_token');

        $create = Operasyon::create($all);
        if ($create) {
            Logger::insert("Operasyon eklendi","Rota Operasyon Tanım");
            return redirect()->back()->with("success", "Operasyon Başarıyla Eklendi");
        } else {
            return redirect()->back()->with("error", "Operasyon Eklenemedi.");
        }
    }
    public function operasyonDelete($id)
    {
        $c = Operasyon::where('id', $id)->count();
        if ($c != 0) {
            $data = Operasyon::where('id', $id)->get();
            Operasyon::where('id', $id)->delete();
            Logger::insert(\App\Models\Urun\Operasyon::getOperasyonAd($id). " Silindi","Rota Operasyon İşlemleri");
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
    public function operasyonEdit($id)
    {
        $c = Operasyon::where('id', $id)->count();
        if ($c != 0) {
            $data = Operasyon::where('id', $id)->get();
            return view('modul.urun.operasyon.operasyonduzenle', ['data' => $data]);
        } else {
            return view('/');
        }
    }

    public function operasyonUpdate(Request $request)
    {
        $id = $request->route('id');
        $c = Operasyon::where('id', $id)->count();
        if ($c != 0) {
            $all = $request->except('_token');
            $data = Operasyon::where('id', $id)->get();
            $update = Operasyon::where('id', $id)->update($all);
            if ($update) {
                Logger::insert(\App\Models\Urun\Operasyon::getOperasyonAd($id). " Düzenlendi","Rota Operasyon İşlemleri");
                return redirect()->back()->with("success", "Operasyon Başarıyla Güncellendi");
            } else {
                return redirect()->back()->with("error", "Operasyon Güncellenemedi.");
            }
        } else {
            return redirect('/');
        }
    }

    public function operasyonData(Request $request)
    {
        $table = Operasyon::query();
        $data = DataTables::of($table)
            ->addColumn('edit', function ($table) {
                return '<button type="button" class="btn btn-primary btn-sm "><a style="color: white;" href="' . route('urun.operasyonEdit', ['id' => $table->id]) . '">Düzenle / İncele</a></button>';
            })->addColumn('delete', function ($table) {
                return '<button type="button" class="btn btn-danger btn-sm"><a style="color: white;" href="' . route('urun.operasyonDelete', ['id' => $table->id]) . '">Sil</a></button>';
            })->addColumn('firma',function($table){
                return User::getPublicName($table->operasyonFirmaId);
            })->rawColumns(['edit', 'delete'])->make(true);
        return $data;
    }

    public function rotatip()
    {
        return view('modul.urun.rotatip.rotatip');
    }

    public function rotatipCreate()
    {
        return view('modul.urun.rotatip.rotatipekle');
    }

    public function rotatipStore(Request $request)
    {
        $all = $request->except('_token');

        $create = RotaTip::create($all);
        if ($create) {
            Logger::insert("Rota tipi eklendi","Rota Tip Tanım");
            return redirect()->back()->with("success", "Rota Tipi Başarıyla Eklendi");
        } else {
            return redirect()->back()->with("error", "Rota Tipi Eklenemedi.");
        }
    }
    public function rotatipDelete($id)
    {
        $c = RotaTip::where('id', $id)->count();
        if ($c != 0) {
            $data = RotaTip::where('id', $id)->get();
            RotaTip::where('id', $id)->delete();
            Logger::insert(\App\Models\Urun\RotaTip::getRotatipAd($id). " Silindi","Rota Tip İşlemleri");
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
    public function rotatipEdit($id)
    {
        $c = RotaTip::where('id', $id)->count();
        if ($c != 0) {
            $data = RotaTip::where('id', $id)->get();
            return view('modul.urun.rotatip.rotatipduzenle', ['data' => $data]);
        } else {
            return view('/');
        }
    }

    public function rotatipUpdate(Request $request)
    {
        $id = $request->route('id');
        $c = RotaTip::where('id', $id)->count();
        if ($c != 0) {
            $all = $request->except('_token');
            $data = RotaTip::where('id', $id)->get();
            $update = RotaTip::where('id', $id)->update($all);
            if ($update) {
                Logger::insert(\App\Models\Urun\RotaTip::getRotatipAd($id). " Düzenlendi","Rota Tip İşlemleri");
                return redirect()->back()->with("success", "Rota Tipi Başarıyla Güncellendi");
            } else {
                return redirect()->back()->with("error", "Rota Tipi Güncellenemedi.");
            }
        } else {
            return redirect('/');
        }
    }

    public function rotatipData(Request $request)
    {
        $table = RotaTip::query();
        $data = DataTables::of($table)
            ->addColumn('edit', function ($table) {
                return '<button type="button" class="btn btn-primary btn-sm "><a style="color: white;" href="' . route('urun.rotatipEdit', ['id' => $table->id]) . '">Düzenle / İncele</a></button>';
            })->addColumn('delete', function ($table) {
                return '<button type="button" class="btn btn-danger btn-sm"><a style="color: white;" href="' . route('urun.rotatipDelete', ['id' => $table->id]) . '">Sil</a></button>';
            })->addColumn('firma',function($table){
                return User::getPublicName($table->rotatipFirmaId);
            })->rawColumns(['edit', 'delete'])->make(true);
        return $data;
    }
}
