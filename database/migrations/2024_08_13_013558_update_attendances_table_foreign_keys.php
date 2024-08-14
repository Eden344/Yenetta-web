<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAttendancesTableForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attendances', function (Blueprint $table) {
            // Drop existing foreign key constraint
            $table->dropForeign(['student_id']);

            // Add the foreign key with cascading deletes
            $table->foreign('student_id')->references('id')->on('information')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attendances', function (Blueprint $table) {
            // Drop the foreign key with cascading deletes
            $table->dropForeign(['student_id']);

            // Optionally, re-add the foreign key without cascading deletes
            $table->foreign('student_id')->references('id')->on('information');
        });
    }
}
