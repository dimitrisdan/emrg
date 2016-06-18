<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateAllergiesTable
 * 
 * Allergies' Database Migration
 */
class CreateAllergiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergys', function (Blueprint $table) {
            # Primary Key
            $table->increments('allergy_id');
            
            # Attributes
            $table->integer('allergy_agent_id')->unsigned()->nullable();
            $table->string('allergy_description')->nullable();
            $table->date('allergy_onset')->nullable();
            $table->timestamps();
            
            # Foreign Keys
            $table->foreign('allergy_agent_id')
                ->references('allergy_agent_id')->on('allergy_agents')
                ->ondelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('allergys', function($table)
        {
            $table->dropForeign('allergys_allergy_agent_id_foreign');
            $table->dropColumn('allergy_agent_id');
        });
        Schema::drop('allergys');
    }
}
