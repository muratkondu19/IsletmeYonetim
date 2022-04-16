@extends('layouts.app')
@section('header')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}">
@endsection
@section('icerik')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Satınalma Siparişi
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Sipariş Düzenleme</h3>
                <div class="pull-right box-tools">
                    <a href="{{ route('satinalma.satinalmasiparis') }}"> <button type="button" class="btn btn-success">
                            Satınalma Sipariş Listesi</button></a>
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
                <form action="{{ route('satinalma.satinalmasiparisUpdate',['id'=>$data[0]['id']]) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-6">
                        <label>Firma Seçiniz</label>
                        <select name="satinalmaSiparisFirmaId" class="form-control select2">
                            <option>Firma Seçiniz</option>
                            @foreach (\App\Models\User::all() as $k => $v)
                                <option @if($v["id"]==$data[0]["satinalmaSiparisFirmaId"]) selected @endif value="{{ $v['id'] }}">
                                    {{ \App\Models\User::getPublicName($v['id']) }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Sipariş Belge Numarası</label>
                        <input type="text" class="form-control" name="satinalmaSiparisBelgeNo"  value="{{$data[0]['satinalmaSiparisBelgeNo']}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Sipariş Tarihi</label>
                        <input type="date" value="{{$data[0]['satinalmaSiparisTarih'] }}" class="form-control" name="satinalmaSiparisTarih">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Sipariş Hareket Kodu</label>
                        <select name="satinalmaSiparisHareketKod" class="form-control select2" style="width: 100%">
                            <option value="0">Hareket Kodu Seçiniz</option>
                            <option  @if($data[0]['satinalmaSiparisHareketKod']=="Satış Siparişi") selected @endif value="Satış Siparişi">Satınalma Siparişi</option>
                            <option  @if($data[0]['satinalmaSiparisHareketKod']=="İhracat Kayıtlı Satış Sipariş") selected @endif value="İhracat Kayıtlı Satış Sipariş">İhracat Kayıtlı Satınalma Sipariş</option>
                            <option  @if($data[0]['satinalmaSiparisHareketKod']=="İhracat Satış Sipariş") selected @endif value="İhracat Satış Sipariş">İhracat Satınalma Sipariş</option>

                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Cari Kodu</label>
                    <select name="satinalmaSiparisCariId" class="form-control select2">
                        <option>Cari Seçiniz</option>
                        @foreach (\App\Models\Muhasebe\Cari::all() as $k => $v)
                            <option @if($v["id"]==$data[0]["satinalmaSiparisCariId"]) selected @endif value="{{ $v['id'] }}">
                                {{ \App\Models\Muhasebe\Cari::getCariAd($v['id']) }} </option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Açıklama</label>
                        <input type="text" class="form-control" name="satinalmaSiparisAciklama" value="{{$data[0]['satinalmaSiparisAciklama']}}">
                    </div>
                    
                    <div class="form-group col-md-12">
                        <table id="satinalmasiparisDetay" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Tip</th>
                                    <th scope="col">Stok / Hizmet Kodu</th>
                                    <th scope="col">Stok / Hizmet Adı</th>
                                    <th scope="col">Depo Kodu</th>
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
                                    <td><select class="form-control"  name="islem[{{$k}}][satinalmaSiparisTip]">
                                        <option selected value="">Tip</option>
                                        <option @if($v['satinalmaSiparisTip']=="Stok") selected @endif value="Stok">Stok</option>
                                        <option @if($v['satinalmaSiparisTip']=="Hizmet") selected @endif value="Hizmet">Hizmet</option></select>
                                    </td>
                                    <td><select class="form-control stokid" name="islem[{{$k}}][satinalmaSiparisStokId]">
                                        <option value="0">Stok Kodu</option>
                                        @foreach (\App\Models\Envanter\StokKart::all() as $key => $value)
                                        <option @if($value['id']==$v['satinalmaSiparisStokId']) selected @endif 
                                        data-stokdepoid={{$value["stokDepoId"] }} data-stokid={{$value["id"]}} value="{{$value['id']}}">{{$value['stokKod']}} / {{$value['stokAd']}}</option>
                                        @endforeach </select>
                                    </td>
                                    <td><select class="form-control stokad" name="islem[{{$k}}][satinalmaSiparisStokAd]">
                                        <option value="0">Stok Kodu</option>
                                        @foreach (\App\Models\Envanter\StokKart::all() as $key => $value)
                                        <option @if($value['id']==$v['satinalmaSiparisStokAd']) selected @endif
                                        data-stokdepoid2={{$value["stokDepoId"] }} data-stokad={{$value["id"]}} value="{{$value['id']}}">{{$value['stokAd']}} / {{$value['stokKod']}}</option>
                                        @endforeach </select>
                                    </td>
                                    <td><select class="form-control depoid" name="islem[{{$k}}][satinalmaSiparisDepoId]">
                                        <option value="0">Depo Seçiniz</option>
                                        @foreach (\App\Models\Envanter\Depo::all() as $key => $value)
                                        <option @if($value['id']==$v['satinalmaSiparisDepoId']) selected @endif  value="{{$value['id']}}">{{$value['depoAd']}}</option>
                                        @endforeach </select>
                                    </td>
                                    <td><select class="form-control"  name="islem[{{$k}}][satinalmaSiparisBirim]">
                                        <option selected value="">Birim Seçiniz</option>
                                        <option @if($v['satinalmaSiparisBirim']=="Adet") selected @endif value="Adet">Adet</option>
                                        <option @if($v['satinalmaSiparisBirim']=="Litre") selected @endif value="Litre">Litre</option>
                                        <option @if($v['satinalmaSiparisBirim']=="KG") selected @endif value="KG">KG</option></select>
                                    </td>
                                    <td><input type"text" class="form-control" id="miktar"value="{{$v['satinalmaSiparisMiktar']}}" name="islem[{{$k}}][satinalmaSiparisMiktar]"> </td>
                                    <td><input type"text" class="form-control" id="birimfiyat"value="{{$v['satinalmaSiparisBirimFiyat']}}" name="islem[{{$k}}][satinalmaSiparisBirimFiyat]"> </td>
                                    <td><input type"text" class="form-control" id="toplamtutar"value="{{$v['satinalmaSiparisToplamTutar']}}" name="islem[{{$k}}][satinalmaSiparisToplamTutar]"> </td>
                                    <td><button id="remove_buton" type="button" class="btn btn-danger btn-sm">X</button></td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <button type="button" id="addRowBtn" class="btn btn-danger">+</button>
                    </div>

                    <div class="box-footer pull-right box-tools">
                        <button type="submit" class="btn btn-success">Satınalma Siparişi Güncelle</button> 
                        <a href="{{ route('muhasebe.satinalmafaturaOlustur',['satinalmaId'=>$data[0]['id']]) }}"> <button type="button" class="btn btn-danger">
                           Satınalma Faturası Oluştur</button></a>
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
            var newRow = '<tr class="islem_field">' +
            '<td><select class="form-control select2"  name="islem['+i+'][satinalmaSiparisTip]">' +
            '<option selected value="">Tip</option>'+
            '<option value="Stok">Stok</option>'+
            '<option value="Hizmet">Hizmet</option>'
            
            newRow += '</select></td>' +
            '<td><select class="form-control select2 stokid" name="islem['+i+'][satinalmaSiparisStokId]">' +
            '<option value="0">Stok Kodu</option>';
            <?php foreach (\App\Models\Envanter\StokKart::all() as $key => $value) { ?>
            newRow += '<option data-stokdepoid=<?php echo $value["stokDepoId"]?> data-stokid=<?php echo $value["id"] ?> value="<?php echo $value['id'] ?>"><?php echo $value['stokKod'].' / '.$value['stokAd'] ?></option>';
            <?php } ?>

            newRow += '</select></td>' +
            '<td><select class="form-control select2 stokad" name="islem['+i+'][satinalmaSiparisStokAd]">' +
            '<option value="0">Stok Adı</option>';
            <?php foreach (\App\Models\Envanter\StokKart::all() as $key => $value) { ?>
            newRow += '<option data-stokdepoid2=<?php echo $value["stokDepoId"]?> data-stokad=<?php echo $value["id"] ?> value="<?php echo $value['id'] ?>"><?php echo $value['stokAd'].' / '.$value['stokKod'] ?></option>';
            <?php } ?>

            newRow += '</select></td>' +
            '<td><select class="form-control select2 depoid" name="islem['+i+'][satinalmaSiparisDepoId]">' +
            '<option value="0">Depo Seçiniz</option>';
            <?php foreach (\App\Models\Envanter\Depo::all() as $key => $value) { ?>
            newRow += '<option data-islemad=<?php echo $value["id"] ?> value="<?php echo $value['id'] ?>"><?php echo $value['depoAd'] ?></option>';
            <?php } ?>

            newRow += '</select></td><td><select class="form-control select2" name="islem['+i+'][satinalmaSiparisBirim]">' +
            '<option selected value="">Birim Seçiniz</option>'+
            '<option value="Adet">Adet</option>'+
            '<option value="Litre">Litre</option>'+
            '<option value="KG">KG</option>'

            newRow += '</select></td>' +
            '<td><input type"text" class="form-control" id="miktar"  placeholder="Miktar" name="islem['+i+'][satinalmaSiparisMiktar]"> </td>';


            newRow += '</select></td>' +
            '<td><input type"hidden" class="form-control" id="birimfiyat"  placeholder="Birim Fiyatı" name="islem['+i+'][satinalmaSiparisBirimFiyat]"> </td>';

            newRow += '</select></td>' +
            '<td><input type"hidden" class="form-control"  id="toplamtutar"  placeholder="Toplam Tutar" name="islem['+i+'][satinalmaSiparisToplamTutar]"> </td>';

            newRow+= '</select></td>'+
            '<td><button id="remove_buton" type="button" class="btn btn-danger btn-sm">X</button></td>' + +
            '</tr>';

            $("#satinalmasiparisDetay").append(newRow);
            i++;
        })


        $("body").on("click", "#remove_buton", function() {
        $(this).closest(".islem_field").remove();
        })

        $("body").on("change", ".stokid", function() {
            var sdi = $(this).find(":selected").data("stokdepoid");
            $(this).closest(".islem_field").find(".depoid").val(sdi);
        })

        $("body").on("change", ".stokad", function() {
            var sdi2 = $(this).find(":selected").data("stokdepoid2");
            $(this).closest(".islem_field").find(".depoid").val(sdi2);
        })

        $("body").on("change", ".stokid", function() {
            var itk = $(this).find(":selected").data("stokid");
            $(this).closest(".islem_field").find(".stokad").val(itk);
        })

        $("body").on("change", ".stokad", function() {
            var itk = $(this).find(":selected").data("stokad");
            $(this).closest(".islem_field").find(".stokid").val(itk);
        })

        $("body").on("change", "#satinalmasiparisDetay input", function() {
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
