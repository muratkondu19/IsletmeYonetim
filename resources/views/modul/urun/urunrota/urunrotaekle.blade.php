@extends('layouts.app')
@section('header')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}">
@endsection
@section('icerik')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Ürün Rota İşlemleri
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Yeni Ürün Rota Ekle</h3>
                <div class="pull-right box-tools">
                    <a href="{{ route('urun.urunrota') }}"> <button type="button" class="btn btn-success">
                           Ürün Rota Listesi</button></a>
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
                <form action="{{ route('urun.urunrotaStore') }}" method="POST" role="form"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group col-md-6">
                        <label>Firma Seçiniz</label>
                        <select name="urunrotaFirmaKod" class="form-control select2">
                            <option>Firma Seçiniz</option>
                            @foreach (\App\Models\User::all() as $k => $v)
                                <option value="{{ $v['id'] }}">
                                    {{ \App\Models\User::getPublicName($v['id']) }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Rota Tipi</label>
                        <select name="urunrotaRotaTip" class="form-control select2">
                            <option>Rota Tipi Seçiniz</option>
                            @foreach (\App\Models\Urun\RotaTip::all() as $k => $v)
                                <option value="{{ $v['rotatipAd'] }}">
                                    {{ \App\Models\Urun\RotaTip::getRotatipKod($v['id']) }} /  {{ \App\Models\Urun\RotaTip::getRotatipAd($v['id']) }}  </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Stok Kodu</label>
                        <select name="urunrotaStokKod" class="form-control select2">
                            <option>Stok Kodu Seçiniz</option>
                            @foreach (\App\Models\Envanter\StokKart::all() as $k => $v)
                                <option value="{{ $v['stokKod'] }}">
                                    {{ \App\Models\Envanter\StokKart::getStokKod($v['id']) }} /  {{ \App\Models\Envanter\StokKart::getStokAd($v['id']) }}  </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Açıklama</label>
                        <input type="text" class="form-control" name="urunrotaAciklama" placeholder="Açıklama giriniz.">
                    </div>


                   
                    <div class="form-group col-md-12">
                        <div class="box-header with-border">
                            <i class="fa fa-road" aria-hidden="true"></i>
                            <h3 class="box-title">Rota Şablonu</h3>
                          </div>
                        <table id="urunrotaFirma" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Operasyon Kod</th>
                                    <th scope="col">İş İstasyonu Kod</th>
                                    <th scope="col">İş Merkezi Kod</th>
                                    <th scope="col">X</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>

                        </table>
                        <button type="button" id="addRowBtn" class="btn btn-danger">+</button>
                    </div>


                    <div class="box-footer pull-right box-tools">
                        <button type="submit" class="btn btn-success">Ürün Rota Kaydet</button>
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
        var i = $('.islem_field').length;
        $("#addRowBtn").click(function() {
            var newRow =
            '<tr class="islem_field">' +
            '<td><select class="form-control select2 stokkod" name="islem['+i+'][urunrotaOperasyonKod]">' +
            '<option value="0">Operasyon Kodu</option>';
            <?php foreach (\App\Models\Urun\Operasyon::all() as $key => $value) { ?>
            newRow += '<option value="<?php echo $value['operasyonKod'] ?>"><?php echo $value['operasyonKod'].' / '.$value['operasyonAd'] ?></option>';
            <?php } ?>
            
            newRow += '</select></td>' +
            '<td><select class="form-control select2 isistasyon" name="islem['+i+'][urunrotaIsistasyonKod]">' +
            '<option value="0">İş İstasyonu</option>';
            <?php foreach (\App\Models\Urun\Isistasyon::all() as $key => $value) { ?>
            newRow += '<option data-isistasyon=<?php echo $value["ismerkeziKod"] ?> value="<?php echo $value['isistasyonKod'] ?>"><?php echo $value['isistasyonKod'].' / '.$value['isistasyonAd']  ?></option>';
            <?php } ?>

            newRow += '</select></td>' +
            '<td><select class="form-control select2 ismerkez" name="islem['+i+'][urunrotaIsmerkezKod]">' +
            '<option value="0">İş Merkezi</option>';
            <?php foreach (\App\Models\Urun\Isistasyon::all() as $key => $value) { ?>
            newRow += '<option data-ismerkez=<?php echo $value["ismerkeziKod"] ?> value="<?php echo $value['ismerkeziKod'] ?>"><?php echo $value['ismerkeziKod'].' / '.$value['ismerkeziAd'] ?></option>';
            <?php } ?>


            newRow+= '</select></td>'+
            '<td><button id="remove_buton" type="button" class="btn btn-danger btn-sm">X</button></td>' + +
            '</tr>';

            $("#urunrotaFirma").append(newRow);
            i++;
        })


        $("body").on("change", ".isistasyon", function() {
            var stk = $(this).find(":selected").data("isistasyon");
            $(this).closest(".islem_field").find(".ismerkez").val(stk)
        })

        $("body").on("change", ".ismerkez", function() {
            var sta = $(this).find(":selected").data("ismerkez");
            $(this).closest(".islem_field").find(".isistasyon").val(sta)
        })


        $("body").on("click", "#remove_buton", function() {
        $(this).closest(".islem_field").remove();
        })

        
    </script>
@endsection
