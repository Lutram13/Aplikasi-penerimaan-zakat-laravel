<div>
    <strong>Id Mustahik : </strong>
    <i class="text-muted"> {{ $model->id }}</i>
    <table class="table table-condensed">
        <tr>
            <td>Nama Mustahik</td>
            <td> </td>
            <td>{{ $model->nama }}</td>
        </tr>
        <tr>
            <td>Golongan Muzakki</td>
            <td> </td>
            <td>{{ $model->golongan }}</td>
        </tr>
        <tr>
            <td>Alamat Muzakki</td>
            <td> </td>
            <td>{{ $model->alamat }}</td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td> </td>
            <td>{{ $model->keterangan }}</td>
        </tr>
    </table>
</div>