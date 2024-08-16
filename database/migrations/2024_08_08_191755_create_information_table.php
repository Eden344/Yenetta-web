<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('information', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->integer('phonenumber');
            $table->string('gender');
            $table->integer('age');
            $table->string('school');
            $table->double('fee');
            $table->text('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information');
    }
};
class AddEmailToInformationTable extends Migration
{
    public function up()
    {
        Schema::table('information', function (Blueprint $table) {
            $table->string('email')->unique(); // Add the email column
        });
    }

    public function down()
    {
        Schema::table('information', function (Blueprint $table) {
            $table->dropColumn('email'); // Remove the email column if rolled back
        });
    }
}