@extends('layouts.app')
@section('header')
    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('icerik')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
         Üretim Giriş İşlemleri
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Üretim Giriş Listesi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Firma Adı</th>
                            <th>İş Emri Kodu</th>
                            <th>Stok Kodu</th>
                            <th>Depo Kodu</th>
                            <th>Miktar</th>
                            <th>Başlangıç Tarihi</th>
                            <th>Bitiş Tarihi</th>
                            <th>Başlangıç Saati</th>
                            <th>Bitiş Saati</th>
                            <th>Düzenle / İncele</th>
                            <th>Sil </th>
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
            'X-CSRF-TOKEN': '{{csrf_token()}}'
        },
        url: '{{route("urun.uretimgirisData")}}',
        data: function(d) {
            d.startDate = $('#datepicker_from').val();
            d.endDate = $('#datepicker_to').val();
        }
    },
    columns: [{
            data: 'firma',
            name: 'firma'
        },
        {
            data: 'uretimgirisIsEmriKod',
            name: 'uretimgirisIsEmriKod'
        },
        {
            data: 'uretimgirisStokKod',
            name: 'uretimgirisStokKod'
        },
        {
            data: 'uretimgirisDepoKod',
            name: 'uretimgirisDepoKod'
        },
        {
            data: 'uretimgirisMiktar',
            name: 'uretimgirisMiktar'
        },
  
        {
            data: 'uretimgirisBaslangıcTarih',
            name: 'uretimgirisBaslangıcTarih'
        },
        {
            data: 'uretimgirisBitisTarih',
            name: 'uretimgirisBitisTarih'
        },
        {
            data: 'uretimgirisBaslangicSaat',
            name: 'uretimgirisBaslangicSaat'
        },
        {
            data: 'uretimgirisBitisSaat',
            name: 'uretimgirisBitisSaat'
        },
        {
            data: 'edit',
            name: 'edit',
            orderable: false,
            searchable: false
        },
        {
            data: 'delete',
            name: 'delete',
            orderable: false,
            searchable: false
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