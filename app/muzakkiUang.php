<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class muzakkiUang extends Model
{
    use SoftDeletes;
    
    //OFF autoincrement
    public $incrementing = true;
    //Timestamps
    public $timestamps = true;
    //SoftDelete
    protected $dates = ['deleted_at'];
    // fillable
    protected $fillable = [
        'nama', 'alamat', 'rt', 'jumlahUang', 'keterangan'
    ];
}
