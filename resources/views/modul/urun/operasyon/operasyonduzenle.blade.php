@extends('layouts.app')
@section('header')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}">
@endsection
@section('icerik')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Operasyon Tanım
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Operasyon Düzenleme</h3>
                <div class="pull-right box-tools">
                    <a href="{{ route('urun.operasyon') }}"> <button type="button" class="btn btn-success">
                            Operasyon Listesi</button></a>
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
                <form action="{{ route('urun.operasyonUpdate',['id'=>$data[0]['id']]) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-4">
                        <label>Operasyon Kodu</label>
                        <input type="text" class="form-control" name="operasyonKod" value=" {{$data[0]['operasyonKod']}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Operasyon Adı</label>
                        <input type="text" class="form-control" name="operasyonAd" value=" {{$data[0]['operasyonAd']}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Operasyonya Bağlı Firma</label>
                        <select name="operasyonFirmaId" class="form-control select2">
                            <option>Firma Seçiniz</option>
                            @foreach (\App\Models\User::all() as $k => $v)
                                <option  @if($v["id"]==$data[0]["operasyonFirmaId"]) selected @endif value="{{ $v['id'] }}">
                                    {{ \App\Models\User::getPublicName($v['id']) }} </option>
                            @endforeach
                        </select>
                    </div>

            <div class="box-footer pull-right box-tools">
                <button type="submit" class="btn btn-success">Operasyon Güncelle</button>
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
    <script>
        $(document).ready(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
            $("body").on("change", ".mhk", function() {
                var mhadi = $(this).find(":selected").data("hk");
                $(this).closest(".islem_field").find(".mha").val(mhadi).trigger("change");
            })
            $("body").on("change", ".mha", function() {
                var mhak = $(this).find(":selected").data("ha");
                $(this).closest(".islem_field").find(".mhk").val(mhak).trigger("change");
            })

        })

    </script>
@endsection
