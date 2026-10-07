<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class Sponsor extends Model
{
    protected $table = 'sponsors';

    protected $fillable = ['type', 'category_id', 'name', 'logo', 'link', 'row_no', 'status'];

    public function category()
    {
        return $this->belongsTo(SponsorCategory::class, 'category_id');
    }

    // True when the sponsor tables exist. On a fresh deploy (no SSH to run
    // "php artisan migrate") the tables are created here on first use.
    public static function ready(): bool
    {
        static $ready = null;
        if ($ready !== null) {
            return $ready;
        }

        try {
            if (!Schema::hasTable('sponsors') || !Schema::hasTable('sponsor_categories')) {
                Artisan::call('migrate', [
                    '--path' => 'database/migrations/2026_10_07_000001_create_sponsors_tables.php',
                    '--force' => true,
                ]);
            }
            $ready = Schema::hasTable('sponsors') && Schema::hasTable('sponsor_categories');
        } catch (\Throwable $e) {
            report($e);
            $ready = false;
        }

        return $ready;
    }
}
