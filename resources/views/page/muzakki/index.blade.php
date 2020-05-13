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
                    {{-- <td><button type="button" class="btn btn-block bg-gradient-success btn-sm" data-toggle="modal" data-target="#modal-beras">Tambah Muzakki Beras</button></td> --}}
                    <td><a href="{{ route('muzakki.beras.create') }}" class="btn btn-block bg-gradient-info btn-sm modal-show" title="Tambah muzakki">Tambah Zakat Beras</a></td>
                    <td><a href="{{ route('muzakki.uang.create') }}" class="btn btn-block bg-gradient-success btn-sm modal-show" title="Tambah muzakki">Tambah Zakat Uang</a></td>
                </tr>
            </table>            
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    @include('page._modals')

    {{-- Muzzaki Beras --}}
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Daftar Zakat <b>Beras</b></h3>
        </div>
        <div class="card-body">
            <table id="datatableBeras" class="table table-bordered table-hover" style="width:100%">
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
        {{-- <h3 class="card-title text-right">Jumlah Beras Terkumpul : <b>{{number_format($jumlahBeras,1,',','.')}} Kg</b> <i>(Dari {{$jumlahMuzzakiBeras}} orang muzakki)</i></h3> --}}
        </div>
        <!-- /.card-footer-->
    </div>

    {{-- Muzzaki Uang --}}
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Daftar Zakat <b>Uang</b></h3>
        </div>
        <div class="card-body">
            <table id="datatableUang" class="table table-bordered table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>RT</th>
                        <th>Jumlah Uang</th>
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
        {{-- <h3 class="card-title text-right">Jumlah Uang Terkumpul : <b>Rp {{number_format($jumlahUang,2,',','.')}} </b> <i>(Dari {{$jumlahMuzzakiUang}} orang muzakki)</i></h3> --}}
        </div>
        <!-- /.card-footer-->
    </div>

</section>
@endsection

@push('script')
<script>    
    $(document).ready(function(){
        pTable=$('#datatableBeras').DataTable({
            language: {            
                url: '//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json'            
            },        
            responsive: true,
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: "{{ route('muzakki.beras.tabel') }}",
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
                    render: $.fn.dataTable.render.number( '.', ',', 1, '',' Kg' ),
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
    $(document).ready(function(){
        pTable=$('#datatableUang').DataTable({
            language: {            
                url: '//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json'            
            },        
            responsive: true,
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: "{{ route('muzakki.uang.tabel') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                // {data: 'id', name: 'id'},
                {data: 'nama', name: 'nama'},
                {data: 'alamat', name: 'alamat'},
                {data: 'rt', name: 'rt'},
                {data: 'jumlahUang', name: 'jumlahUang'},
                {data: 'keterangan', name: 'keterangan'},
                {data: 'aksi', name: 'aksi', searchable: false, sortable: false, orderable : false,}
            ],
            
            order: [[2, 'asc']],
            rowGroup: {
                startRender: function ( rows, group ) {
                    
    
                    return $('<tr/>')
                        .append( '<td colspan="7">RT 0'+group+'</td>' );
                },
                dataSrc: 'rt'
            },

            columnDefs: [
                { targets: [0,3], "width": "5%",
                    className: 'dt-center' 
                },
                { targets: [4], "width": "15%",
                    render: $.fn.dataTable.render.number( '.', ',', 2, 'Rp '),
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
    
@endpush