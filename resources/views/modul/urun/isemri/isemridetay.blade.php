@extends('layouts.app')
@section('header')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}">
@endsection
@section('icerik')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          İş Emri İşlemleri
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">İş Emri Detay</h3>
                <div class="pull-right box-tools">
                    <a href="{{ route('urun.isemri') }}"> <button type="button" class="btn btn-success">
                          İş Emri Listesi</button></a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Bildiri!</h4>
                    {{ session('success') }}
                  </div>
                  @elseif(session('error'))
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Bildiri!</h4>
                    {{ session('error') }}
                  </div>
                @endif
 
                <form action="{{ route('urun.isemriUretimGiris') }}" method="POST" role="form"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group col-md-6">
                        <label>Firma Seçiniz</label>
                        <select name="uretimgirisFirmaKod" class="form-control select2">
                            <option>Firma Seçiniz</option>
                            @foreach (\App\Models\User::all() as $k => $v)
                                <option @if($v["id"]==$data[0]["isemriFirmaKod"]) selected @endif  value="{{ $v['id'] }}">
                                    {{ \App\Models\User::getPublicName($v['id']) }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Belge Numarası</label>
                        <input type="text" class="form-control" name="uretimgirisIsEmriKod" value="{{$data[0]['isemriNumara'] }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>İş Emri Tarihi</label>
                        <input type="date" value="{{$data[0]['isemriTarih'] }}" class="form-control" >
                    </div>
                    <div class="form-group col-md-6">
                        <label>Stok Kodu</label>
                        <select name="uretimgirisStokKod" class="form-control select2">
                            <option>Stok Kodu Seçiniz</option>
                            @foreach (\App\Models\Envanter\StokKart::all() as $k => $v)
                                <option @if($v["stokKod"]==$data[0]["isemriStokKod"]) selected @endif value="{{ $v['stokKod'] }}">
                                    {{ \App\Models\Envanter\StokKart::getStokKod($v['id']) }} /  {{ \App\Models\Envanter\StokKart::getStokAd($v['id']) }}  </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Cari Kod</label>
                        <select  class="form-control select2">
                            <option>Cari Kodu Seçiniz</option>
                            @foreach (\App\Models\Muhasebe\Cari::all() as $k => $v)
                                <option @if($v["cariKod"]==$data[0]["isemriCariKod"]) selected @endif value="{{ $v['cariKod'] }}">
                                    {{ \App\Models\Muhasebe\Cari::getCariKod($v['id']) }} /  {{ \App\Models\Muhasebe\Cari::getCariAd($v['id']) }}  </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Giriş Depo Kodu</label>
                        <select name="uretimgirisDepoKod" class="form-control select2">
                            <option>Depo Kodu Seçiniz</option>
                            @foreach (\App\Models\Envanter\Depo::all() as $k => $v)
                                <option @if($v["depoAd"]==$data[0]["isemriGirisDepoKod"]) selected @endif value="{{ $v['depoAd'] }}">
                                    {{ \App\Models\Envanter\Depo::getDepoKod($v['id']) }} /  {{ \App\Models\Envanter\Depo::getDepoAd($v['id']) }}  </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Stok Birim</label>
                        <select name="uretimgirisBirim" class="form-control select2" style="width: 100%">
                            <option>Birim Seçiniz</option>
                            <option  @if($data[0]['isemriBirim']=="Adet") selected @endif value="Adet">Adet</option>
                            <option  @if($data[0]['isemriBirim']=="Gram") selected @endif value="Gram">Gram</option>
                            <option  @if($data[0]['isemriBirim']=="Litre") selected @endif value="Litre">Litre</option>
                            <option  @if($data[0]['isemriBirim']=="Kilogram") selected @endif value="Kilogram">Kilogram</option>

                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Miktar</label>
                        <input type="text" class="form-control" name="uretimgirisMiktar" value="{{$data[0]['isemriMiktar']}}">
                    </div>
                
            
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        @foreach($agac as $key1=>$value1)
        @if($data[0]['isemriStokKod']==$rota[$key1]['urunrotaStokKod'])
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">İş Emri Stok Rotası</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Rota Tipi</th>
                  <th>Stok Adı</th>
                  <th>İş Merkezi</th>
                  <th>İş İstasyonu</th>
                  <th>Operasyon</th>
                </tr>
                <tr class="uretimrota">
                    <td></td>
                    <td><input type="text" class="form-control" name="rota[{{$key1}}][uretimrotatip]" value="{{$rota[0]['urunrotaRotaTip']}}"></td>
                    <td><input type="text" class="form-control" name="rota[{{$key1}}][uretimrotastokkod]" value="{{ \App\Models\Envanter\StokKart::getStokAdKod($rota[$key1]['urunrotaStokKod'])}}"></td>
                    <td><input type="text" class="form-control" name="rota[{{$key1}}][uretimrotaismerkez]" value="{{ \App\Models\Urun\Ismerkezi::getIsmerkezAdKod($rotaIslem[$key1]['urunrotaIsmerkezKod'])}}"></td>
                    <td><input type="text" class="form-control" name="rota[{{$key1}}][uretimrotaisistasyon]" value="{{ \App\Models\Urun\Isistasyon::getIstasyonAdKod($rotaIslem[$key1]['urunrotaIsistasyonKod'])}}"></td>
                    <td><input type="text" class="form-control" name="rota[{{$key1}}][uretimrotaoperasyonkod]" value="{{ \App\Models\Urun\Operasyon::getOperasyonAdKod($rotaIslem[$key1]['urunrotaOperasyonKod'])}}"></td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          @endif
          @endforeach
          @foreach($agac as $key=>$value)
          @if($data[0]['isemriStokKod']==$agac[$key]['urunagaciStokKod'])
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">İş Emri Malzemeler</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Satır Tip</th>
                  <th>Stok Adı</th>
                  <th>Stok Kodu</th>
                  <th>Operasyon</th>
                  <th>Birim</th>
                  <th>Miktar</th>
                </tr>
                @foreach($agacmalzeme as $k=>$v)
                @if($agac[$key]['id']==$agacmalzeme[$k]['urunagaciId'])
                <tr class="uretimmalzeme">
                    <td></td>
                    <td> <input type="text" class="form-control" name="malzeme[{{$k}}][uretimmalzemeSatırTip]" value="{{ \App\Models\Urun\UrunagaciMalzeme::getSatırTip($agacmalzeme[$k]['urunagacimalzemeSatırTip'])}}"> </td>
                    <td> <input type="text" class="form-control" name="malzeme[{{$k}}][uretimmalzemeStokAd]" value="{{ \App\Models\Envanter\StokKart::getStokAd($agacmalzeme[$k]['urunagacimalzemeStokAd'])}}"> </td>
                    <td> <input type="text" class="form-control" name="malzeme[{{$k}}][uretimmalzemeStokKod]" value=" {{ \App\Models\Envanter\StokKart::getStokKod($agacmalzeme[$k]['urunagacimalzemeStokKod'])}}"></td>
                    <td> <input type="text" class="form-control" name="malzeme[{{$k}}][uretimmalzemeOperasyonAd]" value="{{ \App\Models\Urun\Operasyon::getOperasyonAd($agacmalzeme[$k]['urunagacimalzemeOperasyonAd'])}}"> </td>
                    <td> <input type="text" class="form-control" name="malzeme[{{$k}}][uretimmalzemeBirim]" value="{{$agacmalzeme[$k]['urunagacimalzemeBirim']}}"> </td>
                    <td> <input type="text" class="form-control" name="malzeme[{{$k}}][uretimmalzemeMiktar]" value="{{$agacmalzeme[$k]['urunagacimalzemeMiktar']}}"> </td>
                </tr>
                @endif
                @endforeach
              </table>
              <div class="box-footer pull-right box-tools">
                <button type="submit" class="btn btn-success">Üretim Girişi Oluştur</button>
            </div>
        </form>
            </div>
            <!-- /.box-body -->
         
          </div>
          @endif
          @endforeach

    </section>
    <!-- /.content -->

@endsection
@section('footer')
    <!-- Select2 -->
    <script src="{{ asset('backend/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
          $(document).ready(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

        })



        
    </script>
@endsection
