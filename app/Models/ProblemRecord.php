<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProblemRecord extends Model
{
    protected $table = 'Problem_Record';
    protected $primaryKey = 'id_problemrecord';
    public $incrementing = false;

    protected $fillable = [
        'id_problemrecord',
        'id_problem',
        'problem',
        'solution',
        'description',
        'operator',
        'corrector',
        'supervisor',
        'office_code',
        'section_code',
        'id_user'
    ];
}
