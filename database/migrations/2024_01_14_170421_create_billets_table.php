<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBilletsTable extends Migration
{
    public function up()
    {
        Schema::create('billets', function (Blueprint $table) {
            $table->id();
            $table->string('classe');
            $table->decimal('tarif', 8, 2);
            $table->string('depart');
            $table->string('arrive');
            $table->dateTime('heure_depart');
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('billets');
    }
}
