@extends('layouts.app')
@section('header')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}">
@endsection
@section('icerik')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            İşlem Tipi Tanım
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Yeni İşlem Tipi Ekle</h3>
                <div class="pull-right box-tools">
                    <a href="{{ route('muhasebe.islemtip') }}"> <button type="button" class="btn btn-success">
                          İşlem Tip Listesi</button></a>
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
                <form action="{{ route('muhasebe.islemtipStore') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-12">
                        <label>İşlem Tipi Kodu</label>
                        <input type="text" class="form-control" name="islemTipKod" placeholder="İşlem Tipi Kodu">
                    </div>
                    <div class="form-group col-md-12">
                        <label>İşlem Tipi Adı</label>
                        <input type="text" class="form-control" name="islemTipAd" placeholder="İşlem Tipi Adı">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Kaynak</label>
                        <select name="islemKaynak" class="form-control select2" style="width: 100%">
                            <option value="Muhasebe">Muhasebe</option>
                            <option value="Finans">Finans</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Borç / Alacak</label>
                        <select name="islemBA" class="form-control select2" style="width: 100%">
                            <option value="Borç">Borç</option>
                            <option value="Alacak">Alacak</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Kart Tipi</label>
                        <select name="islemKartTip" class="form-control select2" style="width: 100%">
                            <option value="Muhasebe">Muhasebe</option>
                            <option value="Cari">Cari</option>
                            <option value="Banka">Banka</option>
                            <option value="Kasa">Kasa</option>
                        </select>
                    </div>

                    <div class="box-footer pull-right box-tools">
                        <button type="submit" class="btn btn-success">İşlem Tipi Kaydet</button>
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
