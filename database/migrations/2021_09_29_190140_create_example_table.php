<?php /** @noinspection UnusedFunctionResultInspection */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipiAttivitaTable extends Migration
{
    public function up(): void
    {
        Schema::create('example', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('example');
    }
}
