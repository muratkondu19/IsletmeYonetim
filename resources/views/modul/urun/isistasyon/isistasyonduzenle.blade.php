@extends('layouts.app')
@section('header')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}">
@endsection
@section('icerik')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            İş İstasyon İnceleme Düzenleme
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">İş İstasyon Düzeneleme</h3>
                <div class="pull-right box-tools">
                    <a href="{{ route('urun.isistasyon') }}"> <button type="button" class="btn btn-success">
                            İş İstasyon Listesi</button></a>
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
                <form action="{{ route('urun.isistasyonUpdate',['id'=>$data[0]['id']]) }}" method="POST" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-vertical col-md-6 master">
                        <div class="form-group">
                            <label>İş İstasyon Kodu</label>
                            <input type="text" class="form-control" name="isistasyonKod" value=" {{$data[0]['isistasyonKod']}}">
                        </div>
                        <div class="form-group">
                            <label>İş İstasyon Adı</label>
                            <input type="text" class="form-control" name="isistasyonAd" value=" {{$data[0]['isistasyonAd']}}">
                        </div>
                        <div class="form-group">
                            <label>İş İstasyonya Bağlı Firma</label>
                            <select name="isistasyonFirmaId" class="form-control select2">
                                <option>Firma Seçiniz</option>
                                @foreach (\App\Models\User::all() as $k => $v)
                                    <option  @if($v["id"]==$data[0]["isistasyonFirmaId"]) selected @endif value="{{ $v['id'] }}">
                                        {{ \App\Models\User::getPublicName($v['id']) }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>İş İstasyon Açıklama</label>
                            <input type="text" class="form-control" name="isistasyonAciklama"
                            value=" {{$data[0]['isistasyonAciklama']}}">
                        </div>

                        <div class="form-group">
                            <label>İş Merkezi Adı</label>
                            <select name="ismerkeziAd" class="form-control select2 ismerkezad">
                                <option value="">İş merkezi seçiniz</option>
                                @foreach (\App\Models\Urun\Ismerkezi::all() as $k => $v)
                                    <option  @if($v["ismerkeziAd"]==$data[0]["ismerkeziAd"]) selected @endif value="{{ $v['ismerkeziAd'] }}" data-ismerkezad={{ $v['id'] }}>
                                        {{ \App\Models\Urun\Ismerkezi::getIsMerkezAd($v['id']) }} /   {{ \App\Models\Urun\Ismerkezi::getIsMerkezKod($v['id']) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>İş Merkezi Kodu</label>
                            <select name="ismerkeziKod" class="form-control select2 ismerkezkod">
                                <option value="">İş merkezi kodu seçiniz</option>
                                @foreach (\App\Models\Urun\Ismerkezi::all() as $k => $v)
                                    <option  @if($v["ismerkeziKod"]==$data[0]["ismerkeziKod"]) selected @endif value="{{ $v['ismerkeziKod'] }}" data-ismerkezkod={{ $v['id'] }}>
                                        {{ \App\Models\Urun\Ismerkezi::getIsMerkezKod($v['id']) }} /   {{ \App\Models\Urun\Ismerkezi::getIsMerkezAd($v['id']) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="box-footer pull-right box-tools">
                            <button type="submit" class="btn btn-primary">İş İstasyonu Güncelle</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>


@endsection
@section('footer')
    <!-- Select2 -->
    <script src="{{ asset('backend/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
        });


    </script>
@endsection
