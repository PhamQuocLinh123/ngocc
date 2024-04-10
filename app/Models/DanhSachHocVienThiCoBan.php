<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhSachHocVienThiCoBan extends Model
{
    use HasFactory;

    protected $table = 'danh_sach_hoc_vien_thi_co_ban';

    protected $fillable = [
        'hoc_vien_id',
        'ma_so_bao_danh',
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

    public function hocVienCoBan()
    {
        return $this->belongsTo(HocVienCoBan::class, 'hoc_vien_id');
    }
}
