@extends('layouts.app')
@section('header')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}">
@endsection
@section('icerik')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Banka Tanım
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Banka Düzenle</h3>
                <div class="pull-right box-tools">
                    <a href="{{ route('muhasebe.banka') }}"> <button type="button" class="btn btn-success">
                       Banka Listesi</button></a>

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
                <form action="{{route('muhasebe.bankaUpdate',['id'=>$data[0]['id']])}}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-6">
                        <label>Banka Kodu</label>
                        <input type="text" class="form-control" name="bankaKod" value=" {{$data[0]['bankaKod']}} ">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Banka Adı</label>
                        <input type="text" class="form-control" name="bankaAd"  value="{{$data[0]['bankaAd']}}" >
                    </div>
                    <div class="form-group col-md-6">
                        <label>Hesap Numarası</label>
                        <input type="text" class="form-control" name="bankaHN" value="{{$data[0]['bankaHN']}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>IBAN</label>
                        <input type="text" class="form-control" name="bankaIBAN" value="{{$data[0]['bankaIBAN']}}">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Hesap Adı</label>
                        <input type="text" class="form-control" name="bankaHesapAd" value="{{$data[0]['bankaHesapAd']}}">
                    </div>

                    <div class="form-group col-md-12">
                        <table id="bankaFirma" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Firma Ad</th>
                                    <th scope="col">Muhasebe Hesap Kodu</th>
                                    <th scope="col">Muhasebe Hesap Adı</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="islem_field">
                                    <td><select name="bankaFirmaId" class="form-control">
                                            <option>Firma Seçiniz</option>
                                            @foreach (\App\Models\User::all() as $k => $v)
                                                <option @if($v["id"]==$data[0]["bankaFirmaId"]) selected @endif value="{{ $v['id'] }}">
                                                    {{ \App\Models\User::getPublicName($v['id']) }} </option>
                                            @endforeach
                                        </select></td>
                                    <td>
                                        <select name="bankaMHK" class="form-control mhk">
                                            <option selected value="">Muhasebe Hesap Kodu Seçiniz</option>
                                                @foreach (\App\Models\Muhasebe\HesapKod::all() as $k => $v)
                                            <option @if($v["hesapKod"]==$data[0]["bankaMHK"]) selected @endif data-hk="{{ $v['hesapAd'] }}" value="{{ $v['hesapKod'] }}">
                                                {{ \App\Models\Muhasebe\HesapKod::getHesapNo($v['id']) }} /  {{ \App\Models\Muhasebe\HesapKod::getHesapAd($v['id']) }} </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><select name="bankaMHA" class="form-control mha">
                                            <option selected>Muhasebe Hesap Adı Seçiniz</option>
                        
                                                @foreach (\App\Models\Muhasebe\HesapKod::all() as $k => $v)
                                            <option @if($v["hesapAd"]==$data[0]["bankaMHA"]) selected @endif data-ha="{{ $v['hesapKod'] }}"  value="{{ $v['hesapAd'] }}">
                                                {{ \App\Models\Muhasebe\HesapKod::getHesapAd($v['id']) }} /  {{ \App\Models\Muhasebe\HesapKod::getHesapNo($v['id']) }} </option>
                                            @endforeach
                                        </select></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="box-footer pull-right box-tools">
                        <button type="submit" class="btn btn-success">Banka Güncelle</button>
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
            $("body").on("change", ".mhk", function() {
                var mhk = $(this).find(":selected").data("hk");
                $(this).closest(".islem_field").find(".mha").val(mhk)
            })

            $("body").on("change", ".mha", function() {
                var mha = $(this).find(":selected").data("ha");
                $(this).closest(".islem_field").find(".mhk").val(mha)
            })
        })


    </script>
@endsection
