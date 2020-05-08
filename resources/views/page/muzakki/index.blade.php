{{-- Mengambil template dari master --}}
@extends('template.master')

{{-- Memberi nama judul pada tab browser --}}
@section('title', 'Muzakki Zakat')

{{-- Memberi nama judul header content --}}
@section('header', 'Muzakki Zakat (Pemberi Zakat)')

{{-- isi content  --}}
@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
        {{-- <div class="card-header">
            <h3 class="card-title">Tambah Muzakki Zakat</h3>
        </div> --}}
        <div class="card-body">
            <table class="table table-bordered text-center">
                <tr>
                    <td>Zakat Berupa Kilogram <b>Beras</b></td>
                    <td>Zakat Berupa Sejumlah <b>Uang</b></td>
                </tr>
                <tr>
                    <td><button type="button" class="btn btn-block bg-gradient-success btn-sm" data-toggle="modal" data-target="#modal-tambah-beras">Tambah Muzakki Beras</button></td>
                    <td><button type="button" class="btn btn-block bg-gradient-success btn-sm">Success</button></td>
                </tr>
            </table>            
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    @include('page.muzakki._modals')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Muzakki</h3>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-striped table-bordered table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>RT</th>
                        <th>Jumlah Beras</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>  
                <tbody>
                </tbody>          
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        </div>
        <!-- /.card-footer-->
    </div>

</section>
@endsection

@push('script')
<script>    
    $(document).ready(function(){
        pTable=$('#datatable').DataTable({
            language: {            
                url: '//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json'            
            },        
            responsive: true,
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: "{{ route('muzakki.tabel') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                // {data: 'id', name: 'id'},
                {data: 'nama', name: 'nama'},
                {data: 'alamat', name: 'alamat'},
                {data: 'rt', name: 'rt'},
                {data: 'jumlahBeras', name: 'jumlahBeras'},
                {data: 'keterangan', name: 'keterangan'},
                {data: 'aksi', name: 'aksi', searchable: false, sortable: false, orderable : false,}
            ],
            columnDefs: [
                { targets: [0,3], "width": "5%",
                    className: 'dt-center' 
                },
                { targets: [4], "width": "5%",
                    render: $.fn.dataTable.render.number( '.', ',', 0, '',' Kg' ),
                    className: 'dt-center' 
                },
                { targets: [5],  
                    className: 'dt-center' 
                },
                { targets: [1,2],  
                    className: 'dt-head-center' 
                },
                { targets: 6, "width": "10%", 
                    className: 'dt-center' 
                }
            ]
        });
        
        //Untuk membuat select row
        $('#datatable tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                pTable.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        } );
    
        $('#button').click( function () {
            pTable.row('.selected').remove().draw( false );
        } );
    
    });
</script>
<script>
    $(document).on('ajaxComplete ready', function () {
        $('.modalMd').off('click').on('click', function () {
            $('#modalMdContent').load($(this).attr('value'));
            $('#modalMdTitle').html($(this).attr('title'));
        });
    });
</script>
    
@endpush