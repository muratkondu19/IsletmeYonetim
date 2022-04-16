@extends('layouts.app')
@section('header')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}">
@endsection
@section('icerik')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Fiş Tipi Tanım
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Fiş Tipi Güncelle</h3>
                <div class="pull-right box-tools">
                    <a href="{{ route('muhasebe.fistip') }}"> <button type="button" class="btn btn-success">
                           Fiş Tip Listesi</button></a>
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
                <form action="{{route('muhasebe.fistipUpdate',['id'=>$data[0]['id']])}}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-6">
                        <label>Fiş Tipi Kodu</label>
                        <input type="text" class="form-control" name="fisTipKod" value=" {{$data[0]['fisTipKod']}} ">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Fiş Tipi Adı</label>
                        <input type="text" class="form-control" name="fisTipAd"  value="{{$data[0]['fisTipAd']}}" >
                    </div>
                    <div class="form-group col-md-6">
                        <label>Kart Tipi</label>
                        <select name="fisKartTip" class="form-control select2" style="width: 100%">
                            <option value="Muhasebe">Muhasebe</option>
                            <option value="Cari">Cari</option>
                            <option value="Banka">Banka</option>
                            <option value="Kasa">Kasa</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Detayda Gelecek İşlem Tipi</label>
                        <select name="fisDetayTip" class="form-control select2" style="width: 100%">
                            <option value="Borç">Borç</option>
                            <option value="Alacak">Alacak</option>
                     
                            
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Muhasebe Fiş Tipi</label>
                        <select name="fisMuhTip" class="form-control select2" style="width: 100%">
                            <option value="Mahsup">Mahsup</option>
                            <option value="Tediye">Tediye</option>
                            <option value="Tahsil">Tahsil</option>
                            <option value="Açılış">Açılış</option>
                            <option value="Kapanış">Kapanış</option>
                            <option value="Yansıtma">Yansıtma</option>
                        </select>
                    </div>
                    <div class="box-footer pull-right box-tools">
                        <button type="submit" class="btn btn-success">Fiş Tipi Güncelle</button>
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
