@extends('layouts.app')
@section('header')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}">
@endsection
@section('icerik')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Satınalma Teklifi
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Teklif Düzenleme</h3>
                <div class="pull-right box-tools">
                    <a href="{{ route('satinalma.satinalmateklif') }}"> <button type="button" class="btn btn-success">
                            Satınalma Teklif Listesi</button></a>
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
                <form action="{{ route('satinalma.satinalmateklifUpdate',['id'=>$data[0]['id']]) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-6">
                        <label>Firma Seçiniz</label>
                        <select name="satinalmaTeklifFirmaId" class="form-control select2">
                            <option>Firma Seçiniz</option>
                            @foreach (\App\Models\User::all() as $k => $v)
                                <option @if($v["id"]==$data[0]["satinalmaTeklifFirmaId"]) selected @endif value="{{ $v['id'] }}">
                                    {{ \App\Models\User::getPublicName($v['id']) }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Teklif Belge Numarası</label>
                        <input type="text" class="form-control" name="satinalmaTeklifBelgeNo"  value="{{$data[0]['satinalmaTeklifBelgeNo']}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Teklif Tarihi</label>
                        <input type="date" value="{{$data[0]['satinalmaTeklifTarih'] }}" class="form-control" name="satinalmaTeklifTarih">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Teklif Hareket Kodu</label>
                        <select name="satinalmaTeklifHareketKod" class="form-control select2" style="width: 100%">
                            <option value="0">Hareket Kodu Seçiniz</option>
                            <option  @if($data[0]['satinalmaTeklifHareketKod']=="Satış Teklifi") selected @endif value="Satış Teklifi">Satınalma Teklifi</option>
                            <option  @if($data[0]['satinalmaTeklifHareketKod']=="İhracat Kayıtlı Satış Teklif") selected @endif value="İhracat Kayıtlı Satış Teklif">İhracat Kayıtlı Satınalma Teklif</option>
                            <option  @if($data[0]['satinalmaTeklifHareketKod']=="İhracat Satış Teklif") selected @endif value="İhracat Satış Teklif">İhracat Satınalma Teklif</option>

                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Cari Kodu</label>
                    <select name="satinalmaTeklifCariId" class="form-control select2">
                        <option>Cari Seçiniz</option>
                        @foreach (\App\Models\Muhasebe\Cari::all() as $k => $v)
                            <option @if($v["id"]==$data[0]["satinalmaTeklifCariId"]) selected @endif value="{{ $v['id'] }}">
                                {{ \App\Models\Muhasebe\Cari::getCariAd($v['id']) }} </option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Açıklama</label>
                        <input type="text" class="form-control" name="satinalmaTeklifAciklama" value="{{$data[0]['satinalmaTeklifAciklama']}}">
                    </div>
                    
                    <div class="form-group col-md-12">
                        <table id="satinalmateklifDetay" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Tip</th>
                                    <th scope="col">Depo Kodu</th>
                                    <th scope="col">Stok / Hizmet Kodu</th>
                                    <th scope="col">Stok / Hizmet Adı</th>
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
                                    <td><select class="form-control"  name="islem[{{$k}}][satinalmaTeklifTip]">
                                        <option selected value="">Tip</option>
                                        <option @if($v['satinalmaTeklifTip']=="Stok") selected @endif value="Stok">Stok</option>
                                        <option @if($v['satinalmaTeklifTip']=="Hizmet") selected @endif value="Hizmet">Hizmet</option></select>
                                    </td>
                                    <td><select class="form-control" name="islem[{{$k}}][satinalmaTeklifDepoId]">
                                        <option value="0">Depo Seçiniz</option>
                                        @foreach (\App\Models\Envanter\Depo::all() as $key => $value)
                                        <option @if($value['id']==$v['satinalmaTeklifDepoId']) selected @endif  value="{{$value['id']}}">{{$value['depoAd']}}</option>
                                        @endforeach </select>
                                    </td>
                                    <td><select class="form-control stokid" name="islem[{{$k}}][satinalmaTeklifStokId]">
                                        <option value="0">Stok Kodu</option>
                                        @foreach (\App\Models\Envanter\StokKart::all() as $key => $value)
                                        <option @if($value['id']==$v['satinalmaTeklifStokId']) selected @endif data-stokid={{$value["id"]}} value="{{$value['id']}}">{{$value['stokKod']}} / {{$value['stokAd']}}</option>
                                        @endforeach </select>
                                    </td>
                                    <td><select class="form-control stokad" name="islem[{{$k}}][satinalmaTeklifStokAd]">
                                        <option value="0">Stok Kodu</option>
                                        @foreach (\App\Models\Envanter\StokKart::all() as $key => $value)
                                        <option @if($value['id']==$v['satinalmaTeklifStokAd']) selected @endif data-stokad={{$value["id"]}} value="{{$value['id']}}">{{$value['stokAd']}} / {{$value['stokKod']}}</option>
                                        @endforeach </select>
                                    </td>
                                    <td><select class="form-control"  name="islem[{{$k}}][satinalmaTeklifBirim]">
                                        <option selected value="">Birim Seçiniz</option>
                                        <option @if($v['satinalmaTeklifBirim']=="Adet") selected @endif value="Adet">Adet</option>
                                        <option @if($v['satinalmaTeklifBirim']=="Litre") selected @endif value="Litre">Litre</option>
                                        <option @if($v['satinalmaTeklifBirim']=="KG") selected @endif value="KG">KG</option></select>
                                    </td>
                                    <td><input type"text" class="form-control" id="miktar"value="{{$v['satinalmaTeklifMiktar']}}" name="islem[{{$k}}][satinalmaTeklifMiktar]"> </td>
                                    <td><input type"text" class="form-control" id="birimfiyat"value="{{$v['satinalmaTeklifBirimFiyat']}}" name="islem[{{$k}}][satinalmaTeklifBirimFiyat]"> </td>
                                    <td><input type"text" class="form-control" id="toplamtutar"value="{{$v['satinalmaTeklifToplamTutar']}}" name="islem[{{$k}}][satinalmaTeklifToplamTutar]"> </td>
                                    <td><button id="remove_buton" type="button" class="btn btn-danger btn-sm">X</button></td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <button type="button" id="addRowBtn" class="btn btn-danger">+</button>
                    </div>

                    <div class="box-footer pull-right box-tools">
                        <button type="submit" class="btn btn-success">Satış Teklifi Güncelle</button>
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
            '<td><select class="form-control select2"  name="islem['+i+'][satinalmaTeklifTip]">' +
            '<option selected value="">Tip</option>'+
            '<option value="Stok">Stok</option>'+
            '<option value="Hizmet">Hizmet</option>'
    
            newRow += '</select></td>' +
            '<td><select class="form-control select2" name="islem['+i+'][satinalmaTeklifDepoId]">' +
            '<option value="0">Depo Seçiniz</option>';
            <?php foreach (\App\Models\Envanter\Depo::all() as $key => $value) { ?>
            newRow += '<option data-islemad=<?php echo $value["id"] ?> value="<?php echo $value['id'] ?>"><?php echo $value['depoAd'] ?></option>';
            <?php } ?>
            
            newRow += '</select></td>' +
            '<td><select class="form-control select2 stokid" name="islem['+i+'][satinalmaTeklifStokId]">' +
            '<option value="0">Stok Kodu</option>';
            <?php foreach (\App\Models\Envanter\StokKart::all() as $key => $value) { ?>
            newRow += '<option data-stokid=<?php echo $value["id"] ?> value="<?php echo $value['id'] ?>"><?php echo $value['stokKod'].' / '.$value['stokAd'] ?></option>';
            <?php } ?>

            newRow += '</select></td>' +
            '<td><select class="form-control select2 stokad" name="islem['+i+'][satinalmaTeklifStokAd]">' +
            '<option value="0">Stok Adı</option>';
            <?php foreach (\App\Models\Envanter\StokKart::all() as $key => $value) { ?>
            newRow += '<option data-stokad=<?php echo $value["id"] ?> value="<?php echo $value['id'] ?>"><?php echo $value['stokAd'].' / '.$value['stokKod'] ?></option>';
            <?php } ?>
            newRow += '</select></td><td><select class="form-control select2" name="islem['+i+'][satinalmaTeklifBirim]">' +
            '<option selected value="">Birim Seçiniz</option>'+
            '<option value="Adet">Adet</option>'+
            '<option value="Litre">Litre</option>'+
            '<option value="KG">KG</option>'

            newRow += '</select></td>' +
            '<td><input type"text" class="form-control" id="miktar"  placeholder="Miktar" name="islem['+i+'][satinalmaTeklifMiktar]"> </td>';


            newRow += '</select></td>' +
            '<td><input type"hidden" class="form-control" id="birimfiyat"  placeholder="Birim Fiyatı" name="islem['+i+'][satinalmaTeklifBirimFiyat]"> </td>';

            newRow += '</select></td>' +
            '<td><input type"hidden" class="form-control"  id="toplamtutar"  placeholder="Toplam Tutar" name="islem['+i+'][satinalmaTeklifToplamTutar]"> </td>';

            newRow+= '</select></td>'+
            '<td><button id="remove_buton" type="button" class="btn btn-danger btn-sm">X</button></td>' + +
            '</tr>';

            $("#satinalmateklifDetay").append(newRow);
            i++;
        })


        $("body").on("click", "#remove_buton", function() {
        $(this).closest(".islem_field").remove();
        })

        $("body").on("change", ".stokid", function() {
            var itk = $(this).find(":selected").data("stokid");
            $(this).closest(".islem_field").find(".stokad").val(itk);
        })

        $("body").on("change", ".stokad", function() {
            var itk = $(this).find(":selected").data("stokad");
            $(this).closest(".islem_field").find(".stokid").val(itk);
        })

        $("body").on("change", "#satinalmateklifDetay input", function() {
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
