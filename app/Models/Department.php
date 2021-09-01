<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    private $columns = [
        'id',
        'name',
        'manager',
        'created_at',
    ];

    public function get_columns()
    {
        return $this->columns;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
