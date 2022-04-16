@extends('layouts.app')
@section('header')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}">
@endsection
@section('icerik')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            İş Merkezi İnceleme Düzenleme
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">İş Merkezi İnceleme Düzenleme</h3>
                <div class="pull-right box-tools">
                    <a href="{{ route('urun.ismerkezi') }}"> <button type="button" class="btn btn-success">
                           İş Merkezi Listesi</button></a>
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
                <form action="{{ route('urun.ismerkeziUpdate',['id'=>$data[0]['id']]) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-6">
                        <label>İş Merkezi Kodu</label>
                        <input type="text" class="form-control" name="ismerkeziKod"  value=" {{$data[0]['ismerkeziKod']}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>İş Merkezi Adı</label>
                        <input type="text" class="form-control" name="ismerkeziAd"  value=" {{$data[0]['ismerkeziAd']}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>İş Merkeziya Bağlı Firma</label>
                        <select name="ismerkeziFirmaId" class="form-control select2">
                            <option>Firma Seçiniz</option>
                            @foreach (\App\Models\User::all() as $k => $v)
                                <option @if($v["id"]==$data[0]["ismerkeziFirmaId"]) selected @endif value="{{ $v['id'] }}">
                                    {{ \App\Models\User::getPublicName($v['id']) }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>İş Merkezi Açıklama</label>
                        <input type="text" class="form-control" name="ismerkeziAciklama"
                        value=" {{$data[0]['ismerkeziAciklama']}}">
                    </div>
                    
                    <div class="form-group col-md-12">
                        <h4>İş Merkezi Operasyonları</h4>
                        <table id="ismerkeziOperasyon" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Operasyon Adı</th>
                                    <th scope="col">Operasyon Kodu</th>
                                    <th scope="col">X</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataIslem as $k => $v)
                                <tr class="islem_field">
                                    <td><select class="form-control operasyonad" name="operasyon[{{ $k }}][ismerkeziOperasyonAd]">
                                        <option value="0">Operasyon Adı</option>
                                        @foreach (\App\Models\Urun\Operasyon::all() as $key => $value)
                                        <option @if($value['operasyonAd']==$v['ismerkeziOperasyonAd']) selected @endif data-operasyonad={{ $value['operasyonKod'] }} value="{{ $value['operasyonAd'] }}">{{ $value['operasyonAd'] }}</option> 
                                        @endforeach </select>
                                </td>
                            
                                    <td><select class="form-control operasyonkod"  name="operasyon[{{ $k }}][ismerkeziOperasyonKod]">
                                            <option value="0">Operasyon Kodu</option>
                                            @foreach (\App\Models\Urun\Operasyon::all() as $key => $value)
                                            <option @if($value['operasyonKod']==$v['ismerkeziOperasyonKod']) selected @endif data-operasyonkod={{ $value['operasyonAd'] }}value="{{ $value['operasyonKod'] }}">{{ $value['operasyonKod'] }}</option>
                                            @endforeach </select>
                                    </td>
                              
                                 
                            
                                    <td><button id="remove_buton" type="button" class="btn btn-danger btn-sm">X</button></td>
                                </tr>
                            @endforeach
                            
                            </tbody>
                        </table>
                        <button type="button" id="addRowBtn" class="btn btn-success">+</button>
                    </div>
                    <div class="box-footer pull-right box-tools">
                        <button type="submit" class="btn btn-primary">Bİş Merkezini Güncelle</button>
                    </div>
                </form>
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
        var i = $('.islem_field').length;
        $("#addRowBtn").click(function() {
            var newRow =
            '<tr class="islem_field">' +
                '<td><select class="form-control select2 operasyonad" name="operasyon['+i+'][ismerkeziOperasyonAd]">' +
            '<option value="0">Operasyon Adı</option>';
            <?php foreach (\App\Models\Urun\Operasyon::all() as $key => $value) { ?>
            newRow += '<option data-operasyonad=<?php echo $value["operasyonKod"] ?> value="<?php echo $value['operasyonAd'] ?>"><?php echo $value['operasyonAd'] ?></option>';
            <?php } ?>
         
            newRow += '</select></td>' +
            '<td><select class="form-control select2 operasyonkod" name="operasyon['+i+'][ismerkeziOperasyonKod]">' +
            '<option value="0">Operasyon Kodu</option>';
            <?php foreach (\App\Models\Urun\Operasyon::all() as $key => $value) { ?>
            newRow += '<option data-operasyonkod=<?php echo $value["operasyonAd"] ?> value="<?php echo $value['operasyonKod'] ?>"><?php echo $value['operasyonKod'] ?></option>';
            <?php } ?>
            
         
        


            newRow+= '</select></td>'+
            '<td><button id="remove_buton" type="button" class="btn btn-danger btn-sm">X</button></td>' + +
            '</tr>';

            $("#ismerkeziOperasyon").append(newRow);
            i++;
        })

        var i2 = $('.islem_field2').length;
        $("#addRowBtn2").click(function() {
            var newRow =
            '<tr class="islem_field2">' +
            '<td><select class="form-control select2 islemtipad" name="islem['+i+'][miIslemTipAd]">' +
            '<option value="0">İşlem Tip Adı</option>';
            <?php foreach (\App\Models\Muhasebe\IslemTip::all() as $key => $value) { ?>
            newRow += '<option data-islemad=<?php echo $value["id"] ?> value="<?php echo $value['id'] ?>"><?php echo $value['islemTipAd'] ?></option>';
            <?php } ?>
            
            newRow += '</select></td>' +
            '<td><select class="form-control select2 muhasebekod" name="islem['+i+'][miMHK]">' +
            '<option value="0">Muhasebe Hesap Kodu</option>';
            <?php foreach (\App\Models\Muhasebe\HesapKod::all() as $key => $value) { ?>
            newRow += '<option data-hesapkod=<?php echo $value["id"] ?> value="<?php echo $value['id'] ?>"><?php echo $value['hesapKod'] ?></option>';
            <?php } ?>


            newRow+= '</select></td>'+
            '<td><button id="remove_buton2" type="button" class="btn btn-danger btn-sm">X</button></td>' + +
            '</tr>';

            $("#ismerkeziIstasyon").append(newRow);
            i++;
        })

        $("body").on("click", "#remove_buton", function() {
        $(this).closest(".islem_field").remove();
        })

        $("body").on("click", "#remove_buton2", function() {
        $(this).closest(".islem_field2").remove();
        })

        $("body").on("change", ".operasyonad", function() {
            var oa = $(this).find(":selected").data("operasyonad");
            $(this).closest(".islem_field").find(".operasyonkod").val(oa)
        })


        $("body").on("change", ".operasyonkod", function() {
            var ok = $(this).find(":selected").data("operasyonkod");
            $(this).closest(".islem_field").find(".operasyonad").val(ok)
        })


    </script>
@endsection
