<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $table = 'sponsors';

    protected $fillable = ['type', 'category_id', 'name', 'logo', 'link', 'row_no', 'status'];

    public function category()
    {
        return $this->belongsTo(SponsorCategory::class, 'category_id');
    }
}
