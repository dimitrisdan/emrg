<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Webpatser\Uuid\Uuid;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('contact_id');
            $table->string('contact_telephone')->nullable();
            $table->string('contact_street')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('contact_city')->nullable();
            $table->string('contact_postcode')->nullable();
            $table->string('contact_state')->nullable();
            $table->string('contact_country')->nullable();
            $table->integer('contact_hpid')->nullable();
            $table->timestamps();
        });

//        DB::table('contacts')->insert(
//            array(
//                'contact_id' => 1,
//                'contact_telephone' => '2107486811',
//                'contact_street' => 'Eufratou',
//                'contact_number' => '1',
//                'contact_city' => 'Zografou',
//                'contact_postcode' => '15772',
//                'contact_state' => 'Athens',
//                'contact_country' => 'Greece',
//                'contact_hpid' => Uuid::generate(),
//            )
//        );
//
//        DB::table('contacts')->insert(
//            array(
//                'contact_id' => 2,
//                'contact_telephone' => '2107486811',
//                'contact_street' => 'Anakreontos',
//                'contact_number' => '11',
//                'contact_city' => 'Kolonaki',
//                'contact_postcode' => '25511',
//                'contact_state' => 'Athens',
//                'contact_country' => 'Greece',
//                'contact_hpid' => Uuid::generate(),
//            )
//        );
//
//        DB::table('contacts')->insert(
//            array(
//                'contact_id' => 3,
//                'contact_telephone' => '2107486811',
//                'contact_street' => 'Solonos',
//                'contact_number' => '166',
//                'contact_city' => 'Athens',
//                'contact_postcode' => '11122',
//                'contact_state' => 'Athens',
//                'contact_country' => 'Greece',
//                'contact_hpid' => Uuid::generate(),
//            )
//        );


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contacts');
    }
}
