<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRelationshipToCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('cafes', function( Blueprint $table ){
          $table->dropForeign('cafes_parent_foreign');
        });
          Schema::table('cafes', function( Blueprint $table ){
            $table->dropColumn('parent');
          });
            Schema::table('cafes', function( Blueprint $table ){

          $table->integer('company')->unsigned()->after('name')->nullable();
          $table->foreign('company')->references('id')->on('companies');
        });
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cafes', function( Blueprint $table ){
          $table->dropForeign('cafes_company_foreign');
          $table->integer('parent')->unsigned();
          $table->foreign('parent')->references('id')->on('cafes');
        });
    }
}
