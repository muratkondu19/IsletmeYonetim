@extends('layouts.app')
@section('header')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}">
@endsection
@section('icerik')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Satış Teklifinden Sipariş Oluşturma
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Teklifi Siparişe Dönüştür</h3>
                <div class="pull-right box-tools">
                    <a href="{{ route('satis.satisteklif') }}"> <button type="button" class="btn btn-success">
                            Satış Teklif Listesi</button></a>
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
                <form action="{{ route('satis.tekliftosatisUpdate',['id'=>$data[0]['id']]) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-6">
                        <label>Firma Seçiniz</label>
                        <select name="satisSiparisFirmaId" class="form-control select2">
                            <option>Firma Seçiniz</option>
                            @foreach (\App\Models\User::all() as $k => $v)
                                <option @if($v["id"]==$data[0]["satisTeklifFirmaId"]) selected @endif value="{{ $v['id'] }}">
                                    {{ \App\Models\User::getPublicName($v['id']) }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Sipariş Belge Numarası</label>
                        <input type="text" class="form-control" name="satisSiparisBelgeNo"  value="{{$data[0]['satisTeklifBelgeNo']}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Sipariş Tarihi</label>
                        <input type="date" value="{{ date('Y-m-d') }}" class="form-control" name="satisSiparisTarih">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Sipariş Hareket Kodu</label>
                        <select name="satisSiparisHareketKod" class="form-control select2" style="width: 100%">
                            <option value="0">Sipariş Hareket Kodu Seçiniz</option>
                            <option value="Satış Siparişi">Satış Siparişi</option>
                            <option value="İhracat Kayıtlı Satış Sipariş">İhracat Kayıtlı Satış Sipariş</option>
                            <option value="İhracat Satış Sipariş">İhracat Satış Sipariş</option>

                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Cari Kodu</label>
                    <select name="satisSiparisCariId" class="form-control select2">
                        <option>Cari Seçiniz</option>
                        @foreach (\App\Models\Muhasebe\Cari::all() as $k => $v)
                            <option @if($v["id"]==$data[0]["satisTeklifCariId"]) selected @endif value="{{ $v['id'] }}">
                                {{ \App\Models\Muhasebe\Cari::getCariAd($v['id']) }} </option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Açıklama</label>
                        <input type="text" class="form-control" name="satisSiparisAciklama" value="{{$data[0]['satisTeklifAciklama']}}">
                    </div>
                    
                    <div class="form-group col-md-12">
                        <table id="satissiparisDetay" class="table table-striped">
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
                                    <td><select class="form-control"  name="islem[{{$k}}][satisSiparisTip]">
                                        <option selected value="">Tip</option>
                                        <option @if($v['satisTeklifTip']=="Stok") selected @endif value="Stok">Stok</option>
                                        <option @if($v['satisTeklifTip']=="Hizmet") selected @endif value="Hizmet">Hizmet</option></select>
                                    </td>
                                    <td><select class="form-control" name="islem[{{$k}}][satisSiparisDepoId]">
                                        <option value="0">Depo Seçiniz</option>
                                        @foreach (\App\Models\Envanter\Depo::all() as $key => $value)
                                        <option @if($value['id']==$v['satisTeklifDepoId']) selected @endif  value="{{$value['id']}}">{{$value['depoAd']}}</option>
                                        @endforeach </select>
                                    </td>
                                    <td><select class="form-control stokid" name="islem[{{$k}}][satisSiparisStokId]">
                                        <option value="0">Stok Kodu</option>
                                        @foreach (\App\Models\Envanter\StokKart::all() as $key => $value)
                                        <option @if($value['id']==$v['satisTeklifStokId']) selected @endif data-stokid={{$value["id"]}} value="{{$value['id']}}">{{$value['stokKod']}} / {{$value['stokAd']}}</option>
                                        @endforeach </select>
                                    </td>
                                    <td><select class="form-control stokad" name="islem[{{$k}}][satisSiparisStokAd]">
                                        <option value="0">Stok Kodu</option>
                                        @foreach (\App\Models\Envanter\StokKart::all() as $key => $value)
                                        <option @if($value['id']==$v['satisTeklifStokAd']) selected @endif data-stokad={{$value["id"]}} value="{{$value['id']}}">{{$value['stokAd']}} / {{$value['stokKod']}}</option>
                                        @endforeach </select>
                                    </td>
                                    <td><select class="form-control"  name="islem[{{$k}}][satisSiparisBirim]">
                                        <option selected value="">Birim Seçiniz</option>
                                        <option @if($v['satisTeklifBirim']=="Adet") selected @endif value="Adet">Adet</option>
                                        <option @if($v['satisTeklifBirim']=="Litre") selected @endif value="Litre">Litre</option>
                                        <option @if($v['satisTeklifBirim']=="KG") selected @endif value="KG">KG</option></select>
                                    </td>
                                    <td><input type"text" class="form-control" id="miktar"value="{{$v['satisTeklifMiktar']}}" name="islem[{{$k}}][satisSiparisMiktar]"> </td>
                                    <td><input type"text" class="form-control" id="birimfiyat"value="{{$v['satisTeklifBirimFiyat']}}" name="islem[{{$k}}][satisSiparisBirimFiyat]"> </td>
                                    <td><input type"text" class="form-control" id="toplamtutar"value="{{$v['satisTeklifToplamTutar']}}" name="islem[{{$k}}][satisSiparisToplamTutar]"> </td>
                                    <td><button id="remove_buton" type="button" class="btn btn-danger btn-sm">X</button></td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <button type="button" id="addRowBtn" class="btn btn-danger">+</button>
                    </div>

                    <div class="box-footer pull-right box-tools">
                        <button type="submit" class="btn btn-success">Satış Teklifinden Sipariş Oluştur</button>
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
            '<td><select class="form-control select2"  name="islem['+i+'][satisSiparisTip]">' +
            '<option selected value="">Tip</option>'+
            '<option value="Stok">Stok</option>'+
            '<option value="Hizmet">Hizmet</option>'
    
            newRow += '</select></td>' +
            '<td><select class="form-control select2" name="islem['+i+'][satisSiparisDepoId]">' +
            '<option value="0">Depo Seçiniz</option>';
            <?php foreach (\App\Models\Envanter\Depo::all() as $key => $value) { ?>
            newRow += '<option data-islemad=<?php echo $value["id"] ?> value="<?php echo $value['id'] ?>"><?php echo $value['depoAd'] ?></option>';
            <?php } ?>
            
            newRow += '</select></td>' +
            '<td><select class="form-control select2 stokid" name="islem['+i+'][satisSiparisStokId]">' +
            '<option value="0">Stok Kodu</option>';
            <?php foreach (\App\Models\Envanter\StokKart::all() as $key => $value) { ?>
            newRow += '<option data-stokid=<?php echo $value["id"] ?> value="<?php echo $value['id'] ?>"><?php echo $value['stokKod'].' / '.$value['stokAd'] ?></option>';
            <?php } ?>

            newRow += '</select></td>' +
            '<td><select class="form-control select2 stokad" name="islem['+i+'][satisSiparisStokAd]">' +
            '<option value="0">Stok Adı</option>';
            <?php foreach (\App\Models\Envanter\StokKart::all() as $key => $value) { ?>
            newRow += '<option data-stokad=<?php echo $value["id"] ?> value="<?php echo $value['id'] ?>"><?php echo $value['stokAd'].' / '.$value['stokKod'] ?></option>';
            <?php } ?>
            newRow += '</select></td><td><select class="form-control select2" name="islem['+i+'][satisSiparisBirim]">' +
            '<option selected value="">Birim Seçiniz</option>'+
            '<option value="Adet">Adet</option>'+
            '<option value="Litre">Litre</option>'+
            '<option value="KG">KG</option>'

            newRow += '</select></td>' +
            '<td><input type"text" class="form-control" id="miktar"  placeholder="Miktar" name="islem['+i+'][satisSiparisMiktar]"> </td>';


            newRow += '</select></td>' +
            '<td><input type"hidden" class="form-control" id="birimfiyat"  placeholder="Birim Fiyatı" name="islem['+i+'][satisSiparisBirimFiyat]"> </td>';

            newRow += '</select></td>' +
            '<td><input type"hidden" class="form-control"  id="toplamtutar"  placeholder="Toplam Tutar" name="islem['+i+'][satisSiparisToplamTutar]"> </td>';

            newRow+= '</select></td>'+
            '<td><button id="remove_buton" type="button" class="btn btn-danger btn-sm">X</button></td>' + +
            '</tr>';

            $("#satissiparisDetay").append(newRow);
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

        $("body").on("change", "#satissiparisDetay input", function() {
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
