<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddScheduleIdToInformationTable extends Migration
{
    public function up()
    {
        Schema::table('information', function (Blueprint $table) {
            $table->unsignedBigInteger('schedule_id')->nullable();
            $table->foreign('schedule_id')->references('id')->on('schedules')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('information', function (Blueprint $table) {
            $table->dropForeign(['schedule_id']);
            $table->dropColumn('schedule_id');
        });
    }
}
