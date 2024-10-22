<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('shop_details', function (Blueprint $table) {
            $table->id();
            
            // Personal Details
            $table->string('first_name');
            $table->string('last_name');
            $table->string('contact_number');
            $table->string('phone_number')->nullable();
            $table->string('email')->unique();
            $table->date('birth_of_date');
            $table->string('city');
            $table->string('country');
            $table->string('zip_code');
            $table->text('description')->nullable();

            // Company Details
            $table->string('company_name');
            $table->string('company_type');
            $table->string('pan_card_number');
            $table->string('fax_number')->nullable();
            $table->string('website')->nullable();
            $table->string('number')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('openingTime')->nullable();
            $table->string(column: 'closingTime')->nullable();
            $table->string(column: 'rating')->nullable();

            // Bank Details
            $table->string('bank_name');
            $table->string('branch');
            $table->string('account_holder_name');
            $table->string('account_number')->unique();
            $table->string('ifsc_code')->nullable();
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shop_details');
    }
}
