<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelasiRekMencurigakan extends Model
{
    protected $table = 'RelasiRekMencurigakan';
    protected $primaryKey = 'id_relasi';
    public $incrementing = false;

    protected $fillable = [
        'id_relasi',
        'category',
        'card_number_1',
        'card_number_2',
        'account_number_1',
        'account_number_2',
        'account_name',
        'description',
        'operator',
        'corrector',
        'supervisor',
        'office_code',
        'section_code',
        'id_user'
    ];
}
