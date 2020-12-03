<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baldai extends Model
{
    protected $table = 'baldai';
    protected $primaryKey= 'id';
    public $timestamps = false;

    protected $fillable = ['pavadinimas', 'nuotraukos_pav', 'apartamento_id'];
}
