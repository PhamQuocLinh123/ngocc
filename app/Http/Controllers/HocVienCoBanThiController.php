<?php

namespace App\Http\Controllers;

use App\Models\DanhSachHocVienThiCoBan;
use App\Models\HocVien;
use Illuminate\Http\Request;

class HocVienCoBanThiController extends Controller
{
    public function store(Request $request)
{
    // Xử lý dữ liệu yêu cầu từ form
    $hocVienIds = $request->input('hoc_vien_ids', []);
    
    // Lặp qua danh sách học viên được chọn từ form
    foreach ($hocVienIds as $hocVienId) {
        // Kiểm tra xem đã tồn tại bản ghi cho hoc_vien_id này chưa
        if (DanhSachHocVienThiCoBan::where('hoc_vien_id', $hocVienId)->exists()) {
            // Nếu đã tồn tại, bỏ qua và chuyển sang học viên tiếp theo
            continue;
        }
        
        // Lấy thông tin của học viên từ model HocVien
        $hocVien = HocVien::findOrFail($hocVienId);
        
        // Lấy ba số đầu từ form
        $baSoDau = $request->input('ba_so_dau');
        
        // Tìm mã số báo danh cuối cùng với ba số đầu này
        $lastCode = DanhSachHocVienThiCoBan::where('ma_so_bao_danh', 'like', $baSoDau . '%')->latest('ma_so_bao_danh')->first();
        
        // Nếu không có mã số báo danh nào với ba số đầu này
        if (!$lastCode) {
            $lastNumber = 0;
        } else {
            // Lấy ba số cuối cùng từ mã số báo danh cuối cùng và tăng lên 1
            $lastNumber = (int)substr($lastCode->ma_so_bao_danh, -3);
        }
        
        // Tạo mã số báo danh mới
        $maSoBaoDanh = $baSoDau . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        
        // Tạo bản ghi mới trong bảng DanhSachHocVienThiCoBan
        DanhSachHocVienThiCoBan::create([
            'hoc_vien_id' => $hocVienId,
            'ma_so_bao_danh' => $maSoBaoDanh,
            'ho_ten' => $hocVien->ho_ten,
            'anh' => $hocVien->anh,
            'can_cuoc_cong_dan' => $hocVien->can_cuoc_cong_dan,
            'ngay_cap_cccd' => $hocVien->ngay_cap_cccd,
            'noi_cap_cccd' => $hocVien->noi_cap_cccd,
            'ngay_sinh' => $hocVien->ngay_sinh,
            'dan_toc' => $hocVien->dan_toc,
            'so_dien_thoai' => $hocVien->so_dien_thoai,
            'sinh_vien_khoa' => $hocVien->sinh_vien_khoa,
            'nganh_hoc' => $hocVien->nganh_hoc,
            'ngay_dang_ky' => $hocVien->ngay_dang_ky,
            'ghi_chu' => $hocVien->ghi_chu,
            'noi_sinh' => $hocVien->noi_sinh,
            'gioi_tinh' => $hocVien->gioi_tinh,
        ]);
    }
    
    // Trả về thông báo JSON cho client
    return response()->json(['message' => 'Học viên đã được lưu và thi thành công.']);
}


}