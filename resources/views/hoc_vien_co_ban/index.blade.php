@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTables Example</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
</head>
    <h1>Danh sách học viên cơ bản</h1>
    <form id="thiForm" action="{{ route('hoc-vien-thi-co-ban.store') }}" method="POST">
        @csrf
        <input type="text" name="ba_so_dau" id="ba_so_dau">

        <table id="hocVienTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Họ và tên</th>
                    <th>Ngày sinh</th>
                    <th>Giới tính</th>
                    <th>Số CMND</th>
                    <th>Ngày cấp CMND</th>
                    <th>Nơi cấp CMND</th>
                    <th>Dân tộc</th>
                    <th>Số điện thoại</th>
                    <th>Sinh viên khoa</th>
                    <th>Ngành học</th>
                    <th>Ngày đăng ký</th>
                    <th>Ghi chú</th>
                    <th>Nơi sinh</th>
                    
                    <th>Thí Sinh Thi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hocVienCoBan as $hocVien)
                    <tr>
                        <td>
                            @if ($hocVien->anh)
                                <img src="{{ asset('storage/' . $hocVien->anh) }}" alt="{{ $hocVien->ho_ten }}" width="100">
                            @else
                                <span>Không có ảnh</span>
                            @endif
                        </td>
                        <td>{{ $hocVien->ho_ten }}</td>
                        <td>{{ $hocVien->ngay_sinh }}</td>
                        <td>{{ $hocVien->gioi_tinh }}</td>
                        <!-- Hiển thị thông tin khác của học viên -->
                        <td>{{ $hocVien->can_cuoc_cong_dan }}</td>
                        <td>{{ $hocVien->ngay_cap_cccd }}</td>
                        <td>{{ $hocVien->noi_cap_cccd }}</td>
                        <td>{{ $hocVien->dan_toc }}</td>
                        <td>{{ $hocVien->so_dien_thoai }}</td>
                        <td>{{ $hocVien->sinh_vien_khoa }}</td>
                        <td>{{ $hocVien->nganh_hoc }}</td>
                        <td>{{ $hocVien->ngay_dang_ky }}</td>
                        <td>{{ $hocVien->ghi_chu }}</td>
                        <td>{{ $hocVien->noi_sinh }}</td>
                        <td>
                            <input type="checkbox" name="hoc_vien_ids[]" value="{{ $hocVien->id }}" checked>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Lưu và thi</button>
    </form>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#hocVienTable').DataTable();
        });

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('thiForm');

            form.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData();

                // Lấy danh sách tất cả các checkbox
                const checkboxes = form.querySelectorAll('input[type="checkbox"]');
                checkboxes.forEach(function(checkbox) {
                    // Nếu checkbox được chọn, thêm thông tin của học viên vào FormData
                    if (!checkbox.checked) {
                        const hocVienId = checkbox.value;
                        formData.append('hoc_vien_ids[]', hocVienId);
                    }
                });

                // Gửi FormData chỉ chứa thông tin của những học viên chưa được chọn bằng fetch
                fetch(form.getAttribute('action'), {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-Token': document.head.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    // Xử lý dữ liệu trả về
                })
                .catch(error => console.error(error));
            });
        });
    </script>
@endsection
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách học viên cơ bản</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <style>
        /* CSS để căn giữa tiêu đề */
        .center-heading {
            text-align: center;
            margin-bottom: 20px;
        }

        /* CSS để làm cho nội dung giao diện không cần thanh cuộn */
        body {
            overflow-y: auto;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <div class="center-heading">
            <h1>Danh sách học viên cơ bản</h1>
        </div>
        <form id="thiForm" action="{{ route('hoc-vien-thi-co-ban.store') }}" method="POST">
            @csrf
            <div style="margin-bottom: 10px;">
                <h3 style="display: inline-block;">Số báo danh</h3>
                <input type="text" name="ba_so_dau" id="ba_so_dau" style="display: inline-block; margin-left: 10px;">
            </div>
            <br>
            <br>
            <div class="table-responsive">
                <table id="hocVienTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th>Họ và tên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Số CMND</th>
                            <th>Ngày cấp CMND</th>
                            <th>Nơi cấp CMND</th>
                            <th>Dân tộc</th>
                            <th>Số điện thoại</th>
                            <th>Sinh viên khoa</th>
                            <th>Ngành học</th>
                            <th>Ngày đăng ký</th>
                            <th>Ghi chú</th>
                            <th>Nơi sinh</th>
                            <th>Thí Sinh Thi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hocVienCoBan as $hocVien)
                            <tr>
                                <td>
                                    @if ($hocVien->anh)
                                        <img src="{{ asset('storage/' . $hocVien->anh) }}" alt="{{ $hocVien->ho_ten }}" width="100">
                                    @else
                                        <span>Không có ảnh</span>
                                    @endif
                                </td>
                                <td>{{ $hocVien->ho_ten }}</td>
                                <td>{{ $hocVien->ngay_sinh }}</td>
                                <td>{{ $hocVien->gioi_tinh }}</td>
                                <!-- Hiển thị thông tin khác của học viên -->
                                <td>{{ $hocVien->can_cuoc_cong_dan }}</td>
                                <td>{{ $hocVien->ngay_cap_cccd }}</td>
                                <td>{{ $hocVien->noi_cap_cccd }}</td>
                                <td>{{ $hocVien->dan_toc }}</td>
                                <td>{{ $hocVien->so_dien_thoai }}</td>
                                <td>{{ $hocVien->sinh_vien_khoa }}</td>
                                <td>{{ $hocVien->nganh_hoc }}</td>
                                <td>{{ $hocVien->ngay_dang_ky }}</td>
                                <td>{{ $hocVien->ghi_chu }}</td>
                                <td>{{ $hocVien->noi_sinh }}</td>
                                <td>
                                    <input type="checkbox" name="hoc_vien_ids[]" value="{{ $hocVien->id }}" checked>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-primary">Lưu và thi</button>
        </form>
    </div>

    <!-- Bootstrap JS và DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#hocVienTable').DataTable({
                searching: true // Cho phép tìm kiếm
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('thiForm');

            form.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData();

                // Lấy danh sách tất cả các checkbox
                const checkboxes = form.querySelectorAll('input[type="checkbox"]');
                checkboxes.forEach(function(checkbox) {
                    // Nếu checkbox được chọn, thêm thông tin của học viên vào FormData
                    if (!checkbox.checked) {
                        const hocVienId = checkbox.value;
                        formData.append('hoc_vien_ids[]', hocVienId);
                    }
                });

                // Gửi FormData chỉ chứa thông tin của những học viên chưa được chọn bằng fetch
                fetch(form.getAttribute('action'), {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-Token': document.head.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    // Xử lý dữ liệu trả về
                })
                .catch(error => console.error(error));
            });
        });
    </script>
</body>
</html> --}}
