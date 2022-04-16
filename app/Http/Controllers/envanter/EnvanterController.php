<?php

namespace App\Http\Controllers\envanter;

use App\DataTables\Envanter\DepoDatatable;
use App\Http\Controllers\Controller;
use App\Models\Envanter\Depo;
use App\Models\Envanter\StokHareket;
use App\Models\Envanter\StokKart;
use App\Models\Logger;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
class EnvanterController extends Controller
{
    public function stokkart()
    {
        return view('modul.envanter.stokkart.stokkart');
    }

    public function stokkartCreate()
    {
        return view('modul.envanter.stokkart.stokkartekle');
    }

    public function stokkartStore(Request $request)
    {
        $all = $request->except('_token');

        $create = StokKart::create($all);
        if ($create) {
            Logger::insert("Stok kartı eklendi","Stok Kart Tanım");
            return redirect()->back()->with("success", "Stok Kartı Başarıyla Eklendi");
        } else {
            return redirect()->back()->with("error", "Stok Kartı Eklenemedi");
        }
    }
    public function stokkartDelete($id)
    {
        $c = StokKart::where('id', $id)->count();
        if ($c != 0) {
            $data = StokKart::where('id', $id)->get();
            StokKart::where('id', $id)->delete();
            return redirect()->back();
            Logger::insert(\App\Models\Envanter\StokKart::getStokAd($id). " Silindi.","Stok Kart Tanım");
        } else {
            return redirect('/');
        }
    }
    public function stokkartEdit($id)
    {
        $c = StokKart::where('id', $id)->count();
        if ($c != 0) {
            $data = StokKart::where('id', $id)->get();
            return view('modul.envanter.stokkart.stokkartduzenle', ['data' => $data]);
        } else {
            return view('/');
        }
    }

    public function stokkartUpdate(Request $request)
    {
        $id = $request->route('id');
        $c = StokKart::where('id', $id)->count();
        if ($c != 0) {
            $all = $request->except('_token');
            $data = StokKart::where('id', $id)->get();
            $update = StokKart::where('id', $id)->update($all);
            if ($update) {
                Logger::insert(\App\Models\Envanter\StokKart::getStokAd($id). " Düzenlendi","Stok Kart Tanım");
                return redirect()->back()->with("success", "Stok Kartı Başarıyla Güncellendi");
            } else {
                return redirect()->back()->with("error", "Stok Kartı Güncellenemedi");
            }
        } else {
            return redirect('/');
        }
    }

    public function stokkartData(Request $request)
    {
        $table = StokKart::query();
        $data = DataTables::of($table)
            ->addColumn('edit', function ($table) {
                return '<button type="button" class="btn btn-primary btn-sm "><a style="color: white;" href="' . route('envanter.stokkartEdit', ['id' => $table->id]) . '">Düzenle / İncele</a></button>';
            })->addColumn('delete', function ($table) {
                return '<button type="button" class="btn btn-danger btn-sm"><a style="color: white;" href="' . route('envanter.stokkartDelete', ['id' => $table->id]) . '">Sil</a></button>';
            })->rawColumns(['edit', 'delete'])->make(true);
        return $data;
    }

    // ------------------------------------------------------------ 

    public function depo()
    {
        return view('modul.envanter.depo.depo');
    }

    public function depoCreate()
    {
        return view('modul.envanter.depo.depoekle');
    }

