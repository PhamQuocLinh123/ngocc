<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\HocVienCreated;

class HocVien extends Model
{
    use HasFactory;

    protected $table = 'hoc_vien';

    protected $fillable = [
        'ung_dung_cntt',
        'anh',
        'ho_ten',
        'can_cuoc_cong_dan',
        'noi_sinh',
        'gioi_tinh',
        'ngay_cap_cccd',
        'noi_cap_cccd',
        'ngay_sinh',
        'dan_toc',
        'so_dien_thoai',
        'sinh_vien_khoa',
        'nganh_hoc',
        'ngay_dang_ky',
        'ghi_chu',
    ];
    protected $dispatchesEvents = [
        'created' => HocVienCreated::class,
    ];
}
