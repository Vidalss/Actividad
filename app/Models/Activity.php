<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'objective',
        'competence',
        'syllabus',
        'authorized',
        'activity',
        'credits',
        'period_id',
        'staff_id',
        'role_id',
        'user_id',
    ];

    public function period () {
        return $this->belongsTo(Period::class, 'period_id');
    }

    public function staff() {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    public function role() {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }
}
