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
                <h3 class="box-title">Muhasebe Fiş Düzenle</h3>
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
                <form action="{{ route('muhasebe.muhasebefisUpdate',['id'=>$data[0]['id']]) }}" method="POST" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-6">
                        <label>Fiş Numarası</label>
                        <input type="text" class="form-control" name="miFisNo"  value="{{$data[0]['miFisNo']}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Firma Seçiniz</label>
                        <select name="miFirmaId" class="form-control select2">
                            <option>Firma Seçiniz</option>
                            @foreach (\App\Models\User::all() as $k => $v)
                                <option @if($v["id"]==$data[0]["miFirmaId"]) selected @endif value="{{ $v['id'] }}">
                                    {{ \App\Models\User::getPublicName($v['id']) }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Muhasebe Fiş Tipi</label>
                        <select name="miFisTipKod" class="form-control select2" style="width: 100%">
                            <option value="0">Fiş Tipi Seçiniz</option>
                            <option @if($data[0]['miFisTipKod']=="Mahsup") selected @endif value="Mahsup">Mahsup</option>
                            <option  @if($data[0]['miFisTipKod']=="Tediye") selected @endif value="Tediye">Tediye</option>
                            <option  @if($data[0]['miFisTipKod']=="Tahsil") selected @endif value="Tahsil">Tahsil</option>
                            <option  @if($data[0]['miFisTipKod']=="Açılış") selected @endif value="Açılış">Açılış</option>
                            <option  @if($data[0]['miFisTipKod']=="Kapanış") selected @endif value="Kapanış">Kapanış</option>
                            <option  @if($data[0]['miFisTipKod']=="Yansıtma") selected @endif value="Yansıtma">Yansıtma</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Fiş Tarihi</label>
                        <input type="date"  value="{{$data[0]['miFisTarih']}}" class="form-control" name="miFisTarih">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Açıklama</label>
                        <input type="text"  value="{{$data[0]['miAciklama']}}" class="form-control" name="miAciklama" >
                    </div>

                    <div class="form-group col-md-12">
                        <table id="muhasebefisFirma"  class="table table-striped">
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
                                @foreach($dataIslem as $k=>$v)
                                <tr class="islem_field">
                                    <td><select class="form-control  islemtipkod" name="islem[{{$k}}][miIslemTipKod]">
                                    <option value="0">İşlem Tipi Kodu</option>
                                    @foreach (\App\Models\Muhasebe\IslemTip::all() as $key => $value) 
                                        <option @if($value['id']==$v['miIslemTipAd']) selected @endif  data-islemkod="{{$value['id']}}" value="{{$value['id']}}">
                                        {{$value['islemTipKod']}} /  {{$value['islemTipAd']}} </option>
                                        @endforeach
                                    </select></td>
                                    <td><select class="form-control  islemtipad" name="islem[{{$k}}][miIslemTipAd]">
                                        <option value="0">İşlem Tip Adı</option>
                                        @foreach (\App\Models\Muhasebe\IslemTip::all() as $key => $value)
                                        <option @if($value['id']==$v['miIslemTipAd']) selected @endif data-islemad={{$value["id"]}} value="{{$value['id']}}">  
                                            {{$value['islemTipAd']}} /   {{$value['islemTipKod']}}</option>
                                    @endforeach    
                                    </select></td>
                                    <td><select class="form-control muhasebead" name="islem[{{$k}}][miMHA]">
                                        <option value="0">Muhasebe Hesap Adı</option>
                                        @foreach (\App\Models\Muhasebe\HesapKod::all() as $key => $value)
                                        <option @if($value['hesapAd']==$v['miMHA']) selected @endif data-hesapad={{$value["hesapKod"]}} value="{{$value['hesapAd']}}">{{$value['hesapAd'] }} / {{$value['hesapKod']}}</option>
                                        @endforeach
                                        </select></td>
                                    <td><select class="form-control muhasebekod" name="islem[{{$k}}][miMHK]">
                                        <option value="0">Muhasebe Hesap Kodu</option>
                                        @foreach (\App\Models\Muhasebe\HesapKod::all() as $key => $value)
                                        <option @if($value['hesapKod']==$v['miMHK']) selected @endif data-hesapkod={{$value["hesapAd"] }} value="{{$value['hesapKod']}}">{{$value['hesapKod']}} / {{$value['hesapAd'] }}</option>
                                        @endforeach
                                        </select></td>

                                   
                                            <td><input type"text" class="form-control" id="tutar"value="{{$v['miTutar']}}" name="islem[{{$k}}][miTutar]"> </td>
                                        
                                            <td><select class="form-control ba" id="ba" name="islem[{{$k}}][miBA]">
                                                <option selected value="">B/A</option>
                                                <option @if($v['miBA']=="Borç") selected @endif data-a="borc" value="Borç">Borç</option>
                                                <option @if($v['miBA']=="Alacak") selected @endif data-a="alacak" value="Alacak">Alacak</option>
                                                </select></td>
                                                <td><button id="remove_buton" type="button" class="btn btn-danger btn-sm">X</button></td>
                                        
                                </tr>
                                @endforeach
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
        })
        var i = $('.islem_field').length;
        $("#addRowBtn").click(function() {
            var newRow =
            '<tr class="islem_field">' +
            '<td><select class="form-control islemtipkod" name="islem['+i+'][miIslemTipKod]">' +
            '<option value="0">İşlem Tipi Kodu</option>';
            <?php foreach (\App\Models\Muhasebe\IslemTip::all() as $key => $value) { ?>
            newRow += '<option data-islemkod=<?php echo $value["id"] ?> value="<?php echo $value['id'] ?>"><?php echo $value['islemTipKod'].' / '.$value['islemTipAd']  ?></option>';
            <?php } ?>
    
            newRow += '</select></td>' +
            '<td><select class="form-control islemtipad" name="islem['+i+'][miIslemTipAd]">' +
            '<option value="0">İşlem Tip Adı</option>';
            <?php foreach (\App\Models\Muhasebe\IslemTip::all() as $key => $value) { ?>
            newRow += '<option data-islemad=<?php echo $value["id"] ?> value="<?php echo $value['id'] ?>"><?php echo $value['islemTipAd'].' / '.$value['islemTipKod'] ?></option>';
            <?php } ?>
            
            newRow += '</select></td>' +
            '<td><select class="form-control muhasebead1" name="islem['+i+'][miMHA]">' +
            '<option value="0">Muhasebe Hesap Adı</option>';
            <?php foreach (\App\Models\Muhasebe\HesapKod::all() as $key => $value) { ?>
            newRow += '<option data-hesapad1=<?php echo $value["hesapKod"] ?> value="<?php echo $value['hesapAd'] ?>"><?php echo $value['hesapAd'].' / '.$value['hesapKod'] ?></option>';
            <?php } ?>
            
            newRow += '</select></td>' +
            '<td><select class="form-control muhasebekod1" name="islem['+i+'][miMHK]">' +
            '<option value="0">Muhasebe Hesap Kodu</option>';
            <?php foreach (\App\Models\Muhasebe\HesapKod::all() as $key => $value) { ?>
            newRow += '<option data-hesapkod1=<?php echo $value["hesapAd"] ?> value="<?php echo $value['hesapKod'] ?>"><?php echo $value['hesapKod'].' / '.$value['hesapAd'] ?></option>';
            <?php } ?>


            newRow += '</select></td>' +
            '<td><input type"text" class="form-control" id="tutar" placeholder="Tutar" name="islem['+i+'][miTutar]"> </td>';

            newRow += '<td><select class="form-control select2 ba" id="ba" name="islem['+i+'][miBA]">' +
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
            var itk = $(this).find(":selected").data("islemkod");
            $(this).closest(".islem_field").find(".islemtipad").val(itk);
        })

        $("body").on("change", ".islemtipad", function() {
            var ita = $(this).find(":selected").data("islemad");
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

        $("body").on("change", ".muhasebekod1", function() {
            var mhk1 = $(this).find(":selected").data("hesapkod1");
            $(this).closest(".islem_field").find(".muhasebead1").val(mhk1)
        })

        $("body").on("change", ".muhasebead1", function() {
            var mha1 = $(this).find(":selected").data("hesapad1");
            $(this).closest(".islem_field").find(".muhasebekod1").val(mha1)
        })

        $("body").on("click", "#remove_buton", function() {
        $(this).closest(".islem_field").remove();
        })


       

        $("body").on("change", "#muhasebefisFirma input", function() {
            var $this = $(this);
            if ($this.is("#tutar")) {
                var tutar = parseFloat($this.closest("tr").find("#tutar").val());
                tutar = tutar.toFixed(2);
                // $("body").on("change", ".ba", function() {
                //     var optval = $this.closest("tr").find("#ba").val();
                //     if(optval=="Borç"){
                //         $this.closest("tr").find("#borc_tutar").val(tutar);
                //         $this.closest("tr").find("#borc_tutar").html(tutar);
                //     }else if(optval=="Alacak"){
                //         $this.closest("tr").find("#alacak_tutar").val(tutar);
                //         $this.closest("tr").find("#alacak_tutar").html(tutar);
                //     } 
                // });
            }
        });
      

        
    </script>
@endsection
