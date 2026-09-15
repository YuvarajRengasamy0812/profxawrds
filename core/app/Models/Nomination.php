<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomination extends Model
{
    use HasFactory;
    use HasFactory;

    // Table name (optional if it follows Laravel naming convention)
    protected $table = 'nominations';

    // Mass assignable fields
    protected $fillable = [
        'company',
        'contact',
        'jobtitle',
        'email',
        'confirm_email',
        'phone',
        'country',
        'description',
        'statement',
        'category',
        'subcategory',
       
        'consent1',
        'consent2',
    ];

    // Casts for boolean fields
    protected $casts = [
        'consent1' => 'boolean',
        'consent2' => 'boolean',
    ];
}







