<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('about_line', 1000)->nullable();
            $table->string('facebook_link', 1000)->nullable();
            $table->string('twitter_link', 1000)->nullable();
            $table->string('instagram_link', 1000)->nullable();
            $table->string('linkedin_link', 1000)->nullable();
            $table->string('phone_line_1', 14)->nullable();
            $table->string('phone_line_2', 14)->nullable();
            $table->string('phone_line_3', 14)->nullable();
            $table->timestamps();
        });
        DB::table('abouts')->insert(
            array(
                'about_line' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo consequatur quam dicta omnis quo ipsum labore sequi quas quasi mollitia hic nesciunt alias iste repellat laudantium, incidunt natus voluptatum voluptate?. Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi nobis velit cupiditate assumenda sunt quod tempore, labore dicta praesentium cumque eius commodi modi accusantium dolorem ipsa magni consequuntur quisquam in! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe omnis distinctio, itaque quae laboriosam sapiente, dolor repudiandae quos natus illum corporis magnam. Id est dolorum nam iure itaque blanditiis perspiciatis.',
                'facebook_link' => 'http://facebook.com/',
                'twitter_link' => 'http://twitter.com/',
                'instagram_link' => 'http://instagram.com/',
                'linkedin_link' => 'http://linkedin.com/',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abouts');
    }
}
