<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appeal', function (Blueprint $table) {
            $table->id();
            $table->string('student_Id')->unique();
            $table->string('e_room');
            $table->string('e_hostel');
            $table->longText('apply_reason');
            $table->string('e_bed');
            $table->timestamp('failed_at')->useCurrent();
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appeal');
    }
};
