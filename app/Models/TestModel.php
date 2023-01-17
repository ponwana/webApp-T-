<?php

namespace App\Models;
use CodeIgniter\Model;

class TestModel extends Model
{
    protected $table = 'test';

    protected $primaryKey = 'id';

    protected $allowedFields = ['title', 'detail','reference'];
}