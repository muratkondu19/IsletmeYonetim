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
            Muhasebe Fiş İşlemleri
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Muhasebe Fiş Listesi</h3>
                <div class="pull-right box-tools">
                    <a href="{{ route('muhasebe.muhasebefisCreate') }}"> <button type="button" class="btn btn-danger btn-sm">
                            Yeni Muhasebe Fiş Ekle</button></a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Muhasebe Fiş Tarih</th>
                            <th>Muhasebe Fiş Numara</th>
                            <th>Firma</th>
                            <th>Muhasebe Fiş Tip</th>
                            <th>Açıklama</th>
                            <th>Düzenle / İncele</th>
                            <th>Sil</th>

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
        url: '{{route("muhasebe.muhasebefisData")}}',
        data: function(d) {
            d.startDate = $('#datepicker_from').val();
            d.endDate = $('#datepicker_to').val();
        }
    },
    columns: [{
            data: 'miFisTarih',
            name: 'miFisTarih'
        },
        {
            data: 'miFisNo',
            name: 'miFisNo'
        },
        {
            data: 'firma',
            name: 'firma'
        },
        {
            data: 'miFisTipKod',
            name: 'miFisTipKod'
        },
        {
            data: 'miAciklama',
            name: 'miAciklama'
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