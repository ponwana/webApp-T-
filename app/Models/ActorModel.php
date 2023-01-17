<?php

namespace App\Models;
use CodeIgniter\Model;

class ActorModel extends Model
{
    protected $table = 'actor';

    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'address','sex','birthday','age','activity','image'];
}