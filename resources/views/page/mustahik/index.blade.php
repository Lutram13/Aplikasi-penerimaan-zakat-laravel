{{-- Mengambil template dari master --}}
@extends('template.master')

{{-- Memberi nama judul pada tab browser --}}
@section('title', 'Mustahik Zakat')

{{-- Memberi nama judul header content --}}
@section('header', 'Mustahik Zakat')

{{-- isi content  --}}
@section('content')

<section class="content">
    <!-- general form elements -->
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Tambah data Mustahik </h3>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Golongan</th>
                                <th>Penjelasan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>Fakir</td>
                                <td>Orang yang tidak memiliki harta</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Miskin</td>
                                <td>Orang yang penghasilannya tidak mencukupi</td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Gharim </td>
                                <td>Orang yang memiliki banyak hutang</td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Riqab</td>
                                <td>Hamba sahaya atau budak</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Golongan</th>
                                <th>Penjelasan</th>
                            </tr>
                        </thead>
                        <tbody>                                    
                            <tr>
                                <td>5.</td>
                                <td>Fisabilillah</td>
                                <td>Pejuang di jalan Allah</td>
                            </tr>
                            <tr>
                                <td>6.</td>
                                <td>Mualaf</td>
                                <td>Orang yang baru masuk Islam</td>
                            </tr>
                            <tr>
                                <td>7.</td>
                                <td>Ibnu Sabil</td>
                                <td>Musyafir dan para pelajar perantauan</td>
                            </tr>
                            <tr>
                                <td>8.</td>
                                <td>Amil zakat</td>
                                <td>Penerima dan pengelola dana zakat</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>                    
        </div>                
        <!-- /.card-body -->
        <div class="card-footer">
            <button href="{{ route('mustahik.create') }}" type="submit" class="btn btn-primary btn-sm modal-show" title="Tambah Mustahik" >Tambah Mustahik</button>
        </div>
    </div>
    
    @include('page._modals')   

    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Daftar <b>Mustahik</b></h3>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-striped table-bordered table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Golongan</th>
                        <th>Alamat</th>
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

</section>


@endsection

{{-- isi javascript --}}
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
            ajax: "{{ route('mustahik.tabel') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                // {data: 'id', name: 'id'},
                {data: 'nama', name: 'nama'},
                {data: 'golongan', name: 'golongan'},
                {data: 'alamat', name: 'alamat'},
                {data: 'keterangan', name: 'keterangan'},
                {data: 'aksi', name: 'aksi', searchable: false, sortable: false, orderable : false,}
            ],

            order: [[2, 'asc']],
            rowGroup: {
                dataSrc: 'golongan'
            },

            columnDefs: [
                { targets: [0,], "width": "5%",
                    className: 'dt-center' 
                },
                { targets: [1,2,3,4],  
                    className: 'dt-head-center' 
                },
                { targets: 5, "width": "10%", 
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