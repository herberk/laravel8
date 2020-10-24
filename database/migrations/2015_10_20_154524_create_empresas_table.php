<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function(Blueprint $table)
        {

            $table->increments('id');
            $table->boolean('active')->default(true);
            $table->string('rut',12)->unique();
            $table->string('name');
            $table->string('name_corto',10)->unique();
            $table->integer('item_id5')->unsigned();
            $table->string('tipo_empresa')->nullable();
            $table->string('actividad')->nullable();
            $table->string('direccion')->nullable();
            $table->integer('region_id')->unsigned()->nullable();
            $table->string('region')->nullable();
            $table->integer('comuna_id')->unsigned()->nullable();
            $table->string('comuna')->nullable();
            $table->integer('ciudad_id')->unsigned()->nullable();
            $table->string('ciudad')->nullable();
            $table->integer('codpostal')->unsigned()->nullable();
            $table->string('email')->unique();
            $table->string('fono')->nullable();
            $table->date('feinicio')->nullable();
            $table->string('tipo_tributacion',60)->nullable();
            $table->integer('item_id6')->unsigned()->nullable();
            $table->string('segmento',60)->nullable();
            $table->integer('item_id10')->unsigned()->nullable();
            $table->string('codigo')->nullable();
            $table->string('giro')->nullable();
            $table->string('logo')->nullable();
            $table->double('capital');
            $table->string('notario')->nullable();
            $table->date('fenotario')->nullable();
            $table->string('repertorio')->nullable();
            $table->string('nro_edicion')->nullable();
            $table->date('fediario')->nullable();
            $table->string('reg_comercio')->nullable();
            $table->text('notas')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('empresas');
    }

}
