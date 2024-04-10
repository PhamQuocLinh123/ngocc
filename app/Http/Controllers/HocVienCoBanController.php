<?php

namespace App\Http\Controllers;

use App\Models\HocVienCoBan;
use Illuminate\Http\Request;

class HocVienCoBanController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Validate incoming request data
    $validatedData = $request->validate([
        'hoc_vien_id' => 'required|exists:hoc_vien,id',
        'ho_ten' => 'required|string|max:255',
        'can_cuoc_cong_dan' => 'required|string|max:12',
        'ngay_cap_cccd' => 'required|date',
        'noi_cap_cccd' => 'required|string|max:255',
        'ngay_sinh' => 'required|date',
        'dan_toc' => 'nullable|string|max:50',
        'so_dien_thoai' => 'nullable|string|max:15',
        'sinh_vien_khoa' => 'nullable|integer',
        'nganh_hoc' => 'nullable|string|max:255',
        'ngay_dang_ky' => 'required|date',
        'ghi_chu' => 'nullable|string',
        'noi_sinh' => 'nullable|string|max:255',
        'gioi_tinh' => 'nullable|in:Nam,Nữ,Khác',
        'anh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Thêm quy tắc cho trường ảnh
    ]);

    // Lưu trữ ảnh nếu tồn tại và hợp lệ
    if ($request->hasFile('anh') && $request->file('anh')->isValid()) {
        $imagePath = $request->file('anh')->store('images', 'public');
        $validatedData['anh'] = $imagePath; // Thêm đường dẫn ảnh vào dữ liệu đã xác thực
    }

    // Create a new HocVienCoBan instance with validated data
    $hocVienCoBan = HocVienCoBan::create($validatedData);

    // Optionally, you can return a response to the client
    return response()->json([
        'message' => 'HocVienCoBan created successfully',
        'data' => $hocVienCoBan,
    ], 201);
}

}
