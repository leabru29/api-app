<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('cliente_id')->constrained('clientes')->cascadeOnUpdate();
            $table->foreignId('produto_id')->constrained('produtos')->cascadeOnUpdate();
            $table->integer('quantidade');
            $table->foreignId('pagamento_id')->constrained('pagamentos')->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
