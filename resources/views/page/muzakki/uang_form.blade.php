{!! Form::model($model, [
    'route' => $model->exists ? ['muzakki.uang.update', $model->id] : 'muzakki.uang.store', 
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}
    <div class="form-group">
        <label for="nama">Nama Muzakki</label>
        {!! Form::text('nama', Null, ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Masukkan Nama']) !!}                   
    </div>
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                <label for="alamat">Alamat Muzakki</label>
                {!! Form::text('alamat', 'Gg. Mawar 2 RW 01, Genuk, Ungaran Barat', ['class' => 'form-control', 'id' => 'alamat', 'placeholder' => 'Masukkan Alamat']) !!}
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="rt">RT</label>
                {!! Form::text('rt', Null, ['class' => 'form-control', 'id' => 'rt', 'placeholder' => 'Masukkan RT']) !!}
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="jumlahUang">Jumlah Uang</label>                    
        <div class="input-group">
            <div class="input-group-append">
                <span class="input-group-text">Rp</span>
            </div>
            {!! Form::text('jumlahUang', Null, ['class' => 'form-control', 'id' => 'jumlahUang', 'placeholder' => 'Masukkan Jumlah Uang']) !!}
            <div class="input-group-append">
                <span class="input-group-text">.00</span>
            </div>
        </div>                    
    </div>
    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        {!! Form::textarea('keterangan', Null, ['class' => 'form-control', 'id' => 'keterangan', 'rows' => '3']) !!}
    </div>        
{!! Form::close() !!}    