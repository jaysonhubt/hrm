<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateStartTimeAndEndTimeColumnRequirementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recruitment_requests', function($table)
        {
            $table->datetime('start_time')->nullable()->change();
            $table->datetime('end_time')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recruitment_requests', function($table)
        {
            $table->date('start_time')->nullable()->change();
            $table->date('end_time')->nullable()->change();
        });
    }
}
