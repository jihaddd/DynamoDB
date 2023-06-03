<?php

namespace App;

use Kitar\Dynamodb\Model\Model;

class Catagory extends Model
{
    protected $table = 'paytap';
    protected $primaryKey = 'id_catagory';
    protected $sortKey = 'name_catagory';
    protected $fillable = ['name_catagory','id_catagory','sub_catagory','name_sub_branch'];
}
