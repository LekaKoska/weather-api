<?php

use App\Models\ForecastModel;
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
        Schema::table(ForecastModel::TABLE, function (Blueprint $table) {
            $table->string("weather_type")->default("sunny");
            $table->unsignedSmallInteger("probability")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(ForecastModel::TABLE, function (Blueprint $table) {
            //
        });
    }
};
