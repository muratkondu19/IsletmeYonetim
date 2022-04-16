@extends('layouts.app')
@section('header')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}">
@endsection
@section('icerik')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Satınalma Faturası
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Yeni Satınalma Faturası Ekle</h3>
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
                <form action="{{ route('muhasebe.satinalmafaturaStore') }}" method="POST" role="form"
                    enctype="multipart/form-data">
                    @csrf
                   
                    <div class="form-vertical col-md-6 master">
                        <div class="form-group">
                            <label>Belge Numarası</label>
                            <input type="text" class="form-control"  name="satinalmafaturaBelgeNumara" value="{{ $data[0]['satinalmaSiparisBelgeNo'] }}">
                        </div>
                        <div class="form-group">
                            <label>Firma Seçiniz</label>
                            <select name="satinalmafaturaFirmaId" class="form-control select2">
                                <option>Firma Seçiniz</option>
                                @foreach  (\App\Models\User::all() as $k => $v)
                                    <option @if($v["id"]==$data[0]["satinalmaSiparisFirmaId"]) selected @endif value="{{ $v['id'] }}">
                                        {{ \App\Models\User::getPublicName($v['id']) }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Hesap Kodu</label>
                            <select name="satinalmafaturaHesapKod" class="form-control select2 carikod">
                                <option>Hesap Kodu Seçiniz</option>
                                @foreach (\App\Models\Muhasebe\Cari::all() as $k => $v)
                                    <option @if ($v['id'] == $data[0]['satinalmaSiparisCariId']) selected @endif value="{{ $v['cariMHK'] }}">
                                    {{ \App\Models\Muhasebe\Cari::getCariAd($v['id']) }}  </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Hesap Adı</label>
                            <select name="satinalmafaturaHesapAd" class="form-control cariad select2">
                                <option>Hesap Adı Seçiniz</option>
                                @foreach (\App\Models\Muhasebe\Cari::all() as $k => $v)
                                    <option @if ($v['id'] == $data[0]['satinalmaSiparisCariId']) selected @endif  value="{{ $v['cariAd'] }}">
                                        {{ \App\Models\Muhasebe\Cari::getCariAd($v['id']) }} </option>
                                @endforeach
                            </select>
                        </div>
    
                        <div class="form-group">
                            <label>Satınalma Tarihi</label>
                            <input type="date" value="{{ date('Y-m-d') }}" class="form-control" name="satinalmafaturaBelgeTarih">
                        </div>
                        <div class="form-group">
                            <label>Açıklama</label>
                            <input type="text" class="form-control" value="{{$data[0]['satinalmaSiparisAciklama']}}'e ait satınalma faturasıdır." name="satinalmafaturaAciklama" placeholder="Açıklama giriniz.">
                        </div>
                    </div>
                 
                    <div class="form-group col-md-12">
                        <table id="muhasebefisFirma" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Depo Ad</th>
                                    <th scope="col">Depo Kod</th>
                                    <th scope="col">Muhasebe Hesap Adı</th>
                                    <th scope="col">Muhasebe Hesap Kodu</th>
                                    <th scope="col">Birim</th>
                                    <th scope="col">Miktar</th>
                                    <th scope="col">Birim Fiyat</th>
                                    <th scope="col">Toplam Fiyat</th>
                                    <th scope="col">X</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataIslem as $k=>$v)
                                <tr class="islem_field">
                                    <td><select class="form-control depoad"
                                        name="islem[{{ $k }}][satinalmafaturaDepoAd]">
                                        <option value="0">Depo Seçiniz</option>
                                        @foreach (\App\Models\Envanter\Depo::all() as $key => $value)
                                            <option @if ($value['id'] == $v['satinalmaSiparisDepoId']) selected @endif
                                                data-depoad={{ $value['depoKod'] }} value="{{ $value['depoAd'] }}">
                                                {{ $value['depoAd'] }} </option>
                                        @endforeach
                                    </select></td>
                                    <td><select class="form-control depokod"
                                        name="islem[{{ $k }}][satinalmaDepoKod]">
                                        <option value="0">Depo Seçiniz</option>
                                        @foreach (\App\Models\Envanter\Depo::all() as $key => $value)
                                            <option @if ($value['id'] == $v['satinalmaSiparisDepoId']) selected @endif
                                                data-depokod={{ $value['depoAd'] }} value="{{ $value['depoKod'] }}">
                                                {{ $value['depoKod'] }}</option>
                                        @endforeach
                                    </select></td>
                                    <td><select class="form-control hesapad"
                                        name="islem[{{ $k }}][satinalmaMuhasebeAd]">
                                        <option value="0">Stok Muhasebe Adı</option>
                                        @foreach (\App\Models\Envanter\StokKart::all() as $key => $value)
                                            <option  @if ($value['id'] == $v['satinalmaSiparisStokId']) selected @endif
                                                data-hesapad={{ $value['stokKod'] }} value="{{ $value['stokAd'] }}">
                                                {{$value['stokAd']}} / {{$value['stokKod']}}</option>
                                        @endforeach
                                    </select></td>
                                <td><select class="form-control hesapkod"
                                        name="islem[{{ $k }}][satinalmaMuhasebeKod]">
                                        <option value="0">Stok Muhasebe Kodu</option>
                                        @foreach (\App\Models\Envanter\StokKart::all() as $key => $value)
                                            <option  @if ($value['id'] == $v['satinalmaSiparisStokId']) selected @endif
                                                data-hesapkod={{ $value['stokAd'] }} value="{{ $value['stokKod'] }}">
                                                {{$value['stokKod']}} / {{$value['stokAd']}}</option>
                                        @endforeach
                                    </select></td>
                         
                                <td><select class="form-control select2" name="islem[{{$k}}][satinalmaBirim]">
                                <option selected value="">Birim Seçiniz</option>
                                <option @if($v['satinalmaSiparisBirim']=="Adet") selected @endif value="Adet">Adet</option>
                                <option @if($v['satinalmaSiparisBirim']=="Litre") selected @endif value="Litre">Litre</option>
                                <option @if($v['satinalmaSiparisBirim']=="KG") selected @endif value="KG">KG</option>
                                </select></td>
                                <td><input type"text" class="form-control" id="miktar" value="{{$v['satinalmaSiparisMiktar']}}"  placeholder="Miktar" name="islem[{{$k}}][satinalmaMiktar]"> </td>
                                <td><input type"text" class="form-control" id="birimfiyat" value="{{$v['satinalmaSiparisBirimFiyat']}}"  placeholder="Birim Fiyatı" name="islem[{{$k}}][satinalmaBirimFiyat]"> </td>
                                <td><input type"text" class="form-control"  id="toplamtutar" value="{{$v['satinalmaSiparisToplamTutar']}}"  placeholder="Toplam Tutar" name="islem[{{$k}}][satinalmaToplamTutar]"> </td>
                                <td><button id="remove_buton" type="button" class="btn btn-danger btn-sm">X</button></td>
                                @endforeach
                            </tbody>

                        </table>
                        <button type="button" id="addRowBtn" class="btn btn-danger">+</button>
                    </div>


                    <div class="box-footer pull-right box-tools">
                        <button type="submit" class="btn btn-success">Satınalma Faturası Kaydet</button>
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
        var i = $('.islem_field').length;
        $("#addRowBtn").click(function() {
            var newRow =
                '<tr class="islem_field">' +
                    '<td><select class="form-control select2 depoad" name="islem['+i+'][satinalmafaturaDepoAd]">' +
                '<option value="0">Depo Seçiniz</option>';
                <?php foreach (\App\Models\Envanter\Depo::all() as $key => $value) { ?>
                newRow += '<option data-depoad=<?php echo $value["id"] ?> value="<?php echo $value['id'] ?>"><?php echo $value['depoAd'] ?></option>';
                <?php } ?>
           

            newRow += '</select></td>' +
            '<td><select class="form-control select2 depokod" name="islem['+i+'][satinalmaDepoKod]">' +
                '<option value="0">Depo Seçiniz</option>';
                <?php foreach (\App\Models\Envanter\Depo::all() as $key => $value) { ?>
                newRow += '<option data-depokod=<?php echo $value["id"] ?> value="<?php echo $value['id'] ?>"><?php echo $value['depoKod'] ?></option>';
                <?php } ?>

                
            newRow += '</select></td>' +
                '<td><select class="form-control select2 hesapad" name="islem[' + i + '][satinalmaMuhasebeAd]">' +
                '<option value="0">Muhasebe Hesap Adı</option>';
                <?php foreach(\App\ Models\ Envanter\ StokKart::all() as $key => $value) { ?>
                newRow += '<option data-hesapad=<?php echo $value['stokKod']; ?> value="<?php echo $value['stokAd']; ?>"><?php echo $value['stokAd'].' / '.$value['stokKod']; ?></option>';
                <?php } ?>


            newRow += '</select></td>' +
                '<td><select class="form-control select2 hesapkod" name="islem[' + i + '][satinalmaMuhasebeKod]">' +
                '<option value="0">Muhasebe Hesap Kodu</option>';
                <?php foreach(\App\ Models\ Envanter\ StokKart::all() as $key => $value) {?>
                newRow += '<option data-hesapkod=<?php echo $value['stokAd']; ?> value="<?php echo $value['stokKod']; ?>"><?php echo $value['stokKod'].' / '.$value['stokAd']; ?></option>';
                <?php } ?>

                newRow += '</select></td><td><select class="form-control select2" name="islem['+i+'][satinalmaBirim]">' +
            '<option selected value="">Birim Seçiniz</option>'+
            '<option value="Adet">Adet</option>'+
            '<option value="Litre">Litre</option>'+
            '<option value="KG">KG</option>'

            newRow += '</select></td>' +
            '<td><input type"text" class="form-control" id="miktar"  placeholder="Miktar" name="islem['+i+'][satinalmaMiktar]"> </td>';


            newRow += '</select></td>' +
            '<td><input type"hidden" class="form-control" id="birimfiyat"  placeholder="Birim Fiyatı" name="islem['+i+'][satinalmaBirimFiyat]"> </td>';

            newRow += '</select></td>' +
            '<td><input type"hidden" class="form-control"  id="toplamtutar"  placeholder="Toplam Tutar" name="islem['+i+'][satinalmaToplamTutar]"> </td>';
            newRow += '</select></td>' +
                '<td><button id="remove_buton" type="button" class="btn btn-danger btn-sm">X</button></td>' + +
                '</tr>';

            $("#muhasebefisFirma").append(newRow);
            i++;
        })

        $("body").on("change", ".depokod", function() {
            var dk = $(this).find(":selected").data("depokod");
            $(this).closest(".islem_field").find(".depoad").val(dk)
        })

        $("body").on("change", ".depoad", function() {
            var da = $(this).find(":selected").data("depoad");
            $(this).closest(".islem_field").find(".depokod").val(da)
        })


        $("body").on("change", ".hesapkod", function() {
            var mhk = $(this).find(":selected").data("hesapkod");
            $(this).closest(".islem_field").find(".hesapad").val(mhk)
        })

        $("body").on("change", ".hesapad", function() {
            var mha = $(this).find(":selected").data("hesapad");
            $(this).closest(".islem_field").find(".hesapkod").val(mha)
        })

        $("body").on("change", ".carikod", function() {
            var carikod = $(this).find(":selected").data("carihkod");
            $(this).closest(".master").find(".cariad").val(carikod)
        })

        $("body").on("change", ".cariad", function() {
            var cariad = $(this).find(":selected").data("carihad");
            $(this).closest(".master").find(".carikod").val(cariad)
        })

        $("body").on("click", "#remove_buton", function() {
            $(this).closest(".islem_field").remove();
        })

        $("body").on("change", "#muhasebefisFirma input", function() {
            var $this = $(this);
            if ($this.is("#birimfiyat")) {
                var birimfiyat = parseFloat($this.closest("tr").find("#birimfiyat").val());
                var miktar = parseFloat($this.closest("tr").find("#miktar").val());
                var geneltoplam=birimfiyat*miktar;
                geneltoplam = geneltoplam.toFixed(2);
                $(this).closest("tr").find("#toplamtutar").val(geneltoplam);
            }
        });


    </script>

@endsection
