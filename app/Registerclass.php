<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registerclass extends Model
{
       // table name
       protected $table = 'class_register';
       // primary key
       public $primaryKey = 'cr_id';
       // Timestamps
       public $timestamps = false;
}
