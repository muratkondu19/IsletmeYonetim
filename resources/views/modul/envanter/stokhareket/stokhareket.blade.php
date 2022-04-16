@extends('layouts.app')
@section('header')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}">
@endsection
@section('icerik')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Stok Hareket
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>{{\App\Models\Envanter\StokHareket::getStokCount()}}</h3>
    
                  <p>Kayıtlı Stok Kartları</p>
                </div>
                <div class="icon">
                    <i class="fa fa-archive" aria-hidden="true"></i>
                </div>
                <a href="#" class="small-box-footer"></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{\App\Models\Envanter\StokHareket::getDepoCount()}}<sup style="font-size: 20px"></sup></h3>
    
                  <p>Kayıtlı Depolar</p>
                </div>
                <div class="icon">
                    <i class="fa fa-industry" aria-hidden="true"></i>
                </div>
                <a href="#" class="small-box-footer"></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{\App\Models\Envanter\StokHareket::getToplamÇıkı()}} ₺</h3>
    
                  <p>Toplam Çıktı Tutarı</p>
                </div>
                <div class="icon">
                    <i class="fa fa-minus" aria-hidden="true"></i>
                </div>
                <a href="#" class="small-box-footer"></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>{{\App\Models\Envanter\StokHareket::getToplamGirdi()}} ₺</h3>
    
                  <p>Toplam Girdi Tutarı</p>
                </div>
                <div class="icon">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </div>
                <a href="#" class="small-box-footer"></a>
              </div>
            </div>
            <!-- ./col -->
          </div>

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Stok İzleme</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Tip</th>
                            <th>Ad</th>
                            <th>Depo</th>
                            <th>Birim</th>
                            <th>Miktar</th>
                            <th>Birim Fiyat</th>
                            <th>Toplam Tutar</th>
                            <th>Hareket Tipi</th>
                            <th>Hareket Tarihi</th>

                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </section>
    <!-- /.content -->

@endsection
@section('footer')
    <script src="{{ asset('backend/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- DataTables -->

    <script src="{{ asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function() {


            let table = $('#example').DataTable({
                lengthMenu: [
                    [25, 100, -1],
                    [25, 100, "All"]
                ],
                /*
                dom: 'Blfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                */
                processing: true,
                serverSide: true,
                ajax: {
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: '{{ route("envanter.stokhareketData") }}',
                    data: function(d) {
                        d.startDate = $('#datepicker_from').val();
                        d.endDate = $('#datepicker_to').val();
                    }
                },
                columns: [{
                        data: 'stokHareketTip',
                        name: 'stokHareketTip'
                    },
                    {
                        data: 'stok',
                        name: 'stok'
                    },
                    {
                        data: 'depo',
                        name: 'depo'
                    },
                    {
                        data: 'stokHareketBirim',
                        name: 'stokHareketBirim'
                    },
                    {
                        data: 'stokHareketMiktar',
                        name: 'stokHareketMiktar'
                    },
                    {
                        data: 'stokHareketBirimFiyat',
                        name: 'stokHareketBirimFiyat'
                    },
                    {
                        data: 'stokHareketToplamTutar',
                        name: 'stokHareketToplamTutar'
                    },
                    {
                        data: 'durum',
                        name: 'durum'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    }

                ]
            });
            jQuery.fn.DataTable.ext.type.search.string = function(data) {
                var testd = !data ?
                    '' :
                    typeof data === 'string' ?
                    data
                    .replace(/i/g, 'İ')
                    .replace(/ı/g, 'I') :
                    data;
                return testd;
            };
            $('#example_filter input').keyup(function() {
                table
                    .search(
                        jQuery.fn.DataTable.ext.type.search.string(this.value)
                    )
                    .draw();
            });


        });

    </script>
@endsection
