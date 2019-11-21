<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
       // table name
       protected $table = 'classes';
       // primary key
       public $primaryKey = 'cl_id';
       // Timestamps
       public $timestamps = true;
}