    public function depoStore(Request $request)
    {
        $all = $request->except('_token');

        $create = Depo::create($all);
        if ($create) {
            Logger::insert("Depo kartı eklendi","Depo Kart Tanım");
            return redirect()->back()->with("success", "Depo Başarıyla Eklendi");
        } else {
            return redirect()->back()->with("error", "Depo Eklemesi Başarısız Oldu");
        }
    }
    public function depoDelete($id)
    {
        $c = Depo::where('id', $id)->count();
        if ($c != 0) {
            $data = Depo::where('id', $id)->get();
            Depo::where('id', $id)->delete();
            Logger::insert(\App\Models\Envanter\Depo::getDepoAd($id). " Silindi.","Depo Kart Tanım");
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
    public function depoEdit($id)
    {
        $c = Depo::where('id', $id)->count();
        if ($c != 0) {
            $data = Depo::where('id', $id)->get();
            return view('modul.envanter.depo.depoduzenle', ['data' => $data]);
        } else {
            return view('/');
        }
    }

    public function depoUpdate(Request $request)
    {
        $id = $request->route('id');
        $c = Depo::where('id', $id)->count();
        if ($c != 0) {
            $all = $request->except('_token');
            $data = Depo::where('id', $id)->get();
            $update = Depo::where('id', $id)->update($all);
            if ($update) {
                Logger::insert(\App\Models\Envanter\Depo::getDepoAd($id). " Düzenlendi","Depo Kart Tanım");
                return redirect()->back()->with("success", "Depo Başarıyla Güncellendi");
            } else {
                return redirect()->back()->with("eror", "Depo Güncellemesi Başarısız Oldu.");
            }
        } else {
            return redirect('/');
        }
    }
 

    public function depoData(Request $request)
    {
        $table = Depo::query();
        $data = DataTables::of($table)
            ->addColumn('edit', function ($table) {
                return '<button type="button" class="btn btn-primary btn-sm "><a style="color: white;" href="' . route('envanter.depoEdit', ['id' => $table->id]) . '">Düzenle / İncele</a></button>';
            })->addColumn('delete', function ($table) {
                return '<button type="button" class="btn btn-danger btn-sm"><a style="color: white;" href="' . route('envanter.depoDelete', ['id' => $table->id]) . '">Sil</a></button>';
            })->addColumn('firma',function($table){
                return User::getPublicName($table->depoFirmaId);
            })->rawColumns(['edit', 'delete'])->make(true);
        return $data;
    }

    // --------------------------------------------------------- 
    public function stokhareket()
    {
        return view('modul.envanter.stokhareket.stokhareket');
    }

    public function stokhareketCreate()
    {
        return view('modul.envanter.stokhareket.stokhareketekle');
    }

    public function stokhareketStore(Request $request)
    {
        $all = $request->except('_token');

        $create = StokHareket::create($all);
        if ($create) {
            return redirect()->back()->with("success", "Depo Başarıyla Eklendi");
        } else {
            return redirect()->back()->with("error", "Depo Eklemesi Başarısız Oldu");
        }
    }
    public function stokhareketDelete($id)
    {
        $c = StokHareket::where('id', $id)->count();
        if ($c != 0) {
            $data = StokHareket::where('id', $id)->get();
            StokHareket::where('id', $id)->delete();
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
    public function stokhareketEdit($id)
    {
        $c = StokHareket::where('id', $id)->count();
        if ($c != 0) {
            $data = StokHareket::where('id', $id)->get();
            return view('modul.envanter.stokhareket.stokhareketduzenle', ['data' => $data]);
        } else {
            return view('/');
        }
    }

    public function stokhareketUpdate(Request $request)
    {
        $id = $request->route('id');
        $c = StokHareket::where('id', $id)->count();
        if ($c != 0) {
            $all = $request->except('_token');
            $data = StokHareket::where('id', $id)->get();
            $update = StokHareket::where('id', $id)->update($all);
            if ($update) {
                return redirect()->back()->with("success", "Depo Başarıyla Güncellendi");
            } else {
                return redirect()->back()->with("error", "Depo Güncellemesi Başarısız Oldu");
            }
        } else {
            return redirect('/');
        }
    }

    public function stokhareketData(Request $request)
    {
        $table = StokHareket::query();
        $data = DataTables::of($table)
        ->addColumn('depo',function($table){
            return Depo::getDepoAd($table->stokHareketDepo);
        })->addColumn('stok',function($table){
            return StokKart::getStokAd($table->stokHareketAd);
        })->addColumn('durum',function($table){
            $durum=StokHareket::getHareketDurum($table->id);
            if($durum=='Çıktı'){
                return '<span style="color:red">-'.$durum.'</span>';
            }elseif($durum=='Girdi'){
                return'<span style="color:green">+'.$durum.'</span>';
            }else{
                return $durum;
            }
        })->rawColumns(['durum'])->make(true);
        return $data;
    }
}
