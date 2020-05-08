<div class="modal fade" id="modal-tambah-beras">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Muzakki Beras</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open( [
                    'route' => 'muzakki.store',
                    'method' => 'POST'
                ]) !!}
                <div class="form-group{{$errors->has('namaMazukki') ? 'has-error' : ''}}">
                    <label for="namaMuzakki">Nama Muzakki</label>
                    {!! Form::text('namaMuzakki', Null, ['class' => 'form-control', 'id' => 'namaMuzakki', 'placeholder' => 'Masukkan Nama']) !!}
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="alamatMuzakki">Alamat Muzakki</label>
                            {!! Form::text('alamatMuzakki', 'Gg. Mawar 2 RW 01, Genuk, Ungaran Barat', ['class' => 'form-control', 'id' => 'alamatMuzakki', 'placeholder' => 'Masukkan Alamat']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="RTMuzakki">RT</label>
                            {!! Form::text('RTMuzakki', Null, ['class' => 'form-control', 'id' => 'RTMuzakki', 'placeholder' => 'Masukkan RT']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="jumlahBeras">Jumlah Beras</label>                    
                    <div class="input-group">
                        {!! Form::text('jumlahBeras', Null, ['class' => 'form-control', 'id' => 'jumlahBeras', 'placeholder' => 'Masukkan Jumlah Beras']) !!}
                        <div class="input-group-append">
                            <span class="input-group-text">Kg</span>
                        </div>
                    </div>                    
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    {!! Form::textarea('keterangan', Null, ['class' => 'form-control', 'id' => 'keterangan', 'rows' => '3']) !!}
                </div>                
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                {{ Form::button('Simpan', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}  
            </div>            
            {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

