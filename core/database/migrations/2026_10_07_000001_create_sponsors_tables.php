<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('sponsor_categories')) {
            Schema::create('sponsor_categories', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->integer('row_no')->default(0);
                $table->tinyInteger('status')->default(1);
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('sponsors')) {
            Schema::create('sponsors', function (Blueprint $table) {
                $table->id();
                // home = homepage sponsors section (grouped by category), event = /event page
                $table->string('type', 20)->default('home');
                $table->unsignedBigInteger('category_id')->nullable();
                $table->string('name');
                $table->string('logo')->nullable();
                $table->string('link')->nullable();
                $table->integer('row_no')->default(0);
                $table->tinyInteger('status')->default(1);
                $table->timestamps();
            });
        }

        $this->seedExisting();
    }

    public function down(): void
    {
        Schema::dropIfExists('sponsors');
        Schema::dropIfExists('sponsor_categories');
    }

    // Move the sponsors that were hardcoded in the views into the database
    private function seedExisting(): void
    {
        if (DB::table('sponsors')->count() > 0) {
            return;
        }

        $base = 'assets/keditor/profx/assets/';
        $now = now();

        $home = [
            'Official Sponsor' => [
                ['Dominion Markets', 'sponsors/Domino Markets.png', 'https://www.dominionmarkets.com/'],
            ],
            'Event Sponsor' => [
                ['Bridging Fx', 'sponsors/bridgingfx.png', 'https://www.bridgingfx.net/'],
                ['Finx Card', 'sponsors/finxcart.png', 'https://finxcart.com/'],
            ],
            'Co-Sponsors' => [
                ['Swiset', 'award/10.png', 'https://swiset.com/'],
                ['Taurex', 'award/13.png', 'https://www.tradetaurex.com/'],
            ],
            'Featured Brands' => [
                ['Yamarkets', 'sponsors/9-yamarkets.png', 'https://www.yamarkets.com/'],
                ['NXG Markets', 'award/6.png', 'https://www.nxgmarkets.com/'],
                ['Puprime', 'award/7.png', 'https://www.puprime.com/'],
                ['Avora Markets', 'award/2.png', 'https://avoramarkets.com/'],
                ['Hyro Trader', 'sponsors/hyrotrader.png', 'https://www.hyrotrader.com/'],
                ['Salma Markets', 'award/8.png', 'https://www.salmamarkets.com/'],
                ['Leverage Markets', 'sponsors/leveragemarkets.png', 'https://leveragemarkets.com/'],
                ['Pipstone Capital', 'pipstones.png', 'https://pipstonecapital.com/'],
                ['Forexer', 'sponsors/forexer.png', 'https://www.forexer.com/'],
                ['Trade Ultra', 'partners/tradeultra.png', 'https://www.tradeultra.com/'],
                ['Liberty Groups', 'sponsors/libertymarkets.png', 'https://www.libertygroups.com/'],
                ['Arabic Broker', 'award/1.png', 'https://www.arabicbroker.com/'],
                ['Supreme Fx', 'award/9.png', 'https://supremefxtrading.com/'],
                ['Financial Markets', 'award/3.png', 'https://financialmarketsonline.com/'],
                ['FX Brokers Startup', 'sponsors/15-fx-broker-startup.png', 'https://fxbrokerstartup.com/'],
                ['Dominion Markets', 'sponsors/Domino Markets.png', 'https://www.dominionmarkets.com/'],
                ['Bridging Fx', 'sponsors/bridgingfx.png', 'https://www.bridgingfx.net/'],
                ['Hybrid Solution', 'sponsors/hybridsolution.png', 'https://hybridsolutions.com/'],
                ['Setup FX', 'sponsors/setupfx.png', 'https://setupfx.com/'],
                ['Dominion Funding', 'sponsors/domino Funding.png', 'https://dominionfunding.trade/'],
                ['STP TRADING', 'sponsors/spt_trading.png', 'https://www.stptrading.io/'],
                ['BSX', 'sponsors/bsx.png', 'https://www.bsxdao.com/'],
                ['MYMAA Markets', 'sponsors/mymarkets.png', 'https://www.mymaamarkets.com/'],
                ['BAKARA', 'sponsors/bakara.png', 'https://bakinv.com/'],
                ['PRIME X', 'sponsors/primex.png', 'https://www.primexcapital.com/en'],
                ['XCHIEF', 'sponsors/xchief.png', 'https://www.xchief.com/'],
            ],
        ];

        $catNo = 0;
        foreach ($home as $category => $sponsors) {
            $catId = DB::table('sponsor_categories')->where('title', $category)->value('id');
            if (!$catId) {
                $catId = DB::table('sponsor_categories')->insertGetId([
                    'title' => $category,
                    'row_no' => ++$catNo,
                    'status' => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
            foreach ($sponsors as $i => $s) {
                DB::table('sponsors')->insert([
                    'type' => 'home',
                    'category_id' => $catId,
                    'name' => $s[0],
                    'logo' => $base . $s[1],
                    'link' => $s[2],
                    'row_no' => $i + 1,
                    'status' => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }

        $event = [
            ['Bridging Fx', 'Event/bridging-white.png', 'https://www.bridgingfx.net/'],
            ['GGCC', 'Event/ggcc-white.png', 'https://www.ggccfx.com/'],
            ['Profit Fx', 'Event/profit-white.png', 'https://www.profitfxmarkets.com/'],
            ['ZARA FX', 'Event/zara-fx-logo.jpeg', 'https://www.zara-fx.com/'],
            ['JKV', 'Event/jkv.png', 'https://jkvglobal.com/'],
        ];
        foreach ($event as $i => $s) {
            DB::table('sponsors')->insert([
                'type' => 'event',
                'category_id' => null,
                'name' => $s[0],
                'logo' => $base . $s[1],
                'link' => $s[2],
                'row_no' => $i + 1,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
};
