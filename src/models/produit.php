<?php

namespace custumbox\models;

use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    protected $table = "produit";
    protected $primaryKey = "id";
    public $timestamps = false;
}