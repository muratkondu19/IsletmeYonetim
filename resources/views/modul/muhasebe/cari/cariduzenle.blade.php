@extends('layouts.app')
@section('header')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}">
@endsection
@section('icerik')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cari Tanım
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Cari Düzenle</h3>
                <div class="pull-right box-tools">
                    <a href="{{ route('muhasebe.cari') }}"> <button type="button" class="btn btn-success">
                            Cari Listesi</button></a>

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
                <form action="{{route('muhasebe.cariUpdate',['id'=>$data[0]['id']])}}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-6">
                        <label>Cari Kodu</label>
                        <input type="text" class="form-control" name="cariKod" value=" {{$data[0]['cariKod']}} ">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Cari Adı</label>
                        <input type="text" class="form-control" name="cariAd"  value="{{$data[0]['cariAd']}}" >
                    </div>
                    <div class="form-group col-md-6">
                        <label>Cari Tipi</label>
                        <select name="cariTip" class="form-control select2" style="width: 100%">
                            <option value="Müşteri">Müşteri</option>
                            <option value="Tedarikçi">Tedarikçi</option>
                            <option value="Bayi">Bayi</option>
                            <option value="Müşteri Tedarikçi">Müşteri Tedarikçi</option>
                            <option value="Tedarikçi Fason">Tedarikçi Fason</option>
                            <option value="Müşteri Tedarikçi Fason">Müşteri Tedarikçi Fason</option>
                            <option value="Servis">Servis</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Vergi Kimlik Numarası</label>
                        <input type="text" class="form-control" name="cariVKN" value="{{$data[0]['cariVKN']}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>TC Kimlik Numarası</label>
                        <input type="text" class="form-control" name="cariTCKN" value="{{$data[0]['cariTCKN']}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Vergi Dairesiı</label>
                        <input type="text" class="form-control" name="cariVD" value="{{$data[0]['cariVD']}}">
                    </div>

                    <div class="form-group col-md-6">
                        <label>İl</label>
                        <input type="text" class="form-control" name="cariIl" value="{{$data[0]['cariIl']}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>İlçe</label>
                        <input type="text" class="form-control" name="cariIlce" value="{{$data[0]['cariIlce']}}">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Adres</label>
                        <input type="text" class="form-control" name="cariAdres" value="{{$data[0]['cariAdres']}}">
                    </div>

                    <div class="form-group col-md-12">
                        <table id="cariFirma" class="table table-striped">
                            <thead>
                                <tr>
                                    <th  scope="col">Firma Ad</th>
                                    <th scope="col">Muhasebe Hesap Kodu</th>
                                    <th scope="col">Muhasebe Hesap Adı</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="islem_field">
                                    <td><select name="cariFirmaId" class="form-control">
                                            <option>Firma Seçiniz</option>
                                            @foreach (\App\Models\User::all() as $k => $v)
                                                <option @if($v["id"]==$data[0]["cariFirmaId"]) selected @endif value="{{ $v['id'] }}">
                                                    {{ \App\Models\User::getPublicName($v['id']) }} </option>
                                            @endforeach
                                        </select></td>
                                    <td>
                                        <select name="cariMHK" class="form-control mhk">
                                            <option selected value="">Muhasebe Hesap Kodu Seçiniz</option>
                                      
                                                @foreach (\App\Models\Muhasebe\HesapKod::all() as $k => $v)
                                            <option @if($v["hesapKod"]==$data[0]["cariMHK"]) selected @endif data-hk="{{ $v['hesapAd'] }}" value="{{ $v['hesapKod'] }}">
                                                {{ \App\Models\Muhasebe\HesapKod::getHesapNo($v['id']) }} / {{ \App\Models\Muhasebe\HesapKod::getHesapAd($v['id']) }} </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><select name="cariMHA" class="form-control mha">
                                            <option selected>Muhasebe Hesap Adı Seçiniz</option>
                                            
                                                @foreach (\App\Models\Muhasebe\HesapKod::all() as $k => $v)
                                            <option @if($v["hesapAd"]==$data[0]["cariMHA"]) selected @endif  data-ha="{{ $v['hesapKod'] }}" value="{{ $v['hesapAd'] }}">
                                                {{ \App\Models\Muhasebe\HesapKod::getHesapAd($v['id']) }} /  {{ \App\Models\Muhasebe\HesapKod::getHesapNo($v['id']) }} </option>
                                            @endforeach
                                        </select></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="box-footer pull-right box-tools">
                        <button type="submit" class="btn btn-success">Cari Güncelle</button>
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
