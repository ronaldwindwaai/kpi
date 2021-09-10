<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'manager_id',
        'description',
    ];

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

    public function get_all_departments()
    {
        return DB::table('departments')
            ->join('users', 'departments.manager_id', '=', 'users.id')
            ->select('departments.id', 'departments.name', DB::raw("CONCAT(users.first_name,' ',users.last_name) as manager"), 'departments.created_at')
            ->get();
    }

    public function get_by_id(int $id)
    {
        return DB::table('departments')
            ->join('users', 'departments.manager_id', '=', 'users.id')
            ->where('departments.id', $id)
            ->select('departments.id', 'departments.name', DB::raw("CONCAT(users.first_name,' ',users.last_name) as manager"), 'departments.created_at')
            ->get();
    }

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id', 'id');
    }

    public function get_manager()
    {
        return $this->load('manager');
    }
}
