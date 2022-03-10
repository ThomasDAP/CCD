<?php

namespace custumbox\models;

use Illuminate\Database\Eloquent\Model;

class panier extends Model
{
    protected $table = "panier";
    protected $primaryKey = "id";
    public $timestamps = false;
}