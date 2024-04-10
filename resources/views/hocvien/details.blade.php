<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin học viên</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS */
        body {
            padding: 20px;
        }
        .custom-border {
            border: 1px solid #ced4da; /* Màu và độ dày của đường viền */
            border-radius: 5px; /* Độ cong của góc */
            padding: 15px; /* Khoảng cách giữa nội dung và đường viền */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="mt-4">Thông tin học viên</h1>
                <div class="card mt-4">
                    <div class="card-body custom-border">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Ứng dụng CNTT:</strong> {{ $hocVien->ung_dung_cntt }}</li>
                            <li class="list-group-item"><strong>Ảnh:</strong></li>
                            <li class="list-group-item">
                                <div class="mt-2">
                                    <img src="{{ asset('anhhocvien/' . $hocVien->anh) }}" alt="Ảnh học viên" class="img-fluid" style="width: 200px; height: 150px;">
                                </div>
                            </li>
                            <li class="list-group-item"><strong>Họ và tên:</strong> {{ $hocVien->ho_ten }}</li>
                            <li class="list-group-item"><strong>Căn cước công dân:</strong> {{ $hocVien->can_cuoc_cong_dan }}</li>
                            <li class="list-group-item"><strong>Nơi sinh:</strong> {{ $hocVien->noi_sinh }}</li>
                            <li class="list-group-item"><strong>Giới tính:</strong> {{ $hocVien->gioi_tinh }}</li>
                            <li class="list-group-item"><strong>Ngày cấp CCCD:</strong> {{ $hocVien->ngay_cap_cccd }}</li>
                            <li class="list-group-item"><strong>Nơi cấp CCCD:</strong> {{ $hocVien->noi_cap_cccd }}</li>
                            <li class="list-group-item"><strong>Ngày sinh:</strong> {{ $hocVien->ngay_sinh }}</li>
                            <li class="list-group-item"><strong>Dân tộc:</strong> {{ $hocVien->dan_toc }}</li>
                            <li class="list-group-item"><strong>Số điện thoại:</strong> {{ $hocVien->so_dien_thoai }}</li>
                            <li class="list-group-item"><strong>Sinh viên khoa:</strong> {{ $hocVien->sinh_vien_khoa }}</li>
                            <li class="list-group-item"><strong>Ngành học:</strong> {{ $hocVien->nganh_hoc }}</li>
                            <li class="list-group-item"><strong>Ngày đăng ký:</strong> {{ $hocVien->ngay_dang_ky }}</li>
                            <li class="list-group-item"><strong>Ghi chú:</strong> {{ $hocVien->ghi_chu }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('hocvien.exportPDF', ['id' => $hocVien->id]) }}" class="btn btn-primary">Xuất PDF</a>
    <a href="{{ route('hocvien.exportExcel') }}" class="btn btn-primary">Xuất Excel</a>
    <!-- Bootstrap JS và jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
    