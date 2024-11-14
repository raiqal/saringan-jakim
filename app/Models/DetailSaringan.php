<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSaringan extends Model
{
    use HasFactory;

    protected $table = 'detail_saringans';

    protected $fillable = [
        'category',
        'country',
        'full_name',
        'nationality',
        'gender',
        'birth_date',
        'passport_number',
        // 'country_code',
        'whatsapp_number',
        'email',
        'permanent_address',
        'partcipation',          
        'contry_representation',  
        'participation_year',
        'ranking',
        'photo',
        'passport_image',
    ];
}
