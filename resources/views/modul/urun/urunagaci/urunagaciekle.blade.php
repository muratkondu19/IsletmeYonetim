@extends('layouts.app')
@section('header')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}">
@endsection
@section('icerik')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Ürün Ağacı İşlemleri
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Yeni Ürün Ağacı Ekle</h3>
                <div class="pull-right box-tools">
                    <a href="{{ route('urun.urunagaci') }}"> <button type="button" class="btn btn-success">
                            Ürün Ağacı Listesi</button></a>
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
                <form action="{{ route('urun.urunagaciStore') }}" method="POST" role="form"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group col-md-6">
                        <label>Firma Seçiniz</label>
                        <select name="urunagaciFirmaKod" class="form-control select2">
                            <option>Firma Seçiniz</option>
                            @foreach (\App\Models\User::all() as $k => $v)
                                <option value="{{ $v['id'] }}">
                                    {{ \App\Models\User::getPublicName($v['id']) }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Stok Kodu</label>
                        <select name="urunagaciStokKod" class="form-control select2">
                            <option>Stok Kodu Seçiniz</option>
                            @foreach (\App\Models\Envanter\StokKart::all() as $k => $v)
                                <option value="{{ $v['stokKod'] }}">
                                    {{ \App\Models\Envanter\StokKart::getStokKod($v['id']) }} /  {{ \App\Models\Envanter\StokKart::getStokAd($v['id']) }}  </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Stok Adı</label>
                        <select name="urunagaciStokAd" class="form-control select2">
                            <option>Stok Adı Seçiniz</option>
                            @foreach (\App\Models\Envanter\StokKart::all() as $k => $v)
                                <option value="{{ $v['stokAd'] }}">
                                    {{ \App\Models\Envanter\StokKart::getStokAd($v['id']) }} /  {{ \App\Models\Envanter\StokKart::getStokKod($v['id']) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Stok Takip Birim</label>
                        <select name="urunagaciStokTakipBirim" class="form-control select2" style="width: 100%">
                            <option>Stok Takip Birim Seçiniz</option>
                            <option value="Adet">Adet</option>
                            <option value="Gram">Gram</option>
                            <option value="Litre">Litre</option>
                            <option value="Kilogram">Kilogram</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Stok Giriş Deposu</label>
                        <select name="urunagaciStokGirişDepoAd" class="form-control select2">
                            <option>Stok Giriş Deposu Seçiniz</option>
                            @foreach (\App\Models\Envanter\Depo::all() as $k => $v)
                                <option value="{{ $v['depoAd'] }}">
                                    {{ \App\Models\Envanter\Depo::getDepoAd($v['id']) }} / {{ \App\Models\Envanter\Depo::getDepoKod($v['id']) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Açıklama</label>
                        <input type="text" class="form-control" name="urunagaciAciklama" placeholder="Açıklama giriniz.">
                    </div>


                   
                    <div class="form-group col-md-12">
                        <div class="box-header with-border">
                            <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                            <h3 class="box-title">Malzemeler</h3>
                          </div>
                        <table id="urunagaciFirma" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Satır Tipi</th>
                                    <th scope="col">Stok Kod</th>
                                    <th scope="col">Stok Ad</th>
                                    <th scope="col">Operasyon Ad</th>
                                    <th scope="col">Birim</th>
                                    <th scope="col">Miktar</th>
                                    <th scope="col">X</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>

                        </table>
                        <button type="button" id="addRowBtn" class="btn btn-danger">+</button>
                    </div>


                    <div class="box-footer pull-right box-tools">
                        <button type="submit" class="btn btn-success">Ürün Ağacı Kaydet</button>
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
            '<td><select class="form-control select2" name="islem['+i+'][urunagacimalzemeSatırTip]">' +
            '<option selected value="">Satır Tipi</option>'+
            '<option value="Hammadde">Hammadde</option>'+
            '<option value="Yarı Mamül">Yarı Mamül</option>'+
            '<option value="Mamül">Mamül</option>'
    
            newRow += '</select></td>' +
            '<td><select class="form-control select2 stokkod" name="islem['+i+'][urunagacimalzemeStokKod]">' +
            '<option value="0">Stok Kodu</option>';
            <?php foreach (\App\Models\Envanter\StokKart::all() as $key => $value) { ?>
            newRow += '<option data-stokbirim=<?php echo $value["stokBirim"] ?> data-stokkod=<?php echo $value["id"] ?> value="<?php echo $value['id'] ?>"><?php echo $value['stokKod'].' / '.$value['stokAd'] ?></option>';
            <?php } ?>
            
            newRow += '</select></td>' +
            '<td><select class="form-control select2 stokad" name="islem['+i+'][urunagacimalzemeStokAd]">' +
            '<option value="0">Stok Adı</option>';
            <?php foreach (\App\Models\Envanter\StokKart::all() as $key => $value) { ?>
            newRow += '<option data-stokbirim=<?php echo $value["stokBirim"] ?> data-stokad=<?php echo $value["id"] ?> value="<?php echo $value['id'] ?>"><?php echo $value['stokAd'].' / '.$value['stokKod'] ?></option>';
            <?php } ?>

            newRow += '</select></td>' +
            '<td><select class="form-control select2" name="islem['+i+'][urunagacimalzemeOperasyonAd]">' +
            '<option value="0">Operasyon Adı</option>';
            <?php foreach (\App\Models\Urun\Operasyon::all() as $key => $value) { ?>
            newRow += '<option value="<?php echo $value['id'] ?>"><?php echo $value['operasyonAd'] ?></option>';
            <?php } ?>

            newRow += '</select></td><td><select class="form-control select2 stokbirim" name="islem['+i+'][urunagacimalzemeBirim]">' +
            '<option selected value="">Birim Seçiniz</option>'+
            '<option value="Adet">Adet</option>'+
            '<option value="Litre">Litre</option>'+
            '<option value="KG">KG</option>'

            newRow += '</select></td>' +
            '<td><input type"text" class="form-control" id="miktar" placeholder="Miktar" name="islem['+i+'][urunagacimalzemeMiktar]"> </td>';


            newRow+= '</select></td>'+
            '<td><button id="remove_buton" type="button" class="btn btn-danger btn-sm">X</button></td>' + +
            '</tr>';

            $("#urunagaciFirma").append(newRow);
            i++;
        })


        $("body").on("change", ".stokkod", function() {
            var stk = $(this).find(":selected").data("stokkod");
            $(this).closest(".islem_field").find(".stokad").val(stk);
        })

        $("body").on("change", ".stokad", function() {
            var sta = $(this).find(":selected").data("stokad");
            $(this).closest(".islem_field").find(".stokkod").val(sta)
        })

        $("body").on("change", ".stokad", function() {
            var stkb = $(this).find(":selected").data("stokbirim");
            $(this).closest(".islem_field").find(".stokbirim").val(stkb)
        })

        $("body").on("change", ".stokkod", function() {
            var stkb2 = $(this).find(":selected").data("stokbirim");
            $(this).closest(".islem_field").find(".stokbirim").val(stkb2)
        })

        $("body").on("click", "#remove_buton", function() {
        $(this).closest(".islem_field").remove();
        })

        
    </script>
@endsection
