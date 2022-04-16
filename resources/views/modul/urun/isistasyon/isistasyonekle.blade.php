@extends('layouts.app')
@section('header')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}">
    <style>
        .example-modal .modal {
            position: relative;
            top: auto;
            bottom: auto;
            right: auto;
            left: auto;
            display: block;
            z-index: 1;
        }

        .example-modal .modal {
            background: transparent !important;
        }

    </style>
@endsection
@section('icerik')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            İş İstasyon Tanım
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Yeni İş İstasyon Ekle</h3>
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
                <form action="{{ route('urun.isistasyonStore') }}" method="POST" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-vertical col-md-6 master">
                        <div class="form-group">
                            <label>İş İstasyon Kodu</label>
                            <input type="text" class="form-control" name="isistasyonKod" placeholder="İş İstasyon kodu">
                        </div>
                        <div class="form-group">
                            <label>İş İstasyon Adı</label>
                            <input type="text" class="form-control" name="isistasyonAd" placeholder="İş İstasyon adı">
                        </div>
                        <div class="form-group">
                            <label>İş İstasyonya Bağlı Firma</label>
                            <select name="isistasyonFirmaId" class="form-control select2">
                                <option>Firma Seçiniz</option>
                                @foreach (\App\Models\User::all() as $k => $v)
                                    <option value="{{ $v['id'] }}">
                                        {{ \App\Models\User::getPublicName($v['id']) }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>İş İstasyon Açıklama</label>
                            <input type="text" class="form-control" name="isistasyonAciklama"
                                placeholder="İş İstasyon Açıklaması">
                        </div>

                        <div class="form-group">
                            <label>İş Merkezi Adı</label>
                            <select name="ismerkeziAd" class="form-control select2 ismerkezad">
                                <option value="">İş merkezi seçiniz</option>
                                @foreach (\App\Models\Urun\Ismerkezi::all() as $k => $v)
                                    <option value="{{ $v['ismerkeziAd'] }}">
                                        {{ \App\Models\Urun\Ismerkezi::getIsMerkezAd($v['id']) }} /   {{ \App\Models\Urun\Ismerkezi::getIsMerkezKod($v['id']) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>İş Merkezi Kodu</label>
                            <select name="ismerkeziKod" class="form-control select2 ismerkezkod">
                                <option value="">İş merkezi kodu seçiniz</option>
                                @foreach (\App\Models\Urun\Ismerkezi::all() as $k => $v)
                                    <option value="{{ $v['ismerkeziKod'] }}">
                                        {{ \App\Models\Urun\Ismerkezi::getIsMerkezKod($v['id']) }} /   {{ \App\Models\Urun\Ismerkezi::getIsMerkezAd($v['id']) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="box-footer pull-right box-tools">
                            <button type="submit" class="btn btn-primary">İş İstasyonu Kaydet</button>
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
