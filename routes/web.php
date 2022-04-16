<?php

use App\Http\Controllers\envanter\EnvanterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\muhasebe\MuhasebeController;
use App\Http\Controllers\muhasebe\SatinalmaFaturaController;
use App\Http\Controllers\muhasebe\SatisFaturaController;
use App\Http\Controllers\satinalma\SatinalmaController;
use App\Http\Controllers\satinalma\SatinalmaTeklifController;
use App\Http\Controllers\satinalma\TeklifToSatinalmaController;
use App\Http\Controllers\satissiparis\SatisSiparisController;
use App\Http\Controllers\satissiparis\SatisTeklifController;
use App\Http\Controllers\satissiparis\TeklifToSatisController;
use App\Http\Controllers\Urun\IsemriController;
use App\Http\Controllers\Urun\IsistasyonController;
use App\Http\Controllers\Urun\IsmerkeziController;
use App\Http\Controllers\Urun\RotaController;
use App\Http\Controllers\Urun\UretimgirisController;
use App\Http\Controllers\Urun\UrunagaciController;
use App\Http\Controllers\Urun\UrunrotaController;
use App\Models\Urun\Urunagaci;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout',[HomeController::class,'logout'])->name('logout');

Route::group(['namespace' =>'modul','middleware'=>['auth']],function(){

    Route::group(["namespace" => "muhasebe", "as" => "muhasebe.", "prefix" => "muhasebe"], function () {

        Route::get('/althesap',[MuhasebeController::class,'althesap'])->name('althesap');
        Route::get('/althesapekle', [MuhasebeController::class, 'althesapCreate'])->name('althesapCreate');
        Route::post('/althesapekle', [MuhasebeController::class, 'althesapStore'])->name('althesapStore');
        Route::get('/althesapduzenle/{id}', [MuhasebeController::class, 'althesapEdit'])->name('althesapEdit');
        Route::post('/althesapduzenle/{id}', [MuhasebeController::class, 'althesapUpdate'])->name('althesapUpdate');
        Route::get('/althesapdelete/{id}', [MuhasebeController::class, 'althesapDelete'])->name('althesapDelete');
        Route::post('/althesapdata',[MuhasebeController::class,'althesapData'])->name('althesapData');
        
        Route::get('/cari',[MuhasebeController::class,'cari'])->name('cari');
        Route::get('/cariekle', [MuhasebeController::class, 'cariCreate'])->name('cariCreate');
        Route::post('/cariekle', [MuhasebeController::class, 'cariStore'])->name('cariStore');
        Route::get('/cariduzenle/{id}', [MuhasebeController::class, 'cariEdit'])->name('cariEdit');
        Route::post('/cariduzenle/{id}', [MuhasebeController::class, 'cariUpdate'])->name('cariUpdate');
        Route::get('/caridelete/{id}', [MuhasebeController::class, 'cariDelete'])->name('cariDelete');
        Route::post('/caridata',[MuhasebeController::class,'cariData'])->name('cariData');

        Route::get('/banka',[MuhasebeController::class,'banka'])->name('banka');
        Route::get('/bankaekle', [MuhasebeController::class, 'bankaCreate'])->name('bankaCreate');
        Route::post('/bankaekle', [MuhasebeController::class, 'bankaStore'])->name('bankaStore');
        Route::get('/bankaduzenle/{id}', [MuhasebeController::class, 'bankaEdit'])->name('bankaEdit');
        Route::post('/bankaduzenle/{id}', [MuhasebeController::class, 'bankaUpdate'])->name('bankaUpdate');
        Route::get('/bankadelete/{id}', [MuhasebeController::class, 'bankaDelete'])->name('bankaDelete');
        Route::post('/bankadata',[MuhasebeController::class,'bankaData'])->name('bankaData');

        Route::get('/kasa',[MuhasebeController::class,'kasa'])->name('kasa');
        Route::get('/kasaekle', [MuhasebeController::class, 'kasaCreate'])->name('kasaCreate');
        Route::post('/kasaekle', [MuhasebeController::class, 'kasaStore'])->name('kasaStore');
        Route::get('/kasaduzenle/{id}', [MuhasebeController::class, 'kasaEdit'])->name('kasaEdit');
        Route::post('/kasaduzenle/{id}', [MuhasebeController::class, 'kasaUpdate'])->name('kasaUpdate');
        Route::get('/kasadelete/{id}', [MuhasebeController::class, 'kasaDelete'])->name('kasaDelete');
        Route::post('/kasadata',[MuhasebeController::class,'kasaData'])->name('kasaData');

        Route::get('/fistip',[MuhasebeController::class,'fistip'])->name('fistip');
        Route::get('/fistipekle', [MuhasebeController::class, 'fistipCreate'])->name('fistipCreate');
        Route::post('/fistipekle', [MuhasebeController::class, 'fistipStore'])->name('fistipStore');
        Route::get('/fistipduzenle/{id}', [MuhasebeController::class, 'fistipEdit'])->name('fistipEdit');
        Route::post('/fistipduzenle/{id}', [MuhasebeController::class, 'fistipUpdate'])->name('fistipUpdate');
        Route::get('/fistipdelete/{id}', [MuhasebeController::class, 'fistipDelete'])->name('fistipDelete');
        Route::post('/fistipdata',[MuhasebeController::class,'fistipData'])->name('fistipData');

        Route::get('/islemtip',[MuhasebeController::class,'islemtip'])->name('islemtip');
        Route::get('/islemtipekle', [MuhasebeController::class, 'islemtipCreate'])->name('islemtipCreate');
        Route::post('/islemtipekle', [MuhasebeController::class, 'islemtipStore'])->name('islemtipStore');
        Route::get('/islemtipduzenle/{id}', [MuhasebeController::class, 'islemtipEdit'])->name('islemtipEdit');
        Route::post('/islemtipduzenle/{id}', [MuhasebeController::class, 'islemtipUpdate'])->name('islemtipUpdate');
        Route::get('/islemtipdelete/{id}', [MuhasebeController::class, 'islemtipDelete'])->name('islemtipDelete');
        Route::post('/islemtipdata',[MuhasebeController::class,'islemtipData'])->name('islemtipData');

        Route::get('/muhasebefis',[MuhasebeController::class,'muhasebefis'])->name('muhasebefis');
        Route::get('/muhasebefisekle', [MuhasebeController::class, 'muhasebefisCreate'])->name('muhasebefisCreate');
        Route::post('/muhasebefisekle', [MuhasebeController::class, 'muhasebefisStore'])->name('muhasebefisStore');
        Route::get('/muhasebefisduzenle/{id}', [MuhasebeController::class, 'muhasebefisEdit'])->name('muhasebefisEdit');
        Route::post('/muhasebefisduzenle/{id}', [MuhasebeController::class, 'muhasebefisUpdate'])->name('muhasebefisUpdate');
        Route::get('/muhasebefisdelete/{id}', [MuhasebeController::class, 'muhasebefisDelete'])->name('muhasebefisDelete');
        Route::post('/muhasebefisdata',[MuhasebeController::class,'muhasebefisData'])->name('muhasebefisData');

       

        Route::get('/finansfis',[MuhasebeController::class,'finansfis'])->name('finansfis');
        Route::get('/finansfisekle', [MuhasebeController::class, 'finansfisCreate'])->name('finansfisCreate');
        Route::post('/finansfisekle', [MuhasebeController::class, 'finansfisStore'])->name('finansfisStore');
        Route::get('/finansfisduzenle/{id}', [MuhasebeController::class, 'finansfisEdit'])->name('finansfisEdit');
        Route::post('/finansfisduzenle/{id}', [MuhasebeController::class, 'finansfisUpdate'])->name('finansfisUpdate');
        Route::get('/finansfisdelete/{id}', [MuhasebeController::class, 'finansfisDelete'])->name('finansfisDelete');
        Route::post('/finansfisdata',[MuhasebeController::class,'finansfisData'])->name('finansfisData');

        Route::get('/satisfatura',[SatisFaturaController::class,'satisfatura'])->name('satisfatura');
        Route::get('/satisfaturaekle', [SatisFaturaController::class, 'satisfaturaCreate'])->name('satisfaturaCreate');
        Route::get('/satisfaturaolustur/{satisId}', [SatisFaturaController::class, 'satisfaturaOlustur'])->name('satisfaturaOlustur');
        Route::post('/satisfaturaekle', [SatisFaturaController::class, 'satisfaturaStore'])->name('satisfaturaStore');
        Route::get('/satisfaturaduzenle/{id}', [SatisFaturaController::class, 'satisfaturaEdit'])->name('satisfaturaEdit');
        Route::post('/satisfaturaduzenle/{id}', [SatisFaturaController::class, 'satisfaturaUpdate'])->name('satisfaturaUpdate');
        Route::get('/satisfaturadelete/{id}', [SatisFaturaController::class, 'satisfaturaDelete'])->name('satisfaturaDelete');
        Route::post('/satisfaturadata',[SatisFaturaController::class,'satisfaturaData'])->name('satisfaturaData');

        Route::get('/satinalmafatura',[SatinalmaFaturaController::class,'satinalmafatura'])->name('satinalmafatura');
        Route::get('/satinalmafaturaekle', [SatinalmaFaturaController::class, 'satinalmafaturaCreate'])->name('satinalmafaturaCreate');
        Route::get('/satinalmafaturaolustur/{satinalmaId}', [SatinalmaFaturaController::class, 'satinalmafaturaOlustur'])->name('satinalmafaturaOlustur');
        Route::post('/satinalmafaturaekle', [SatinalmaFaturaController::class, 'satinalmafaturaStore'])->name('satinalmafaturaStore');
        Route::get('/satinalmafaturaduzenle/{id}', [SatinalmaFaturaController::class, 'satinalmafaturaEdit'])->name('satinalmafaturaEdit');
        Route::post('/satinalmafaturaduzenle/{id}', [SatinalmaFaturaController::class, 'satinalmafaturaUpdate'])->name('satinalmafaturaUpdate');
        Route::get('/satinalmafaturadelete/{id}', [SatinalmaFaturaController::class, 'satinalmafaturaDelete'])->name('satinalmafaturaDelete');
        Route::post('/satinalmafaturadata',[SatinalmaFaturaController::class,'satinalmafaturaData'])->name('satinalmafaturaData');
    });

    Route::group(["namespace" => "envanter", "as" => "envanter.", "prefix" => "envanter"], function () {
        Route::get('/stokkart',[EnvanterController::class,'stokkart'])->name('stokkart');
        Route::get('/stokkartekle', [EnvanterController::class, 'stokkartCreate'])->name('stokkartCreate');
        Route::post('/stokkartekle', [EnvanterController::class, 'stokkartStore'])->name('stokkartStore');
        Route::get('/stokkartduzenle/{id}', [EnvanterController::class, 'stokkartEdit'])->name('stokkartEdit');
        Route::post('/stokkartduzenle/{id}', [EnvanterController::class, 'stokkartUpdate'])->name('stokkartUpdate');
        Route::get('/stokkartdelete/{id}', [EnvanterController::class, 'stokkartDelete'])->name('stokkartDelete');
        Route::post('/stokkartdata',[EnvanterController::class,'stokkartData'])->name('stokkartData');

        Route::get('/depo',[EnvanterController::class,'depo'])->name('depo');
        Route::get('/depoekle', [EnvanterController::class, 'depoCreate'])->name('depoCreate');
        Route::post('/depoekle', [EnvanterController::class, 'depoStore'])->name('depoStore');
        Route::get('/depoduzenle/{id}', [EnvanterController::class, 'depoEdit'])->name('depoEdit');
        Route::post('/depoduzenle/{id}', [EnvanterController::class, 'depoUpdate'])->name('depoUpdate');
        Route::get('/depodelete/{id}', [EnvanterController::class, 'depoDelete'])->name('depoDelete');
        Route::post('/depodata',[EnvanterController::class,'depoData'])->name('depoData');

        Route::get('/stokhareket',[EnvanterController::class,'stokhareket'])->name('stokhareket');
        Route::get('/stokhareketekle', [EnvanterController::class, 'stokhareketCreate'])->name('stokhareketCreate');
        Route::post('/stokhareketekle', [EnvanterController::class, 'stokhareketStore'])->name('stokhareketStore');
        Route::get('/stokhareketduzenle/{id}', [EnvanterController::class, 'stokhareketEdit'])->name('stokhareketEdit');
        Route::post('/stokhareketduzenle/{id}', [EnvanterController::class, 'stokhareketUpdate'])->name('stokhareketUpdate');
        Route::get('/stokhareketdelete/{id}', [EnvanterController::class, 'stokhareketDelete'])->name('stokhareketDelete');
        Route::post('/stokhareketdata',[EnvanterController::class,'stokhareketData'])->name('stokhareketData');


        
    });

    Route::group(["namespace" => "satis", "as" => "satis.", "prefix" => "satis"], function () {
        Route::get('/siparis',[SatisSiparisController::class,'satissiparis'])->name('satissiparis');
        Route::get('/siparisekle', [SatisSiparisController::class, 'satissiparisCreate'])->name('satissiparisCreate');
        Route::post('/siparisekle', [SatisSiparisController::class, 'satissiparisStore'])->name('satissiparisStore');
        Route::get('/siparisduzenle/{id}', [SatisSiparisController::class, 'satissiparisEdit'])->name('satissiparisEdit');
        Route::post('/siparisduzenle/{id}', [SatisSiparisController::class, 'satissiparisUpdate'])->name('satissiparisUpdate');
        Route::get('/siparisdelete/{id}', [SatisSiparisController::class, 'satissiparisDelete'])->name('satissiparisDelete');
        Route::post('/siparisdata',[SatisSiparisController::class,'satissiparisData'])->name('satissiparisData');

        Route::get('/teklif',[SatisTeklifController::class,'satisteklif'])->name('satisteklif');
        Route::get('/teklifekle', [SatisTeklifController::class, 'satisteklifCreate'])->name('satisteklifCreate');
        Route::post('/teklifekle', [SatisTeklifController::class, 'satisteklifStore'])->name('satisteklifStore');
        Route::get('/teklifduzenle/{id}', [SatisTeklifController::class, 'satisteklifEdit'])->name('satisteklifEdit');
        Route::post('/teklifduzenle/{id}', [SatisTeklifController::class, 'satisteklifUpdate'])->name('satisteklifUpdate');
        Route::get('/teklifdelete/{id}', [SatisTeklifController::class, 'satisteklifDelete'])->name('satisteklifDelete');
        Route::post('/teklifdata',[SatisTeklifController::class,'satisteklifData'])->name('satisteklifData');

        Route::get('/teklifsatis',[TeklifToSatisController::class,'teklifsatis'])->name('teklifsatis');
        Route::post('/tekliftosatis',[TeklifToSatisController::class,'tekliftosatisData'])->name('tekliftosatisData');
        Route::get('/teklifsatisdonustur/{id}', [TeklifToSatisController::class, 'tekliftosatisCreate'])->name('tekliftosatisCreate');
        Route::post('/teklifsatisdonustur/{id}', [TeklifToSatisController::class, 'tekliftosatisUpdate'])->name('tekliftosatisUpdate');

    });

    Route::group(["namespace" => "satinalma", "as" => "satinalma.", "prefix" => "satinalma"], function () {
        Route::get('/siparis',[SatinalmaController::class,'satinalmasiparis'])->name('satinalmasiparis');
        Route::get('/siparisekle', [SatinalmaController::class, 'satinalmasiparisCreate'])->name('satinalmasiparisCreate');
        Route::post('/siparisekle', [SatinalmaController::class, 'satinalmasiparisStore'])->name('satinalmasiparisStore');
        Route::get('/siparisduzenle/{id}', [SatinalmaController::class, 'satinalmasiparisEdit'])->name('satinalmasiparisEdit');
        Route::post('/siparisduzenle/{id}', [SatinalmaController::class, 'satinalmasiparisUpdate'])->name('satinalmasiparisUpdate');
        Route::get('/siparisdelete/{id}', [SatinalmaController::class, 'satinalmasiparisDelete'])->name('satinalmasiparisDelete');
        Route::post('/siparisdata',[SatinalmaController::class,'satinalmasiparisData'])->name('satinalmasiparisData');

        Route::get('/teklif',[SatinalmaTeklifController::class,'satinalmateklif'])->name('satinalmateklif');
        Route::get('/teklifekle', [SatinalmaTeklifController::class, 'satinalmateklifCreate'])->name('satinalmateklifCreate');
        Route::post('/teklifekle', [SatinalmaTeklifController::class, 'satinalmateklifStore'])->name('satinalmateklifStore');
        Route::get('/teklifduzenle/{id}', [SatinalmaTeklifController::class, 'satinalmateklifEdit'])->name('satinalmateklifEdit');
        Route::post('/teklifduzenle/{id}', [SatinalmaTeklifController::class, 'satinalmateklifUpdate'])->name('satinalmateklifUpdate');
        Route::get('/teklifdelete/{id}', [SatinalmaTeklifController::class, 'satinalmateklifDelete'])->name('satinalmateklifDelete');
        Route::post('/teklifdata',[SatinalmaTeklifController::class,'satinalmateklifData'])->name('satinalmateklifData');

        Route::get('/teklifsatinalma',[TeklifToSatinalmaController::class,'teklifsatinalma'])->name('teklifsatinalma');
        Route::post('/tekliftosatinalma',[TeklifToSatinalmaController::class,'tekliftosatinalmaData'])->name('tekliftosatinalmaData');
        Route::get('/teklifsatinalmadonustur/{id}', [TeklifToSatinalmaController::class, 'tekliftosatinalmaCreate'])->name('tekliftosatinalmaCreate');
        Route::post('/teklifsatinalmadonustur/{id}', [TeklifToSatinalmaController::class, 'tekliftosatinalmaUpdate'])->name('tekliftosatinalmaUpdate');

    });

    Route::group(["namespace" => "urun", "as" => "urun.", "prefix" => "urun"], function () {
        Route::get('/operasyon',[RotaController::class,'operasyon'])->name('operasyon');
        Route::get('/operasyonekle', [RotaController::class, 'operasyonCreate'])->name('operasyonCreate');
        Route::post('/operasyonekle', [RotaController::class, 'operasyonStore'])->name('operasyonStore');
        Route::get('/operasyonduzenle/{id}', [RotaController::class, 'operasyonEdit'])->name('operasyonEdit');
        Route::post('/operasyonduzenle/{id}', [RotaController::class, 'operasyonUpdate'])->name('operasyonUpdate');
        Route::get('/operasyondelete/{id}', [RotaController::class, 'operasyonDelete'])->name('operasyonDelete');
        Route::post('/operasyondata',[RotaController::class,'operasyonData'])->name('operasyonData');

        Route::get('/ismerkezi',[IsmerkeziController::class,'ismerkezi'])->name('ismerkezi');
        Route::get('/ismerkeziekle', [IsmerkeziController::class, 'ismerkeziCreate'])->name('ismerkeziCreate');
        Route::post('/ismerkeziekle', [IsmerkeziController::class, 'ismerkeziStore'])->name('ismerkeziStore');
        Route::get('/ismerkeziduzenle/{id}', [IsmerkeziController::class, 'ismerkeziEdit'])->name('ismerkeziEdit');
        Route::post('/ismerkeziduzenle/{id}', [IsmerkeziController::class, 'ismerkeziUpdate'])->name('ismerkeziUpdate');
        Route::get('/ismerkezidelete/{id}', [IsmerkeziController::class, 'ismerkeziDelete'])->name('ismerkeziDelete');
        Route::post('/ismerkezidata',[IsmerkeziController::class,'ismerkeziData'])->name('ismerkeziData');

        Route::get('/isistasyon',[IsistasyonController::class,'isistasyon'])->name('isistasyon');
        Route::get('/isistasyonekle', [IsistasyonController::class, 'isistasyonCreate'])->name('isistasyonCreate');
        Route::post('/isistasyonekle', [IsistasyonController::class, 'isistasyonStore'])->name('isistasyonStore');
        Route::get('/isistasyonduzenle/{id}', [IsistasyonController::class, 'isistasyonEdit'])->name('isistasyonEdit');
        Route::post('/isistasyonduzenle/{id}', [IsistasyonController::class, 'isistasyonUpdate'])->name('isistasyonUpdate');
        Route::get('/isistasyondelete/{id}', [IsistasyonController::class, 'isistasyonDelete'])->name('isistasyonDelete');
        Route::post('/isistasyondata',[IsistasyonController::class,'isistasyonData'])->name('isistasyonData');

        Route::get('/urunagaci',[UrunagaciController::class,'urunagaci'])->name('urunagaci');
        Route::get('/urunagaciekle', [UrunagaciController::class, 'urunagaciCreate'])->name('urunagaciCreate');
        Route::post('/urunagaciekle', [UrunagaciController::class, 'urunagaciStore'])->name('urunagaciStore');
        Route::get('/urunagaciduzenle/{id}', [UrunagaciController::class, 'urunagaciEdit'])->name('urunagaciEdit');
        Route::post('/urunagaciduzenle/{id}', [UrunagaciController::class, 'urunagaciUpdate'])->name('urunagaciUpdate');
        Route::get('/urunagacidelete/{id}', [UrunagaciController::class, 'urunagaciDelete'])->name('urunagaciDelete');
        Route::post('/urunagacidata',[UrunagaciController::class,'urunagaciData'])->name('urunagaciData');

        Route::get('/rotatip',[RotaController::class,'rotatip'])->name('rotatip');
        Route::get('/rotatipekle', [RotaController::class, 'rotatipCreate'])->name('rotatipCreate');
        Route::post('/rotatipekle', [RotaController::class, 'rotatipStore'])->name('rotatipStore');
        Route::get('/rotatipduzenle/{id}', [RotaController::class, 'rotatipEdit'])->name('rotatipEdit');
        Route::post('/rotatipduzenle/{id}', [RotaController::class, 'rotatipUpdate'])->name('rotatipUpdate');
        Route::get('/rotatipdelete/{id}', [RotaController::class, 'rotatipDelete'])->name('rotatipDelete');
        Route::post('/rotatipdata',[RotaController::class,'rotatipData'])->name('rotatipData');

        Route::get('/urunrota',[UrunrotaController::class,'urunrota'])->name('urunrota');
        Route::get('/urunrotaekle', [UrunrotaController::class, 'urunrotaCreate'])->name('urunrotaCreate');
        Route::post('/urunrotaekle', [UrunrotaController::class, 'urunrotaStore'])->name('urunrotaStore');
        Route::get('/urunrotaduzenle/{id}', [UrunrotaController::class, 'urunrotaEdit'])->name('urunrotaEdit');
        Route::post('/urunrotaduzenle/{id}', [UrunrotaController::class, 'urunrotaUpdate'])->name('urunrotaUpdate');
        Route::get('/urunrotadelete/{id}', [UrunrotaController::class, 'urunrotaDelete'])->name('urunrotaDelete');
        Route::post('/urunrotadata',[UrunrotaController::class,'urunrotaData'])->name('urunrotaData');

        Route::get('/isemri',[IsemriController::class,'isemri'])->name('isemri');
        Route::get('/isemriekle', [IsemriController::class, 'isemriCreate'])->name('isemriCreate');
        Route::post('/isemriekle', [IsemriController::class, 'isemriStore'])->name('isemriStore');
        Route::post('/isemriuretim', [UretimgirisController::class, 'isemriUretimGiris'])->name('isemriUretimGiris');
        Route::get('/isemriduzenle/{id}', [IsemriController::class, 'isemriEdit'])->name('isemriEdit');
        Route::post('/isemriduzenle/{id}', [IsemriController::class, 'isemriUpdate'])->name('isemriUpdate');
        Route::get('/isemridelete/{id}', [IsemriController::class, 'isemriDelete'])->name('isemriDelete');
        Route::get('/isemridetay/{id}', [IsemriController::class, 'isemriDetay'])->name('isemriDetay');
        Route::post('/isemridata',[IsemriController::class,'isemriData'])->name('isemriData');

        Route::get('/uretimgiris',[UretimgirisController::class,'uretimgiris'])->name('uretimgiris');
        Route::post('/uretimgirisdata',[UretimgirisController::class,'uretimgirisData'])->name('uretimgirisData');
        Route::get('/uretimgirisduzenle/{id}', [UretimgirisController::class, 'uretimgirisEdit'])->name('uretimgirisEdit');
        Route::post('/uretimgirisduzenle/{id}', [UretimgirisController::class, 'uretimgirisUpdate'])->name('uretimgirisUpdate');
        Route::get('/uretimgirisdelete/{id}', [UretimgirisController::class, 'uretimgirisDelete'])->name('uretimgirisDelete');
    });
});