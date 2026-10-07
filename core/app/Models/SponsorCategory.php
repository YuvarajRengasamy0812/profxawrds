<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SponsorCategory extends Model
{
    protected $table = 'sponsor_categories';

    protected $fillable = ['title', 'row_no', 'status'];

    public function sponsors()
    {
        return $this->hasMany(Sponsor::class, 'category_id')->orderBy('row_no')->orderBy('id');
    }

    public function activeSponsors()
    {
        return $this->sponsors()->where('type', 'home')->where('status', 1);
    }
}
