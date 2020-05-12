<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddedCafeParentChildRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('cafes', function( Blueprint $table ){
        $table->integer('parent')->unsigned()->nullable()->after('id')->nullable();
        $table->foreign('parent')->references('id')->on('cafes')->nullable();
        $table->string('location_name')->after('name')->nullable();
        $table->integer('roaster')->after('longitude')->nullable();
        $table->text('website')->after('roaster')->nullable();
        $table->text('description')->after('website')->nullable();
        $table->integer('added_by')->after('description')->unsigned()->nullable();
        $table->foreign('added_by')->references('id')->on('users');
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
        $table->dropColumn('parent');
       
      });
    }
}
