{{-- Mengambil template dari master --}}
@extends('template.master')

{{-- Memberi nama judul pada tab browser --}}
@section('title', 'Penghitungan Zakat')

{{-- Memberi nama judul header content --}}
@section('header', 'Penghitungan Zakat')

{{-- isi content  --}}
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box bg-info">
                <span class="info-box-icon"><i class="fas fa-balance-scale"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><b>Zakat Beras</b></span>
                    <span class="info-box-text">Tersisa Beras <b id='sisa_Beras'>0</b> Kg dari Jumlah Total <b id='jum'>{{$jumlahBeras}} </b>Kg</span>

                    <div class="progress">
                        <div class="progress-bar" id="progres_Beras" style="width: 100%"></div>
                    </div>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box bg-success">
                <span class="info-box-icon"><i class="fas fa-dollar-sign"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><b>Zakat Uang</b></span>
                    <span class="info-box-text">Tersisa Uang Rp <b id='sisa_Uang'>0</b> dari Jumlah Total Rp <b id='jum'>{{number_format($jumlahUang, 0, ',', '.')}} </b></span>                    

                    <div class="progress">
                        <div class="progress-bar" id="progres_Uang" style="width: 100%"></div>
                    </div>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->        
    </div>
    <!-- /.row -->
<p id="demo"></p>
    <!-- Default box -->
    @foreach ($info_mustahik as $mustahik)   
        <div class="card collapsed-card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-2">
                        <b>{{$mustahik['nama']}}</b>
                        <br><i>Sejumlah {{$mustahik['jumlah']}} Orang</i>
                    </div>                    
                    <div class="col-md-10">
                        <table class="table table-sm">
                            <tr>
                                <td style="width:25%">Jumlah <b>Beras</b> Perorang </td>
                                <td style="width:25%">
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="beras_{{$mustahik['nama']}}" placeholder="0" onkeyup = cariBeras()>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Kg</span>
                                        </div>
                                    </div>
                                </td>
                                <td style="width:5%">X</td>
                                <td><b id="orang_{{$mustahik['nama']}}">{{$mustahik['jumlah']}}</b> orang</td>
                                <td style="width:5%"> = </td>
                                <td style="width:20%"><b id="hasilBeras_{{$mustahik['nama']}}">0</b> Kg</td>
                            </tr>
                            <tr>
                                <td>Jumlah <b>Uang</b> Perorang </td>
                                <td>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="number" class="form-control" id="uang_{{$mustahik['nama']}}" placeholder="0" onkeyup = cariUang()>
                                    </div>
                                </td>
                                <td>X</td>
                                <td><b>{{$mustahik['jumlah']}}</b> orang</td>
                                <td> = </td>
                                <td>Rp <b id="hasilUang_{{$mustahik['nama']}}">0</b></td>
                            </tr>
                        </table>
                    </div>                
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                Start creating your amazing application!
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    @endforeach
    <!-- Default box -->
    <div class="card">
        <div class="card-header">            
        </div>
        <div class="card-body">
            <button href="{{ route('mustahik.create') }}" type="submit" class="btn btn-primary btn-sm modal-show" title="Tambah Mustahik" >Tambah Mustahik</button>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

</section>
@endsection

{{-- isi javascript --}}
@push('script')
<script>   
    function cariBeras() {
        // var jumBeras = $jumlahBeras;
        var BerasTerkumpul= "<?php echo $jumlahBeras ?>";

        // var jumlahOrangBeras= 3;


        var totalSeluruhBeras = 0;
        var sisaBeras; 

        var golongan = <?php echo $golongan?>;
        golongan.forEach(myFunction);

        function myFunction(item) {
            var a = {};
            a['beras_'+item] = parseInt(document.getElementById("beras_"+item).value);
            var d = {};
            d['jumlahOrangBeras'+item] = parseInt(document.getElementById("orang_"+item).innerHTML);
            var progres = document.getElementById("progres_Beras");
            var sisaBerasText = document.getElementById("sisa_Beras");
            var b = {}; 
            b['hasilBeras_'+item] = document.getElementById("hasilBeras_"+item);

            //Menghitung total dan sisa beras
            var c = {}; 
            var sisaBeras; 
            c['totalBeras_'+item] = a['beras_'+item] * d['jumlahOrangBeras'+item];
            if(isNaN(c['totalBeras_'+item])){
                c['totalBeras_'+item]=0;
            }

            //Menuliskan hasil perkalian jumlah beras dengan julah orang pada setiap golongan
            b['hasilBeras_'+item].innerHTML = c['totalBeras_'+item];   

            totalSeluruhBeras += c['totalBeras_'+item];   
            
            sisaBeras = BerasTerkumpul - totalSeluruhBeras;

            //Menampilkan hasil total dan sisa beras
            sisaBerasText.innerHTML = sisaBeras;                           

            var persen;
            var width = 100;
            persen = (sisaBeras/BerasTerkumpul)*100;
            if (persen < 0 ) {
                progres.style.width = "0%";
                sisaBerasText.style.color = "red";
            } else{
                progres.style.width = persen + "%";
                sisaBerasText.style.color = "#fff";
            }       
        }
    } 

    function cariUang() {
        var UangTerkumpul= "<?php echo $jumlahUang ?>";

        var totalSeluruhUang = 0;
        var sisaUang; 

        var golongan = <?php echo $golongan?>;
        golongan.forEach(myFunction);

        function myFunction(item) {
            var a = {};
            a['uang_'+item] = parseInt(document.getElementById("uang_"+item).value);
            var d = {};
            d['jumlahOrangUang'+item] = parseInt(document.getElementById("orang_"+item).innerHTML);
            var progres = document.getElementById("progres_Uang");
            var sisaUangText = document.getElementById("sisa_Uang");
            var b = {}; 
            b['hasilUang_'+item] = document.getElementById("hasilUang_"+item);

            //Menghitung total dan sisa Uang
            var c = {}; 
            var sisaUang; 
            c['totalUang_'+item] = a['uang_'+item] * d['jumlahOrangUang'+item];
            if(isNaN(c['totalUang_'+item])){
                c['totalUang_'+item]=0;
            }

            //Menuliskan hasil perkalian jumlah Uang dengan julah orang pada setiap golongan
            b['hasilUang_'+item].innerHTML = new Intl.NumberFormat('de-DE').format(c['totalUang_'+item]);   

            totalSeluruhUang += c['totalUang_'+item];   
            
            sisaUang = UangTerkumpul - totalSeluruhUang;
            
            //Menampilkan hasil total dan sisa Uang
            sisaUangText.innerHTML = new Intl.NumberFormat('de-DE').format(sisaUang);                           

            var persen;
            var width = 100;
            persen = (sisaUang/UangTerkumpul)*100;
            if (persen < 0 ) {
                progres.style.width = "0%";
                sisaUangText.style.color = "red";
            } else{
                progres.style.width = persen + "%";
                sisaUangText.style.color = "#fff";
            }       
        }       
    } 

</script>
@endpush