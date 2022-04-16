@extends('layouts.app')
@section('header')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}">
@endsection
@section('icerik')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Stok Kart Tanım
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Stok Kart Güncelle</h3>
                <div class="pull-right box-tools">
                    <a href="{{ route('envanter.stokkart') }}"> <button type="button" class="btn btn-success">
                           Stok Kart Listesi</button></a>
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
                <form action="{{route('envanter.stokkartUpdate',['id'=>$data[0]['id']])}}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-6">
                        <label>Stok Kodu</label>
                        <input type="text" class="form-control" name="stokKod" value=" {{$data[0]['stokKod']}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Stok Adı</label>
                        <input type="text" class="form-control" name="stokAd" value=" {{$data[0]['stokAd']}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Stok Takip Birim</label>
                        <select name="stokBirim" class="form-control select2" style="width: 100%">
                            <option  @if($data[0]["stokBirim"]=="Adet") selected @endif value="Adet">Adet</option>
                            <option  @if($data[0]["stokBirim"]=="Gram") selected @endif value="Gram">Gram</option>
                            <option  @if($data[0]["stokBirim"]=="Litre") selected @endif value="Litre">Litre</option>
                            <option  @if($data[0]["stokBirim"]=="Kilogram") selected @endif value="Kilogram">Kilogram</option>

                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Stok Tip Kodu</label>
                        <select name="stokTipKod" class="form-control select2" style="width: 100%">
                            <option @if($data[0]["stokTipKod"]=="Mamül") selected @endif value="Mamül">Mamül</option>
                            <option @if($data[0]["stokTipKod"]=="Yarı Mamül") selected @endif value="Yarı Mamül">Yarı Mamül</option>
                            <option @if($data[0]["stokTipKod"]=="Hammadde") selected @endif value="Hammadde">Hammadde</option>
                            <option @if($data[0]["stokTipKod"]=="Ticari Mamül") selected @endif value="Ticari Mamül">Ticari Mamül</option>
                        </select>
                    </div>


                    <div class="form-group col-md-12">
                        <table id="stokkartFirma" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Firma Ad</th>
                                    <th scope="col">Stok Deposu</th>
                                    <th scope="col">Muhasebe Hesap Kodu</th>
                                    <th scope="col">Muhasebe Hesap Adı</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="islem_field">
                                    <td><select name="stokFirmaId" class="form-control">
                                            <option>Firma Seçiniz</option>
                                            @foreach (\App\Models\User::all() as $k => $v)
                                                <option @if($v["id"]==$data[0]["stokFirmaId"]) selected @endif value="{{ $v['id'] }}">
                                                    {{ \App\Models\User::getPublicName($v['id']) }} </option>
                                            @endforeach
                                        </select></td>
                                        <td><select name="stokDepoId" class="form-control">
                                            <option>Stok Depo Seçiniz</option>
                                            @foreach (\App\Models\Envanter\Depo::all() as $k => $v)
                                                <option @if($v["depoAd"]==$data[0]["stokDepoId"]) selected @endif value="{{ $v['id'] }}">
                                                    {{ \App\Models\Envanter\Depo::getDepoAd($v['id']) }} /   {{ \App\Models\Envanter\Depo::getDepoKod($v['id']) }} </option>
                                            @endforeach
                                        </select></td>
                                    <td>
                                        <select name="stokMHK" class="form-control mhk">
                                            <option selected value="">Muhasebe Hesap Kodu Seçiniz</option>
                                                @foreach (\App\Models\Muhasebe\HesapKod::all() as $k => $v)
                                            <option @if($v["hesapKod"]==$data[0]["stokMHK"]) selected @endif data-hk="{{ $v['hesapAd'] }}" value="{{ $v['hesapKod'] }}">
                                                {{ \App\Models\Muhasebe\HesapKod::getHesapNo($v['id']) }} /   {{ \App\Models\Muhasebe\HesapKod::getHesapAd($v['id']) }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><select name="stokMHA" class="form-control mha">
                                            <option selected>Muhasebe Hesap Adı Seçiniz</option>
                                                @foreach (\App\Models\Muhasebe\HesapKod::all() as $k => $v)
                                            <option @if($v["hesapAd"]==$data[0]["stokMHA"]) selected @endif data-ha="{{ $v['hesapKod'] }}" value="{{ $v['hesapAd'] }}">
                                                {{ \App\Models\Muhasebe\HesapKod::getHesapAd($v['id']) }} /   {{ \App\Models\Muhasebe\HesapKod::getHesapNo($v['id']) }} </option>
                                            @endforeach
                                        </select></td>


                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="box-footer pull-right box-tools">
                        <button type="submit" class="btn btn-success">Stok Kart Kaydet</button>
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
