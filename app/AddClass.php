<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddClass extends Model
{
       // table name
       protected $table = 'classes';
       // primary key
       public $primaryKey = 'cl_id';
       // Timestamps
       public $timestamps = false;
}
