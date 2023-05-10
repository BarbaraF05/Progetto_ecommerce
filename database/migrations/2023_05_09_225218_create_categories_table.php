<?php

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        
        /* variabile contenente array di categorie. Da scegliere */
            $categories=['Motori','Informatica','Sport','Accessori','Giochi','Arredamento','Abbigliamento','Libri','Bambini','Collezionismo'];

        /* per ogni category andiamo a creare un record nella tabella category */
            foreach($categories as $category){
            Category::create(['name'=>$category]);
            }
    } 

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
