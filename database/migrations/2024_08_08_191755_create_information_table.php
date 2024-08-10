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
<<<<<<< HEAD
            $table->string('email')->unique();
            $table->integer('phonenumber');
            $table->string('gender');
=======
            $table->string('email'); // Added an email column.
            $table->bigInteger('phonenumber1');
            $table->bigInteger('phonenumber2'); // Added an extra phone number column
            $table->string('gender',10);
>>>>>>> c09d9b36e4814b3e39ad1a99d369039efef0e920
            $table->integer('age');
            $table->string('school');
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