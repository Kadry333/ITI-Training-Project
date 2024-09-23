<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToPostsTable extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Check if the column does not exist before adding it
            if (!Schema::hasColumn('posts', 'user_id')) {
                $table->unsignedBigInteger('user_id')->after('id');

                // Set up the foreign key constraint
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            }
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Drop the foreign key constraint if it exists
            if (Schema::hasColumn('posts', 'user_id')) {
                $table->dropForeign(['user_id']);
                
                // Drop the user_id column
                $table->dropColumn('user_id');
            }
        });
    }
}
