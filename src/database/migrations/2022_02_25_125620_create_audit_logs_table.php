<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->enum('event_status', ['SUCCESS', 'FAILED']);
            $table->enum('event_type', ['Create', 'Delete', 'Edit', 'Block', 'Unblock', 'ViewItem', 'ViewList']);
            $table->text('description')->nullable(false);
            $table->string('table_name')->nullable();
            $table->integer('row_id')->nullable();
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
        Schema::dropIfExists('audit_logs');
    }
}
