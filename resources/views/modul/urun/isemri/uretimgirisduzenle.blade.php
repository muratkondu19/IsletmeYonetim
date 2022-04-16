@extends('layouts.app')
@section('header')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}">
    
    <link rel="stylesheet" href="{{asset('backend/plugins/timepicker/bootstrap-timepicker.min.css')}}">
@endsection
@section('icerik')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Üretim Giriş İşlemleri
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Üretim Giriş Detay</h3>
                <div class="pull-right box-tools">
                  <a href="{{ route('urun.uretimgiris') }}"> <button type="button" class="btn btn-success">
                        Üretim Giriş Listesi</button></a>
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
 
                <form action="{{ route('urun.uretimgirisUpdate',['id'=>$data[0]['id']])   }}" method="POST" role="form"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group col-md-6">
                        <label>Firma Seçiniz</label>
                        <select name="uretimgirisFirmaKod" class="form-control select2">
                            <option>Firma Seçiniz</option>
                            @foreach (\App\Models\User::all() as $k => $v)
                                <option @if($v["id"]==$data[0]["uretimgirisFirmaKod"]) selected @endif  value="{{ $v['id'] }}">
                                    {{ \App\Models\User::getPublicName($v['id']) }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>İlgili İş Emri Kodu</label>
                        <input type="text" class="form-control" name="uretimgirisIsEmriKod" value="{{$data[0]['uretimgirisIsEmriKod'] }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Üretim Başlangıç Tarihi</label>
                        <input type="date" name="uretimgirisBaslangıcTarih" value="{{ date('Y-m-d') }}"  class="form-control" >
                    </div>
                    <div class="form-group col-md-6">
                        <label>Üretim Bitiş Tarihi</label>
                        <input type="date" name="uretimgirisBitisTarih" value="{{ date('Y-m-d') }}"  class="form-control" >
                    </div>
                    <div class="bootstrap-timepicker">
                        <div class="form-group col-md-6">
                          <label>Üretim Başlangıç Saati:</label>
        
                          <div class="input-group">
                            <input type="text" name="uretimgirisBaslangicSaat" class="form-control timepicker">
        
                            <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                          </div>
                          <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                      </div>
                      <div class="bootstrap-timepicker">
                        <div class="form-group col-md-6">
                          <label>Üretim Bitiş Saati:</label>
        
                          <div class="input-group">
                            <input type="text" name="uretimgirisBitisSaat" class="form-control timepicker">
        
                            <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                          </div>
                          <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                      </div>
                    <div class="form-group col-md-6">
                        <label>Stok Kodu</label>
                        <select name="uretimgirisStokKod" class="form-control select2">
                            <option>Stok Kodu Seçiniz</option>
                            @foreach (\App\Models\Envanter\StokKart::all() as $k => $v)
                                <option @if($v["stokKod"]==$data[0]["uretimgirisStokKod"]) selected @endif value="{{ $v['stokKod'] }}">
                                    {{ \App\Models\Envanter\StokKart::getStokKod($v['id']) }} /  {{ \App\Models\Envanter\StokKart::getStokAd($v['id']) }}  </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Giriş Depo Kodu</label>
                        <select name="uretimgirisDepoKod" class="form-control select2">
                            <option>Depo Kodu Seçiniz</option>
                            @foreach (\App\Models\Envanter\Depo::all() as $k => $v)
                                <option @if($v["depoAd"]==$data[0]["uretimgirisDepoKod"]) selected @endif value="{{ $v['depoAd'] }}">
                                    {{ \App\Models\Envanter\Depo::getDepoKod($v['id']) }} /  {{ \App\Models\Envanter\Depo::getDepoAd($v['id']) }}  </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Stok Birim</label>
                        <select name="uretimgirisBirim" class="form-control select2" style="width: 100%">
                            <option>Birim Seçiniz</option>
                            <option  @if($data[0]['uretimgirisBirim']=="Adet") selected @endif value="Adet">Adet</option>
                            <option  @if($data[0]['uretimgirisBirim']=="Gram") selected @endif value="Gram">Gram</option>
                            <option  @if($data[0]['uretimgirisBirim']=="Litre") selected @endif value="Litre">Litre</option>
                            <option  @if($data[0]['uretimgirisBirim']=="Kilogram") selected @endif value="Kilogram">Kilogram</option>

                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Miktar</label>
                        <input type="text" class="form-control" name="uretimgirisMiktar" value="{{$data[0]['uretimgirisMiktar']}}">
                    </div>
                
            
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        @foreach($rota as $key1=>$value1)
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Üretim Giriş Stok Rotası</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>İş İstasyonu</th>
                  <th>Operasyon</th>
                </tr>
                <tr class="uretimrota">
                    <td></td>
                    <td><input type="text" class="form-control" name="rota[{{$key1}}][uretimrotaIsistasyonKod]" value="{{$rota[0]['uretimrotaIsistasyonKod']}}"></td>
                    <td><input type="text" class="form-control" name="rota[{{$key1}}][uretimrotaOperasyonKod]" value="{{$rota[0]['uretimrotaOperasyonKod']}}"></td>
                </tr>
              </table>
            </div>
          </div>
          @endforeach
         
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Üretim Giriş Malzemeler</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Satır Tip</th>
                  <th>Stok Kodu</th>
                  <th>Stok Adı</th>
                  <th>Operasyon</th>
                  <th>Birim</th>
                  <th>Miktar</th>
                </tr>
                @foreach($malzeme as $k=>$v)
    
                <tr class="uretimmalzeme">
                    <td></td>
    
                    <td> <input type="text" class="form-control" name="malzeme[{{$k}}][uretimmalzemeSatırTip]" value="{{$malzeme[$k]['uretimmalzemeSatırTip']}}"> </td>
                    <td> <input type="text" class="form-control" name="malzeme[{{$k}}][uretimmalzemeStokKod]" value="{{$malzeme[$k]['uretimmalzemeStokKod']}}"> </td>
                    <td> <input type="text" class="form-control" name="malzeme[{{$k}}][uretimmalzemeStokAd]" value="{{$malzeme[$k]['uretimmalzemeStokAd']}}"> </td>
                    <td> <input type="text" class="form-control" name="malzeme[{{$k}}][uretimmalzemeOperasyon]" value="{{$malzeme[$k]['uretimmalzemeOperasyon']}}"> </td>
                    <td> <input type="text" class="form-control" name="malzeme[{{$k}}][uretimmalzemeBirim]" value="{{$malzeme[$k]['uretimmalzemeBirim']}}"> </td>
                    <td> <input type="text" class="form-control" name="malzeme[{{$k}}][uretimmalzemeMiktar]" value="{{$malzeme[$k]['uretimmalzemeMiktar']}}"> </td>
                </tr>
                @endforeach
              </table>
              <div class="box-footer pull-right box-tools">
                <button type="submit" class="btn btn-success">Üretim Girişi Oluştur</button>
            </div>
        </form>
            </div>
            <!-- /.box-body -->
         
          </div>

    </section>
    <!-- /.content -->

@endsection
@section('footer')
    <!-- Select2 -->
    <script src="{{ asset('backend/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{asset('backend/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
    <script>
          $(document).ready(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

        })
        $('.timepicker').timepicker({
      showInputs: false,
      showMeridian: false
    })



        
    </script>
@endsection
