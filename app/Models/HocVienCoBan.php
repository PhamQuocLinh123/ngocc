<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HocVienCoBan extends Model
{
    use HasFactory;

    protected $table = 'hoc_vien_co_ban';

    protected $fillable = [
        'hoc_vien_id',
        'anh',
        'ho_ten',
        'can_cuoc_cong_dan',
        'ngay_cap_cccd',
        'noi_cap_cccd',
        'ngay_sinh',
        'dan_toc',
        'so_dien_thoai',
        'sinh_vien_khoa',
        'nganh_hoc',
        'ngay_dang_ky',
        'ghi_chu',
        'noi_sinh',
        'gioi_tinh',
    ];

    protected $casts = [
        'ngay_cap_cccd' => 'date',
        'ngay_sinh' => 'date',
        'ngay_dang_ky' => 'date',
    ];

    public function hocVien()
    {
        return $this->belongsTo(HocVien::class);
    }
}
