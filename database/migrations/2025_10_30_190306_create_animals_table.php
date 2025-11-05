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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();

            $table->string('tag', 64)->nullable()->index();
            $table->string('name', 100)->nullable();
            $table->enum('sex', ['male', 'female']);
            $table->json('breed_composition');

            $table->date('date_of_birth')->nullable();
            $table->date('date_of_death')->nullable();

            $table->unsignedTinyInteger('num_of_siblings_at_birth')->nullable();
            $table->float('birth_weight')->nullable();
            $table->string('color_pattern')->nullable();
            $table->string('photo')->nullable();

            $table->foreignId('animal_type_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('breeder_id')
                ->nullable()
                ->constrained('parties')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('owner_id')
                ->nullable()
                ->constrained('parties')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->foreignId('maternal_id')
                ->nullable()
                ->constrained('animals')
                ->nullOnDelete();
            $table->foreignId('paternal_id')
                ->nullable()
                ->constrained('animals')
                ->nullOnDelete();

            $table->json('attributes')->nullable();
            $table->timestamps();

            $table->index('maternal_id');
            $table->index('paternal_id');
            $table->index(['animal_type_id', 'sex']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
