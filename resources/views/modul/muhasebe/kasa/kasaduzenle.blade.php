@extends('layouts.app')
@section('header')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}">
@endsection
@section('icerik')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kasa Tanım
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Kasa Düzenle</h3>
                <div class="pull-right box-tools">
                    <a href="{{ route('muhasebe.kasa') }}"> <button type="button" class="btn btn-success">
                            Kasa Listesi</button></a>
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
                <form action="{{route('muhasebe.kasaUpdate',['id'=>$data[0]['id']])}}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-12">
                        <label>Kasa Kodu</label>
                        <input type="text" class="form-control" name="kasaKod" value=" {{$data[0]['kasaKod']}} ">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Kasa Adı</label>
                        <input type="text" class="form-control" name="kasaAd"  value="{{$data[0]['kasaAd']}}" >
                    </div>
                    <div class="form-group col-md-12">
                        <label>Para Birimi</label>
                        <select name="kasaPB" class="form-control select2" style="width: 100%">
                            <option value="TL">TL</option>
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                        </select>
                    </div>
    

                    <div class="form-group col-md-12">
                        <table id="kasaFirma" class="table table-striped">
                            <thead>
                                <tr>
                                    <th  scope="col">Firma Ad</th>
                                    <th scope="col">Muhasebe Hesap Kodu</th>
                                    <th scope="col">Muhasebe Hesap Adı</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="islem_field">
                                    <td><select name="kasaFirmaId" class="form-control">
                                            <option>Firma Seçiniz</option>
                                            @foreach (\App\Models\User::all() as $k => $v)
                                                <option @if($v["id"]==$data[0]["kasaFirmaId"]) selected @endif value="{{ $v['id'] }}">
                                                    {{ \App\Models\User::getPublicName($v['id']) }} </option>
                                            @endforeach
                                        </select></td>
                                    <td>
                                        <select name="kasaMHK" class="form-control mhk">
                                            <option selected value="">Muhasebe Hesap Kodu Seçiniz</option>
                                                @foreach (\App\Models\Muhasebe\HesapKod::all() as $k => $v)
                                            <option @if($v["hesapKod"]==$data[0]["kasaMHK"]) selected @endif data-hk="{{ $v['hesapKod'] }}" value="{{ $v['hesapKod'] }}">
                                                {{ \App\Models\Muhasebe\HesapKod::getHesapNo($v['id']) }} / {{ \App\Models\Muhasebe\HesapKod::getHesapAd($v['id']) }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><select name="kasaMHA" class="form-control mha">
                                            <option selected>Muhasebe Hesap Adı Seçiniz</option>
                                                @foreach (\App\Models\Muhasebe\HesapKod::all() as $k => $v)
                                            <option @if($v["hesapAd"]==$data[0]["kasaMHA"]) selected @endif  data-ha="{{ $v['HesapAd'] }}" value="{{ $v['hesapAd'] }}">
                                                {{ \App\Models\Muhasebe\HesapKod::getHesapAd($v['id']) }} / {{ \App\Models\Muhasebe\HesapKod::getHesapNo($v['id']) }}</option>
                                            @endforeach
                                        </select></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="box-footer pull-right box-tools">
                        <button type="submit" class="btn btn-success">Kasa Güncelle</button>
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
