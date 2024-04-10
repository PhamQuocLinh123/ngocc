<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHocVienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoc_vien', function (Blueprint $table) {
            $table->id();
            $table->enum('ung_dung_cntt', ['Nâng cao', 'Cơ bản']);
            $table->string('anh', 255)->nullable();
            $table->string('ho_ten', 255);
            $table->string('can_cuoc_cong_dan', 12);
            $table->string('noi_sinh', 255)->nullable();
            $table->enum('gioi_tinh', ['Nam', 'Nữ', 'Khác']);
            $table->date('ngay_cap_cccd');
            $table->string('noi_cap_cccd', 255);
            $table->date('ngay_sinh');
            $table->string('dan_toc', 50)->nullable();
            $table->string('so_dien_thoai', 15)->nullable();
            $table->integer('sinh_vien_khoa')->nullable();
            $table->string('nganh_hoc', 255)->nullable();
            $table->date('ngay_dang_ky');
            $table->text('ghi_chu')->nullable();
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
        Schema::dropIfExists('hoc_vien');
    }
}
