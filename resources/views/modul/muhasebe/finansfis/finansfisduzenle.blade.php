@extends('layouts.app')
@section('header')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}">
@endsection
@section('icerik')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Finans Fiş İşlemleri
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Finans Fiş Düzenle</h3>
                <div class="pull-right box-tools">
                    <a href="{{ route('muhasebe.finansfis') }}"> <button type="button" class="btn btn-success">
                          Finans Fişi Listesi</button></a>
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
                <form action="{{ route('muhasebe.finansfisUpdate',['id'=>$data[0]['id']]) }}" method="POST" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-6">
                        <label>Fiş Numarası</label>
                        <input type="text" class="form-control" name="fiFisNo"  value="{{$data[0]['fiFisNo']}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Firma Seçiniz</label>
                        <select name="fiFirmaId" class="form-control select2">
                            <option>Firma Seçiniz</option>
                            @foreach (\App\Models\User::all() as $k => $v)
                                <option @if($v["id"]==$data[0]["fiFirmaId"]) selected @endif value="{{ $v['id'] }}">
                                    {{ \App\Models\User::getPublicName($v['id']) }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Fiş Tipi</label>
                        <select name="fiFisTipKod" class="form-control select2">
                            <option>Fiş Tipi Seçiniz</option>
                            @foreach (\App\Models\Muhasebe\FisTip::all() as $k => $v)
                                <option @if($v["fisTipKod"]==$data[0]["fiFisTipKod"]) selected @endif value="{{ $v['fisTipKod'] }}">
                                    {{ \App\Models\Muhasebe\FisTip::getFisTipKod($v['id']) }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Fiş Tarihi</label>
                        <input type="date"  value="{{$data[0]['fiFisTarih']}}" class="form-control" name="fiFisTarih">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Açıklama</label>
                        <input type="text"  value="{{$data[0]['fiAciklama']}}" class="form-control" name="fiAciklama" >
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
                                    <td><select class="form-control islemtipkod" name="islem[{{$k}}][fiIslemTipKod]">
                                    <option value="0">İşlem Tipi Kodu</option>
                                    @foreach (\App\Models\Muhasebe\IslemTip::all() as $key => $value) 
                                        <option @if($value['id']==$v['fiIslemTipAd']) selected @endif  data-islemkod="{{$value['id']}}" value="{{$value['id']}}">
                                        {{$value['islemTipKod']}}  </option>
                                        @endforeach
                                    </select></td>
                                    <td><select class="form-control islemtipad" name="islem[{{$k}}][fiIslemTipAd]">
                                        <option value="0">İşlem Tip Adı</option>
                                        @foreach (\App\Models\Muhasebe\IslemTip::all() as $key => $value)
                                        <option @if($value['id']==$v['fiIslemTipAd']) selected @endif data-islemad={{$value["id"]}} value="{{$value['id']}}">  
                                            {{$value['islemTipAd']}}</option>
                                    @endforeach    
                                    </select></td>
                                    <td><select class="form-control muhasebead" name="islem[{{$k}}][fiMHA]">
                                        <option value="0">Muhasebe Hesap Adı</option>
                                        @foreach (\App\Models\Muhasebe\HesapKod::all() as $key => $value)
                                        <option @if($value['hesapAd']==$v['fiMHA']) selected @endif data-hesapad={{$value["hesapKod"]}} value="{{$value['hesapAd']}}">{{$value['hesapAd'] }} / {{$value['hesapKod'] }}</option>
                                        @endforeach
                                        </select></td>
                                    <td><select class="form-control muhasebekod" name="islem[{{$k}}][fiMHK]">
                                        <option value="0">Muhasebe Hesap Kodu</option>
                                        @foreach (\App\Models\Muhasebe\HesapKod::all() as $key => $value)
                                        <option @if($value['hesapKod']==$v['fiMHK']) selected @endif data-hesapkod={{$value["hesapAd"] }} value="{{$value['hesapKod']}}">{{$value['hesapKod']}} / {{$value['hesapAd'] }}</option>
                                        @endforeach
                                        </select></td>

                                            <td><input type"text" class="form-control" id="tutar"value="{{$v['fiTutar']}}" name="islem[{{$k}}][fiTutar]"> </td>
                                        
                                            <td><select class="form-control ba" id="ba" name="islem[{{$k}}][fiBA]">
                                                <option selected value="">B/A</option>
                                                <option @if($v['fiBA']=="Borç") selected @endif data-a="borc" value="Borç">Borç</option>
                                                <option @if($v['fiBA']=="Alacak") selected @endif data-a="alacak" value="Alacak">Alacak</option>
                                                </select></td>
                                                <td><button id="remove_buton" type="button" class="btn btn-danger btn-sm">X</button></td>
                                        
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <button type="button" id="addRowBtn" class="btn btn-danger">+</button>
                    </div>

                    <div class="box-footer pull-right box-tools">
                        <button type="submit" class="btn btn-success">Finans Fişi Güncelle</button>
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
            '<td><select class="form-control select2 islemtipkod" name="islem['+i+'][fiIslemTipKod]">' +
            '<option value="0">İşlem Tipi Kodu</option>';
            <?php foreach (\App\Models\Muhasebe\IslemTip::all() as $key => $value) { ?>
            newRow += '<option data-islemkod=<?php echo $value["id"] ?> value="<?php echo $value['id'] ?>"><?php echo $value['islemTipKod'] ?></option>';
            <?php } ?>
    
            newRow += '</select></td>' +
            '<td><select class="form-control select2 islemtipad" name="islem['+i+'][fiIslemTipAd]">' +
            '<option value="0">İşlem Tip Adı</option>';
            <?php foreach (\App\Models\Muhasebe\IslemTip::all() as $key => $value) { ?>
            newRow += '<option data-islemad=<?php echo $value["id"] ?> value="<?php echo $value['id'] ?>"><?php echo $value['islemTipAd'] ?></option>';
            <?php } ?>

            newRow += '</select></td>' +
            '<td><select class="form-control select2 muhasebead" name="islem['+i+'][fiMHA]">' +
            '<option value="0">Muhasebe Hesap Adı</option>';
            <?php foreach (\App\Models\Muhasebe\HesapKod::all() as $key => $value) { ?>
            newRow += '<option data-hesapad=<?php echo $value["hesapAd"] ?> value="<?php echo $value['hesapAd'] ?>"><?php echo $value['hesapAd'].' / '. $value['hesapKod'] ?></option>';
            <?php } ?>
            
            newRow += '</select></td>' +
            '<td><select class="form-control select2 muhasebekod" name="islem['+i+'][fiMHK]">' +
            '<option value="0">Muhasebe Hesap Kodu</option>';
            <?php foreach (\App\Models\Muhasebe\HesapKod::all() as $key => $value) { ?>
            newRow += '<option data-hesapkod=<?php echo $value["hesapKod"] ?> value="<?php echo $value['hesapKod'] ?>"><?php echo $value['hesapKod'].' / '.$value['hesapAd'] ?></option>';
            <?php } ?>


            newRow += '</select></td>' +
            '<td><input type"text" class="form-control" id="tutar" placeholder="Tutar" name="islem['+i+'][fiTutar]"> </td>';

            newRow += '<td><select class="form-control select2 ba" id="ba" name="islem['+i+'][fiBA]">' +
            '<option selected value="">B/A</option>'+
            '<option data-a="borc" value="Borç">Borç</option>'+
            '<option data-a="alacak" value="Alacak">Alacak</option>';

            // newRow += '</select></td>' +
            // '<td><input type"hidden" class="form-control" id="borc_tutar"  placeholder="Borç tutarı" name="islem['+i+'][miBorc]"> </td>';

            // newRow += '</select></td>' +
            // '<td><input type"hidden" class="form-control" id="alacak_tutar"  placeholder="Alacak tutarı" name="islem['+i+'][miAlacak]"> </td>';

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
