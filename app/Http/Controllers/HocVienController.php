<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\HocVien;
use Illuminate\Support\Facades\Storage;
use Dompdf\Options;
use Illuminate\Support\Facades\View;
use App\Models\HocVienCoBan;

class HocVienController extends Controller
{
    public function createForm()
    {
        return view('hocvien.create');
    }

    public function store(Request $request)
{
    // Validate input
    $validatedData = $request->validate([
        'ung_dung_cntt' => 'required',
        'ho_ten' => 'required',
        'can_cuoc_cong_dan' => 'required|max:12',
        'noi_sinh' => 'required',
        'gioi_tinh' => 'required|in:Nam,Nữ,Khác',
        'ngay_cap_cccd' => 'required|date',
        'noi_cap_cccd' => 'required',
        'ngay_sinh' => 'required|date',
        'so_dien_thoai' => 'required|max:15',
        'sinh_vien_khoa' => 'required|in:21,22,23,24,khác',
        'nganh_hoc' => 'required_if:sinh_vien_khoa,khác',
        'ngay_dang_ky' => 'required|date',
        'ghi_chu' => 'nullable',
        'anh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Thêm điều kiện kiểm tra cho ảnh
    ]);

    // Create a new instance of the HocVien model
    $hocVien = new HocVien();
    $hocVien->ung_dung_cntt = $request->ung_dung_cntt;
    $hocVien->ho_ten = $request->ho_ten;
    $hocVien->can_cuoc_cong_dan = $request->can_cuoc_cong_dan;
    $hocVien->noi_sinh = $request->noi_sinh;
    $hocVien->gioi_tinh = $request->gioi_tinh;
    $hocVien->ngay_cap_cccd = $request->ngay_cap_cccd;
    $hocVien->noi_cap_cccd = $request->noi_cap_cccd;
    $hocVien->ngay_sinh = $request->ngay_sinh;
    $hocVien->dan_toc = $request->dan_toc;
    $hocVien->so_dien_thoai = $request->so_dien_thoai;
    $hocVien->sinh_vien_khoa = $request->sinh_vien_khoa;
    $hocVien->nganh_hoc = $request->nganh_hoc;
    $hocVien->ngay_dang_ky = $request->ngay_dang_ky;
    $hocVien->ghi_chu = $request->ghi_chu;

    // Save the record to the database
    $hocVien->save();

    // Store Image if it exists
    if ($request->hasFile('anh') && $request->file('anh')->isValid()) {
        $imagePath = $request->file('anh')->store('', 'public'); // Lưu tại thư mục gốc 'public\anhhocvien'
        $hocVien->anh = $imagePath;
        $hocVien->save();
    }

    // Redirect back with success message or to another page
    return redirect()->back()->with('success', 'Thêm sinh viên thành công!');
}
//Hiển thị thông tin tất cả học viên 

public function show()
{
    $hocViens = HocVien::all(); // Lấy tất cả học viên từ CSDL

    return view('hocvien.index', ['hocViens' => $hocViens]);
}

//Hiển thị chi tiết của một học viên dựa trên id
public function viewDetails($id)
{
    $hocVien = HocVien::findOrFail($id); // Tìm học viên theo id

    return view('hocvien.details', ['hocVien' => $hocVien]);
}
public function exportPDF($id)
{
    // Tìm học viên theo id
    $hocVien = HocVien::findOrFail($id);

    // Render view thành HTML
    $html = view('hocvien.details', ['hocVien' => $hocVien])->render();

    // Khởi tạo Dompdf với các tùy chọn
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isPhpEnabled', true);
    $options->set('isFontSubsettingEnabled', true);

    // Đường dẫn đến tệp font Times New Roman (.ttf hoặc .otf)
    $fontPath = public_path('fonts/times-new-roman.ttf');

    // Cấu hình font cho Dompdf
    $options->setFontDir(public_path('fonts/times-new-roman.ttf')); // Đường dẫn đến thư mục chứa font
    $options->setDefaultFont('times-new-roman'); // Tên font Times New Roman

    // Khởi tạo Dompdf với các tùy chọn
    $pdf = new Dompdf($options);

    // Load HTML vào Dompdf
    $pdf->loadHtml($html);

    // Render PDF
    $pdf->render();

    // Xuất PDF ra file hoặc trình duyệt
    return $pdf->stream('hocvien_' . $hocVien->id . '.pdf');
}

//Xuất excel 
// public function exportExcel()
// {
//     $data = HocVien::all();

//     return Excel::create('hocvien', function($excel) use ($data) {
//         $excel->sheet('Sheet 1', function($sheet) use ($data) {
//             $sheet->fromArray($data);
//         });
//     })->download('xlsx');
// }
public function index()
    {
        $hocVienCoBan = HocVienCoBan::all();
        return view('hoc_vien_co_ban.index', compact('hocVienCoBan'));
    }

}