@extends('layouts.app')
@section('header')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}">
@endsection
@section('icerik')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Muhasebe Fiş İşlemleri
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Yeni Muhasebe Fiş Ekle</h3>
                <div class="pull-right box-tools">
                    <a href="{{ route('muhasebe.muhasebefis') }}"> <button type="button" class="btn btn-success">
                            Muhasebe Fiş Listesi</button></a>
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
                <form action="{{ route('muhasebe.muhasebefisStore') }}" method="POST" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-6">
                        <label>Fiş Numarası</label>
                        <input type="text" class="form-control" name="miFisNo" placeholder="Fiş numarası giriniz.">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Firma Seçiniz</label>
                        <select name="miFirmaId" class="form-control select2">
                            <option>Firma Seçiniz</option>
                            @foreach (\App\Models\User::all() as $k => $v)
                                <option value="{{ $v['id'] }}">
                                    {{ \App\Models\User::getPublicName($v['id']) }} </option>
                            @endforeach
                        </select>
                    </div>
                
                    <div class="form-group col-md-6">
                        <label>Muhasebe Fiş Tipi</label>
                        <select name="miFisTipKod" class="form-control select2" style="width: 100%">
                            <option value="0">Fiş Tipi Seçiniz</option>
                            <option value="Mahsup">Mahsup</option>
                            <option value="Tediye">Tediye</option>
                            <option value="Tahsil">Tahsil</option>
                            <option value="Açılış">Açılış</option>
                            <option value="Kapanış">Kapanış</option>
                            <option value="Yansıtma">Yansıtma</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Fiş Tarihi</label>
                        <input type="date" value="{{ date('Y-m-d') }}" class="form-control" name="miFisTarih">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Açıklama</label>
                        <input type="text" class="form-control" name="miAciklama" placeholder="Açıklama giriniz.">
                    </div>

                    <div class="form-group col-md-12">
                        <table id="muhasebefisFirma" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">İşlem Tipi Kodu</th>
                                    <th scope="col">İşlem Tipi Adı</th>
                                    <th scope="col">Muhasebe Hesap Adı</th>
                                    <th scope="col">Muhasebe Hesap Kodu</th>
                                    <th scope="col">Tutar</th>
                                    <th scope="col">B/A</th>
                                    <th scope="col">X</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>

                        </table>
                        <button type="button" id="addRowBtn" class="btn btn-danger">+</button>
                    </div>

                    <div class="box-footer pull-right box-tools">
                        <button type="submit" class="btn btn-success">Muhasebe Fiş Kaydet</button>
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
            });
        var i = $('.islem_field').length;
        $("#addRowBtn").click(function() {
            var newRow =
            '<tr class="islem_field">' +
            '<td><select class="form-control islemtipkod" name="islem['+i+'][miIslemTipKod]">' +
            '<option value="0">İşlem Tipi Kodu</option>';
            <?php foreach (\App\Models\Muhasebe\IslemTip::all() as $key => $value) { ?>
            newRow += '<option data-islemtipkod=<?php echo $value["id"] ?> value="<?php echo $value['id'] ?>"><?php echo $value['islemTipKod'].' / '.$value['islemTipAd'] ?></option>';
            <?php } ?>
    
            newRow += '</select></td>' +
            '<td><select class="form-control islemtipad" name="islem['+i+'][miIslemTipAd]">' +
            '<option value="0">İşlem Tip Adı</option>';
            <?php foreach (\App\Models\Muhasebe\IslemTip::all() as $key => $value) { ?>
            newRow += '<option data-islemtipad=<?php echo $value["id"] ?> value="<?php echo $value['id'] ?>"><?php echo $value['islemTipAd'].' / '.$value['islemTipKod'] ?></option>';
            <?php } ?>

            newRow += '</select></td>' +
            '<td><select class="form-control muhasebead" name="islem['+i+'][miMHA]">' +
            '<option value="0">Muhasebe Hesap Adı</option>';
            <?php foreach (\App\Models\Muhasebe\HesapKod::all() as $key => $value) { ?>
            newRow += '<option data-hesapad=<?php echo $value["hesapKod"] ?> value="<?php echo $value['hesapAd'] ?>"><?php echo $value['hesapAd'].' / '.$value['hesapKod'] ?></option>';
            <?php } ?>
            
            newRow += '</select></td>' +
            '<td><select class="form-control muhasebekod" name="islem['+i+'][miMHK]">' +
            '<option value="0">Muhasebe Hesap Kodu</option>';
            <?php foreach (\App\Models\Muhasebe\HesapKod::all() as $key => $value) { ?>
            newRow += '<option data-hesapkod=<?php echo $value["hesapAd"] ?> value="<?php echo $value['hesapKod'] ?>"><?php echo $value['hesapKod'].' / '.$value['hesapAd'] ?></option>';
            <?php } ?>


            newRow += '</select></td>' +
            '<td><input type"text" class="form-control" id="tutar" placeholder="Tutar" name="islem['+i+'][miTutar]"> </td>';

            newRow += '<td><select class="form-control  ba" id="ba" name="islem['+i+'][miBA]">' +
            '<option selected value="">B/A</option>'+
            '<option data-a="borc" value="Borç">Borç</option>'+
            '<option data-a="alacak" value="Alacak">Alacak</option>';

            newRow+= '</select></td>'+
            '<td><button id="remove_buton" type="button" class="btn btn-danger btn-sm">X</button></td>' + +
            '</tr>';

            $("#muhasebefisFirma").append(newRow);
            i++;
        })


        $("body").on("change", ".islemtipkod", function() {
            var itk = $(this).find(":selected").data("islemtipkod");
            $(this).closest(".islem_field").find(".islemtipad").val(itk);
        })

        $("body").on("change", ".islemtipad", function() {
            var ita = $(this).find(":selected").data("islemtipad");
            $(this).closest(".islem_field").find(".islemtipkod").val(ita)
        })

        $("body").on("change", ".muhasebekod", function() {
            var mhk = $(this).find(":selected").data("hesapkod");
            $(this).closest(".islem_field").find(".muhasebead").val(mhk)
        })

        $("body").on("change", ".muhasebead", function() {
            var mha = $(this).find(":selected").data("hesapad");
            $(this).closest(".islem_field").find(".muhasebekod").val(mha)
        })

        $("body").on("click", "#remove_buton", function() {
        $(this).closest(".islem_field").remove();
        })



        $("body").on("change", "#muhasebefisFirma input", function() {
            var $this = $(this);
            if ($this.is("#tutar")) {
                var tutar = parseFloat($this.closest("tr").find("#tutar").val());
                tutar = tutar.toFixed(2);
            }
        });
      

        
    </script>
@endsection
