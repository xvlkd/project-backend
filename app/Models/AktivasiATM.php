<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktivasiATM extends Model
{
    protected $table = 'AktivasiATM';
    protected $primaryKey = 'id_aktivasi';
    public $incrementing = false;

    protected $fillable = [
        'id_aktivasi',
        'card_number',
        'account_name',
        'procedure',
        'operator',
        'supervisor',
        'office_code',
        'section_code',
        'id_user'
    ];
}