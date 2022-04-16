<?php

namespace App\Http\Controllers\muhasebe;

use App\Http\Controllers\Controller;
use App\Models\Logger;
use App\Models\Muhasebe\Cari;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Muhasebe\Banka;
use App\Models\Muhasebe\Kasa;
use App\Models\Muhasebe\FisTip;
use App\Models\Muhasebe\HesapKod;
use App\Models\Muhasebe\IslemTip;
use App\Models\Muhasebe\MuhasebeFis;
use App\Models\Muhasebe\MuhasebeFisIslem;
use App\Models\User;
use App\Models\Muhasebe\FinansFis;
use App\Models\Muhasebe\FinansFisIslem;

class MuhasebeController extends Controller
{
    public function cari()
    {
        return view('modul.muhasebe.cari.cari');
    }

    public function cariCreate()
    {
        return view('modul.muhasebe.cari.cariekle');
    }

    public function cariStore(Request $request)
    {
        $all = $request->except('_token');

        $create = Cari::create($all);
        if ($create) {
            Logger::insert("Cari kartı eklendi","Cari Kart Tanım");
            return redirect()->back()->with("success", "Cari Hesap Başarıyla Eklendi");
        } else {
            return redirect()->back()->with("error", "Cari Hesap Eklenemedi.");
        }
    }
    public function cariDelete($id)
    {
        $c = Cari::where('id', $id)->count();
        if ($c != 0) {
            $data = Cari::where('id', $id)->get();
            Cari::where('id', $id)->delete();
            Logger::insert(\App\Models\Muhasebe\Cari::getCariAd($id). " Silindi.","Cari Kart Tanım");
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
    public function cariEdit($id)
    {
        $c = Cari::where('id', $id)->count();
        if ($c != 0) {
            $data = Cari::where('id', $id)->get();
            return view('modul.muhasebe.cari.cariduzenle', ['data' => $data]);
        } else {
            return view('/');
        }
    }

    public function cariUpdate(Request $request)
    {
        $id = $request->route('id');
        $c = Cari::where('id', $id)->count();
        if ($c != 0) {
            $all = $request->except('_token');
            $data = Cari::where('id', $id)->get();
            $update = Cari::where('id', $id)->update($all);
            if ($update) {
                Logger::insert(\App\Models\Muhasebe\Cari::getCariAd($id). " Düzenlendi","Cari Kart Tanım");
                return redirect()->back()->with("success", "Cari Hesap Başarıyla Güncellendi");
            } else {
                return redirect()->back()->with("error", "Cari Hesap Güncellenemedi.");
            }
        } else {
            return redirect('/');
        }
    }

    public function cariData(Request $request)
    {
        $table = Cari::query();
        $data = DataTables::of($table)
            ->addColumn('edit', function ($table) {
                return '<button type="button" class="btn btn-primary btn-sm "><a style="color: white;" href="' . route('muhasebe.cariEdit', ['id' => $table->id]) . '">Düzenle / İncele</a></button>';
            })->addColumn('delete', function ($table) {
                return '<button type="button" class="btn btn-danger btn-sm"><a style="color: white;" href="' . route('muhasebe.cariDelete', ['id' => $table->id]) . '">Sil</a></button>';
            })->rawColumns(['edit', 'delete'])->make(true);
        return $data;
    }



    public function banka()
    {
        return view('modul.muhasebe.banka.banka');
    }

    public function bankaCreate()
    {
        return view('modul.muhasebe.banka.bankaekle');
    }

    public function bankaStore(Request $request)
    {
        $all = $request->except('_token');

        $create = Banka::create($all);
        if ($create) {
            Logger::insert("Banka kartı eklendi","Banka Kart Tanım");
            return redirect()->back()->with("success", "Banka Hesabı Başarıyla Eklendi");
        } else {
            return redirect()->back()->with("error", "Banka Hesabı Eklenemedi");
        }
    }
    public function bankaDelete($id)
    {
        $c = Banka::where('id', $id)->count();
        if ($c != 0) {
            $data = Banka::where('id', $id)->get();
            Banka::where('id', $id)->delete();
            Logger::insert(\App\Models\Muhasebe\Banka::getBankaAd($id). " Silindi.","Banka Kart Tanım");
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
    public function bankaEdit($id)
    {
        $c = Banka::where('id', $id)->count();
        if ($c != 0) {
            $data = Banka::where('id', $id)->get();
            return view('modul.muhasebe.banka.bankaduzenle', ['data' => $data]);
        } else {
            return view('/');
        }
    }

    public function bankaUpdate(Request $request)
    {
        $id = $request->route('id');
        $c = Banka::where('id', $id)->count();
        if ($c != 0) {
            $all = $request->except('_token');
            $data = Banka::where('id', $id)->get();
            $update = Banka::where('id', $id)->update($all);
            if ($update) {
                Logger::insert(\App\Models\Muhasebe\Banka::getBankaAd($id). " Düzenlendi","Banka Kart Tanım");
                return redirect()->back()->with("success", "Banka Hesabı Başarıyla Güncellendi");
            } else {
                return redirect()->back()->with("error", "Banka Hesabı Güncellenemedi.");
            }
        } else {
            return redirect('/');
        }
    }

    public function bankaData(Request $request)
    {
        $table = Banka::query();
        $data = DataTables::of($table)
            ->addColumn('edit', function ($table) {
                return '<button type="button" class="btn btn-primary btn-sm "><a style="color: white;" href="' . route('muhasebe.bankaEdit', ['id' => $table->id]) . '">Düzenle / İncele</a></button>';
            })->addColumn('delete', function ($table) {
                return '<button type="button" class="btn btn-danger btn-sm"><a style="color: white;" href="' . route('muhasebe.bankaDelete', ['id' => $table->id]) . '">Sil</a></button>';
            })->editColumn('bankaTip', function ($table) {
                if ($table->bankaTip == 'musteri') {
                    return "Müşteri";
                } elseif ($table->bankaTip == 'tedarikci') {
                    return "Tedarikçi";
                } elseif ($table->bankaTip == 'bayi') {
                    return "Bayi";
                } elseif ($table->bankaTip == 'servis') {
                    return "Servis";
                }
            })->rawColumns(['edit', 'delete'])->make(true);
        return $data;
    }




    public function kasa()
    {
        return view('modul.muhasebe.kasa.kasa');
    }

    public function kasaCreate()
    {
        return view('modul.muhasebe.kasa.kasaekle');
    }

    public function kasaStore(Request $request)
    {
        $all = $request->except('_token');

        $create = Kasa::create($all);
        if ($create) {
            Logger::insert("Kasa kartı eklendi","Kasa Kart Tanım");
            return redirect()->back()->with("success", "Kasa Hesabı Başarıyla Eklendi");
        } else {
            return redirect()->back()->with("error", "Kasa Hesabı Eklenemedi.");
        }
    }
    public function kasaDelete($id)
    {
        $c = Kasa::where('id', $id)->count();
        if ($c != 0) {
            $data = Kasa::where('id', $id)->get();
            Kasa::where('id', $id)->delete();
            Logger::insert(\App\Models\Muhasebe\Kasa::getKasaAd($id). " Silindi.","Kasa Tanım");
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
    public function kasaEdit($id)
    {
        $c = Kasa::where('id', $id)->count();
        if ($c != 0) {
            $data = Kasa::where('id', $id)->get();
            return view('modul.muhasebe.kasa.kasaduzenle', ['data' => $data]);
        } else {
            return view('/');
        }
    }

    public function kasaUpdate(Request $request)
    {
        $id = $request->route('id');
        $c = Kasa::where('id', $id)->count();
        if ($c != 0) {
            $all = $request->except('_token');
            $data = Kasa::where('id', $id)->get();
            $update = Kasa::where('id', $id)->update($all);
            if ($update) {
                Logger::insert(\App\Models\Muhasebe\Kasa::getKasaAd($id). " Düzenlendi","Kasa Kart Tanım");
                return redirect()->back()->with("success", "Kasa Hesabı Başarıyla Güncellendi");
            } else {
                return redirect()->back()->with("error", "Kasa Hesabı Güncellenemedi.");
            }
        } else {
            return redirect('/');
        }
    }

    public function kasaData(Request $request)
    {
        $table = Kasa::query();
        $data = DataTables::of($table)
            ->addColumn('edit', function ($table) {
                return '<button type="button" class="btn btn-primary btn-sm "><a style="color: white;" href="' . route('muhasebe.kasaEdit', ['id' => $table->id]) . '">Düzenle / İncele</a></button>';
            })->addColumn('delete', function ($table) {
                return '<button type="button" class="btn btn-danger btn-sm"><a style="color: white;" href="' . route('muhasebe.kasaDelete', ['id' => $table->id]) . '">Sil</a></button>';
            })->rawColumns(['edit', 'delete'])->make(true);
        return $data;
    }




    public function fistip()
    {
        return view('modul.muhasebe.fistip.fistip');
    }

    public function fistipCreate()
    {
        return view('modul.muhasebe.fistip.fistipekle');
    }

    public function fistipStore(Request $request)
    {
        $all = $request->except('_token');

        $create = FisTip::create($all);
        if ($create) {
            Logger::insert("Fiş Tipi eklendi","Fiş Tipi Tanım");
            return redirect()->back()->with("success", "Fiş Tipi Başarıyla Eklendi");
        } else {
            return redirect()->back()->with("error", "Fiş Tipi Eklenemedi.");
        }
    }
    public function fistipDelete($id)
    {
        $c = FisTip::where('id', $id)->count();
        if ($c != 0) {
            $data = FisTip::where('id', $id)->get();
            FisTip::where('id', $id)->delete();
            Logger::insert(\App\Models\Muhasebe\FisTip::getFisTipAd($id). " Silindi.","Fiş Tip Tanım");
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
    public function fistipEdit($id)
    {
        $c = FisTip::where('id', $id)->count();
        if ($c != 0) {
            $data = FisTip::where('id', $id)->get();
            return view('modul.muhasebe.fistip.fistipduzenle', ['data' => $data]);
        } else {
            return view('/');
        }
    }

    public function fistipUpdate(Request $request)
    {
        $id = $request->route('id');
        $c = FisTip::where('id', $id)->count();
        if ($c != 0) {
            $all = $request->except('_token');
            $data = FisTip::where('id', $id)->get();
            $update = FisTip::where('id', $id)->update($all);
            if ($update) {
                Logger::insert(\App\Models\Muhasebe\FisTip::getFisTipAd($id). " Düzenlendi","Diş Tip Tanım");
                return redirect()->back()->with("success", "Fiş Tipi Başarıyla Güncellendi");
            } else {
                return redirect()->back()->with("error", "Fiş Tipi Güncellenemedi");
            }
        } else {
            return redirect('/');
        }
    }

    public function fistipData(Request $request)
    {
        $table = FisTip::query();
        $data = DataTables::of($table)
            ->addColumn('edit', function ($table) {
                return '<button type="button" class="btn btn-primary btn-sm "><a style="color: white;" href="' . route('muhasebe.fistipEdit', ['id' => $table->id]) . '">Düzenle / İncele</a></button>';
            })->addColumn('delete', function ($table) {
                return '<button type="button" class="btn btn-danger btn-sm"><a style="color: white;" href="' . route('muhasebe.fistipDelete', ['id' => $table->id]) . '">Sil</a></button>';
            })->rawColumns(['edit', 'delete'])->make(true);
        return $data;
    }




    public function islemtip()
    {
        return view('modul.muhasebe.islemtip.islemtip');
    }

    public function islemtipCreate()
    {
        return view('modul.muhasebe.islemtip.islemtipekle');
    }

    public function islemtipStore(Request $request)
    {
        $all = $request->except('_token');

        $create = IslemTip::create($all);
        if ($create) {
            Logger::insert("İşlem tipi eklendi","İşlem Tipi Tanım");
            return redirect()->back()->with("success", "İşlem Tipi Başarıyla Eklendi");
        } else {
            return redirect()->back()->with("error", "İşlem Tipi Eklenemedi.");
        }
    }
    public function islemtipDelete($id)
    {
        $c = IslemTip::where('id', $id)->count();
        if ($c != 0) {
            $data = IslemTip::where('id', $id)->get();
            IslemTip::where('id', $id)->delete();
            Logger::insert(\App\Models\Muhasebe\IslemTip::getIslemTipAd($id). " Silindi.","İşlem Tip Tanım");
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
    public function islemtipEdit($id)
    {
        $c = IslemTip::where('id', $id)->count();
        if ($c != 0) {
            $data = IslemTip::where('id', $id)->get();
            return view('modul.muhasebe.islemtip.islemtipduzenle', ['data' => $data]);
        } else {
            return view('/');
        }
    }

    public function islemtipUpdate(Request $request)
    {
        $id = $request->route('id');
        $c = IslemTip::where('id', $id)->count();
        if ($c != 0) {
            $all = $request->except('_token');
            $data = IslemTip::where('id', $id)->get();
            $update = IslemTip::where('id', $id)->update($all);
            if ($update) {
                Logger::insert(\App\Models\Muhasebe\IslemTip::getIslemTipAd($id). " Düzenlendi","İşlem Tipi Tanım");
                return redirect()->back()->with("success", "İşlem Tipi Başarıyla Güncellendi");
            } else {
                return redirect()->back()->with("error", "İşlem Tipi Güncellenemedi.");
            }
        } else {
            return redirect('/');
        }
    }

    public function islemtipData(Request $request)
    {
        $table = IslemTip::query();
        $data = DataTables::of($table)
            ->addColumn('edit', function ($table) {
                return '<button type="button" class="btn btn-primary btn-sm "><a style="color: white;" href="' . route('muhasebe.islemtipEdit', ['id' => $table->id]) . '">Düzenle / İncele</a></button>';
            })->addColumn('delete', function ($table) {
                return '<button type="button" class="btn btn-danger btn-sm"><a style="color: white;" href="' . route('muhasebe.islemtipDelete', ['id' => $table->id]) . '">Sil</a></button>';
            })->rawColumns(['edit', 'delete'])->make(true);
        return $data;
    }


    public function muhasebefis()
    {
        return view('modul.muhasebe.muhasebefis.muhasebefis');
    }

    public function muhasebefisCreate()
    {
        return view('modul.muhasebe.muhasebefis.muhasebefisekle');
    }

    public function muhasebefisStore(Request $request)
    {
        $all = $request->except('_token');
        $islem = $all["islem"];
        unset($all["islem"]);
        $create = MuhasebeFis::create($all);
        if ($create) {
            foreach ($islem as $k => $v) {
                $islemarray = [
                    'miFisId' => $create->id,
                    'miIslemTipKod' => $v["miIslemTipKod"],
                    'miIslemTipAd' => $v["miIslemTipAd"],
                    'miMHK' => $v["miMHK"],
                    'miMHA' => $v["miMHA"],
                    'miTutar' => $v["miTutar"],
                    'miBA' => $v["miBA"],
                ];
                MuhasebeFisIslem::create($islemarray);
                Logger::insert("Muhasebe fişi eklendi","Muhasebe Fiş İşlemleri");
            }
            return redirect()->back()->with("success", "Muhasebe Fişi Başarıyla Oluşturuldu");
        }
    }
    public function muhasebefisDelete($id)
    {
        $c = MuhasebeFis::where('id', $id)->count();
        if ($c != 0) {
            $data = MuhasebeFis::where('id', $id)->get();
            MuhasebeFis::where('id', $id)->delete();
            MuhasebeFisIslem::where('miFisId',$id)->delete();
            Logger::insert(\App\Models\Muhasebe\MuhasebeFis::getMuhasebeFisKod($id). " Silindi.","Muhasebe Fiş İşlemleri");
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
    public function muhasebefisEdit($id)
    {

        $c = MuhasebeFis::where('id', $id)->count();
        if ($c != 0) {
            $data = MuhasebeFis::where('id', $id)->get();
            $dataIslem=MuhasebeFisIslem::where('miFisId',$id)->get();
            return view('modul.muhasebe.muhasebefis.muhasebefisduzenle', ['data' => $data,'dataIslem'=>$dataIslem]);
        } else {
            return view('/');
        }
    }

    public function muhasebefisUpdate(Request $request)
    {
        $id=$request->route('id');
        $all = $request->except('_token');
        $islem = $all["islem"];
        unset($all["islem"]);
        $data=MuhasebeFis::where('id',$id)->get();
        if (count($islem)!=0) {
            MuhasebeFisIslem::where('miFisId',$id)->delete();
            foreach ($islem as $k => $v) {
                $islemarray = [
                    'miFisId' => $id,
                    'miIslemTipKod' => $v["miIslemTipKod"],
                    'miIslemTipAd' => $v["miIslemTipAd"],
                    'miMHK' => $v["miMHK"],
                    'miMHA' => $v["miMHA"],
                    'miTutar' => $v["miTutar"],
                    'miBA' => $v["miBA"],
                ];
                MuhasebeFisIslem::create($islemarray);
                Logger::insert(\App\Models\Muhasebe\MuhasebeFis::getMuhasebeFisKod($id). " Düzenlendi","Muhasebe Fiş İşlemleri");
            }
            $update=MuhasebeFis::where('id',$id)->update($all);
            return redirect()->back()->with("success", "Muhasebe Fişi Başarıyla Güncellendi");
        }
    }

    public function muhasebefisData(Request $request)
    {
        $table = MuhasebeFis::query();
        $data = DataTables::of($table)
            ->addColumn('edit', function ($table) {
                return '<button type="button" class="btn btn-primary btn-sm "><a style="color: white;" href="' . route('muhasebe.muhasebefisEdit', ['id' => $table->id]) . '">Düzenle / İncele</a></button>';
            })->addColumn('delete', function ($table) {
                return '<button type="button" class="btn btn-danger btn-sm"><a style="color: white;" href="' . route('muhasebe.muhasebefisDelete', ['id' => $table->id]) . '">Sil</a></button>';
            })->addColumn('firma',function($table){
                return User::getPublicName($table->miFirmaId);
            })->rawColumns(['edit', 'delete'])->make(true);
        return $data;
    }



    public function althesap()
    {
        return view('modul.muhasebe.althesap.althesap');
    }

    public function althesapCreate()
    {
        return view('modul.muhasebe.althesap.althesapekle');
    }

    public function althesapStore(Request $request)
    {
        $all = $request->except('_token');

        $create = HesapKod::create($all);
        if ($create) {
            Logger::insert("Alt hesap eklendi","Alt Hesap Tanım");
            return redirect()->back()->with("success", "Hesap Kodu Başarıyla Eklendi");
        } else {
            return redirect()->back()->with("error", "Hesap Kodu Eklemesi Başarısız Oldu.");
        }
    }
    public function althesapDelete($id)
    {
        $c = HesapKod::where('id', $id)->count();
        if ($c != 0) {
            $data = HesapKod::where('id', $id)->get();
            HesapKod::where('id', $id)->delete();
            Logger::insert(\App\Models\Muhasebe\HesapKod::getHesapAd($id). " Silindi.","Alt Hesap İşlemleri");
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
    public function althesapEdit($id)
    {
        $c = HesapKod::where('id', $id)->count();
        if ($c != 0) {
            $data = HesapKod::where('id', $id)->get();
            return view('modul.muhasebe.althesap.althesapduzenle', ['data' => $data]);
        } else {
            return view('/');
        }
    }

    public function althesapUpdate(Request $request)
    {
        $id = $request->route('id');
        $c = HesapKod::where('id', $id)->count();
        if ($c != 0) {
            $all = $request->except('_token');
            $data = HesapKod::where('id', $id)->get();
            $update = HesapKod::where('id', $id)->update($all);
            if ($update) {
                Logger::insert(\App\Models\Muhasebe\HesapKod::getHesapAd($id). " Düzenlendi","Alt Hesap Tanım");
                return redirect()->back()->with("success", "Hesap Kodu Başarıyla Güncellendi");
            } else {
                return redirect()->back()->with("error", "Hesap Kodu Güncellenemedi.");
            }
        } else {
            return redirect('/');
        }
    }

    public function althesapData(Request $request)
    {
        $table = HesapKod::query();
        $data = DataTables::of($table)
            ->addColumn('edit', function ($table) {
                return '<button type="button" class="btn btn-primary btn-sm "><a style="color: white;" href="' . route('muhasebe.althesapEdit', ['id' => $table->id]) . '">Düzenle / İncele</a></button>';
            })->addColumn('delete', function ($table) {
                return '<button type="button" class="btn btn-danger btn-sm"><a style="color: white;" href="' . route('muhasebe.althesapDelete', ['id' => $table->id]) . '">Sil</a></button>';
            })->rawColumns(['edit', 'delete'])->make(true);
        return $data;
    }



    public function finansfis()
    {
        return view('modul.muhasebe.finansfis.finansfis');
    }

    public function finansfisCreate()
    {
        return view('modul.muhasebe.finansfis.finansfisekle');
    }

    public function finansfisStore(Request $request)
    {
        $all = $request->except('_token');
        $islem = $all["islem"];
        unset($all["islem"]);
        $create = FinansFis::create($all);
        if ($create) {
            foreach ($islem as $k => $v) {
                $islemarray = [
                    'fiFisId' => $create->id,
                    'fiIslemTipKod' => $v["fiIslemTipKod"],
                    'fiIslemTipAd' => $v["fiIslemTipAd"],
                    'fiMHK' => $v["fiMHK"],
                    'fiMHA' => $v["fiMHA"],
                    'fiTutar' => $v["fiTutar"],
                    'fiBA' => $v["fiBA"],
                ];
                FinansFisIslem::create($islemarray);
                Logger::insert("Finans fişi eklendi","Finans Fiş Tanım");
            }
            return redirect()->back()->with("success", "Finans Fişi Başarıyla Oluşturuldu");
        }
    }
    public function finansfisDelete($id)
    {
        $c = FinansFis::where('id', $id)->count();
        if ($c != 0) {
            $data = FinansFis::where('id', $id)->get();
            FinansFis::where('id', $id)->delete();
            FinansFisIslem::where('fiFisId', $id)->delete();
            Logger::insert(\App\Models\Muhasebe\FinansFis::getHesapAd($id). " Silindi.","Finans Fiş İşlemleri");
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
    public function finansfisEdit($id)
    {

        $c = FinansFis::where('id', $id)->count();
        if ($c != 0) {
            $data = FinansFis::where('id', $id)->get();
            $dataIslem=FinansFisIslem::where('fiFisId',$id)->get();
            return view('modul.muhasebe.finansfis.finansfisduzenle', ['data' => $data,'dataIslem'=>$dataIslem]);
        } else {
            return view('/');
        }
    }

    public function finansfisUpdate(Request $request)
    {
        $id=$request->route('id');
        $all = $request->except('_token');
        $islem = $all["islem"];
        unset($all["islem"]);
        $data=FinansFis::where('id',$id)->get();
        if (count($islem)!=0) {
            FinansFisIslem::where('fiFisId',$id)->delete();
            foreach ($islem as $k => $v) {
                $islemarray = [
                    'fiFisId' => $id,
                    'fiIslemTipKod' => $v["fiIslemTipKod"],
                    'fiIslemTipAd' => $v["fiIslemTipAd"],
                    'fiMHK' => $v["fiMHK"],
                    'fiMHA' => $v["fiMHA"],
                    'fiTutar' => $v["fiTutar"],
                    'fiBA' => $v["fiBA"],
                ];
                FinansFisIslem::create($islemarray);
                Logger::insert(\App\Models\Muhasebe\FinansFis::getFinansFisKod($id). " Düzenlendi","Finans Fiş İşlemleri");
            }
            $update=FinansFis::where('id',$id)->update($all);
            return redirect()->back()->with("success", "Finans Fişi Başarıyla Güncellendi");
        }
    }

    public function finansfisData(Request $request)
    {
        $table = FinansFis::query();
        $data = DataTables::of($table)
            ->addColumn('edit', function ($table) {
                return '<button type="button" class="btn btn-primary btn-sm "><a style="color: white;" href="' . route('muhasebe.finansfisEdit', ['id' => $table->id]) . '">Düzenle / İncele</a></button>';
            })->addColumn('delete', function ($table) {
                return '<button type="button" class="btn btn-danger btn-sm"><a style="color: white;" href="' . route('muhasebe.finansfisDelete', ['id' => $table->id]) . '">Sil</a></button>';
            })->addColumn('firma',function($table){
                return User::getPublicName($table->fiFirmaId);
            })->rawColumns(['edit', 'delete'])->make(true);
        return $data;
    }
}
