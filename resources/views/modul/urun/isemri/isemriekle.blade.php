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
                <h3 class="box-title">Yeni İş Emri Ekle</h3>
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
 
                <form action="{{ route('urun.isemriStore') }}" method="POST" role="form"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group col-md-6">
                        <label>Firma Seçiniz</label>
                        <select name="isemriFirmaKod" class="form-control select2">
                            <option>Firma Seçiniz</option>
                            @foreach (\App\Models\User::all() as $k => $v)
                                <option  value="{{ $v['id'] }}">
                                    {{ \App\Models\User::getPublicName($v['id']) }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Belge Numarası</label>
                        <input type="text" class="form-control" name="isemriNumara" placeholder="Belge numarası giriniz.">
                    </div>
                    <div class="form-group col-md-6">
                        <label>İş Emri Tarihi</label>
                        <input type="date" value="{{ date('Y-m-d') }}" class="form-control" name="isemriTarih">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Stok Kodu</label>
                        <select name="isemriStokKod" class="form-control select2">
                            <option>Stok Kodu Seçiniz</option>
                            @foreach (\App\Models\Envanter\StokKart::all() as $k => $v)
                                <option value="{{ $v['stokKod'] }}">
                                    {{ \App\Models\Envanter\StokKart::getStokKod($v['id']) }} /  {{ \App\Models\Envanter\StokKart::getStokAd($v['id']) }}  </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Cari Kod</label>
                        <select name="isemriCariKod" class="form-control select2">
                            <option>Cari Kodu Seçiniz</option>
                            @foreach (\App\Models\Muhasebe\Cari::all() as $k => $v)
                                <option value="{{ $v['cariKod'] }}">
                                    {{ \App\Models\Muhasebe\Cari::getCariKod($v['id']) }} /  {{ \App\Models\Muhasebe\Cari::getCariAd($v['id']) }}  </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Giriş Depo Kodu</label>
                        <select name="isemriGirisDepoKod" class="form-control select2">
                            <option>Depo Kodu Seçiniz</option>
                            @foreach (\App\Models\Envanter\Depo::all() as $k => $v)
                                <option value="{{ $v['depoAd'] }}">
                                    {{ \App\Models\Envanter\Depo::getDepoKod($v['id']) }} /  {{ \App\Models\Envanter\Depo::getDepoAd($v['id']) }}  </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Stok Birim</label>
                        <select name="isemriBirim" class="form-control select2" style="width: 100%">
                            <option>Birim Seçiniz</option>
                            <option value="Adet">Adet</option>
                            <option value="Gram">Gram</option>
                            <option value="Litre">Litre</option>
                            <option value="Kilogram">Kilogram</option>

                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Miktar</label>
                        <input type="text" class="form-control" name="isemriMiktar" placeholder="Miktar giriniz.">
                    </div>





                    <div class="box-footer pull-right box-tools">
                        <button type="submit" class="btn btn-success">İş Emri Kaydet</button>
                    </div>
                </form>
            
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

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
