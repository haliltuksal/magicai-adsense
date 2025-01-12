<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('adsense_settings', function (Blueprint $table) {
            $table->text('display_ads_code')->nullable()->after('is_active');
            $table->boolean('display_ads_status')->default(false)->after('display_ads_code');
            
            $table->text('in_feed_ads_code')->nullable()->after('display_ads_status');
            $table->boolean('in_feed_ads_status')->default(false)->after('in_feed_ads_code');
            
            $table->text('in_article_ads_code')->nullable()->after('in_feed_ads_status');
            $table->boolean('in_article_ads_status')->default(false)->after('in_article_ads_code');
            
            $table->text('multiplex_ads_code')->nullable()->after('in_article_ads_status');
            $table->boolean('multiplex_ads_status')->default(false)->after('multiplex_ads_code');
        });
    }

    public function down()
    {
        Schema::table('adsense_settings', function (Blueprint $table) {
            $table->dropColumn([
                'display_ads_code',
                'display_ads_status',
                'in_feed_ads_code',
                'in_feed_ads_status',
                'in_article_ads_code',
                'in_article_ads_status',
                'multiplex_ads_code',
                'multiplex_ads_status'
            ]);
        });
    }
}; 