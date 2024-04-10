<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sinh Viên Mới</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS */
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thêm Sinh Viên Mới</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/them-hoc-vien') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="ung_dung_cntt">Ứng dụng CNTT:</label>
                <select class="form-control" name="ung_dung_cntt" id="ung_dung_cntt">
                    <option value="Nâng cao">Nâng cao</option>
                    <option value="Cơ bản">Cơ bản</option>
                </select>
            </div>
            <div class="form-group">
                <label for="anh">Ảnh:</label>
                <input type="file" class="form-control-file" name="anh" id="anh">
                @error('anh')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="ho_ten">Họ và tên:</label>
                <input type="text" class="form-control" name="ho_ten" id="ho_ten">
            </div>

            <div class="form-group">
                <label for="can_cuoc_cong_dan">Căn cước công dân:</label>
                <input type="text" class="form-control" name="can_cuoc_cong_dan" id="can_cuoc_cong_dan">
            </div>

            <div class="form-group">
                <label for="noi_sinh">Nơi sinh:</label>
                <input type="text" class="form-control" name="noi_sinh" id="noi_sinh">
            </div>

            <div class="form-group">
                <label for="gioi_tinh">Giới tính:</label>
                <select class="form-control" name="gioi_tinh" id="gioi_tinh">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                    <option value="Khác">Khác</option>
                </select>
            </div>

            <div class="form-group">
                <label for="ngay_cap_cccd">Ngày cấp CCCD:</label>
                <input type="date" class="form-control" name="ngay_cap_cccd" id="ngay_cap_cccd">
            </div>

            <div class="form-group">
                <label for="noi_cap_cccd">Nơi cấp CCCD:</label>
                <input type="text" class="form-control" name="noi_cap_cccd" id="noi_cap_cccd">
            </div>

            <div class="form-group">
                <label for="ngay_sinh">Ngày sinh:</label>
                <input type="date" class="form-control" name="ngay_sinh" id="ngay_sinh">
            </div>

            <div class="form-group">
                <label for="dan_toc">Dân tộc:</label>
                <input type="text" class="form-control" name="dan_toc" id="dan_toc">
            </div>

            <div class="form-group">
                <label for="so_dien_thoai">Số điện thoại:</label>
                <input type="number" class="form-control" name="so_dien_thoai" id="so_dien_thoai">
            </div>

            <div class="form-group">
                <label for="sinh_vien_khoa">Sinh viên khoa:</label>
                <select class="form-control" name="sinh_vien_khoa" id="sinh_vien_khoa">
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="khác">Khác</option>
                </select>
            </div>

            <div id="nganh_hoc_field" class="form-group">
                <label for="nganh_hoc">Ngành học:</label>
                <select class="form-control" name="nganh_hoc" id="nganh_hoc">
                    <option value="Công nghệ thông tin">Công nghệ thông tin</option>
                    <option value="Bảo vệ thực vật">Bảo vệ thực vật</option>
                    <option value="Công nghệ thực phẩm">Công nghệ thực phẩm</option>
                    <option value="Tài chính ngân hàng">Tài chính ngân hàng</option>
                    <option value="Kế toán">Kế toán</option>
                    <option value="Luật thương mại">Luật thương mại</option>
                    <option value="Luật kinh tế">Luật kinh tế</option>
                    <option value="Ngôn ngữ anh">Ngôn ngữ anh</option>
                    <option value="Điều dưỡng">Điều dưỡng</option>
                    <option value="Xét nghiệm y học">Xét nghiệm y học</option>
                    <option value="Thiết kế đồ họa">Thiết kế đồ họa</option>
                    <option value="Dược">Dược</option>
                    <option value="Kĩ thuật oto">Kĩ thuật oto</option>
                    <option value="Kĩ thuật điện điện tử">Kĩ thuật điện điện tử</option>
                    <option value="Cơ khí">Cơ khí</option>
                    <option value="Xây dựng">Xây dựng</option>
                    <option value="Quản trị kinh doanh">Quản trị kinh doanh</option>
                    <option value="Du lịch">Du lịch</option>
                    <option value="Tiếng Việt và văn hoá Việt Nam">Tiếng Việt và văn hoá Việt Nam</option>
                    <option value="Đông phương học">Đông phương học</option>
                    <!-- Thêm các lựa chọn khác tương tự -->
                </select>
            </div>

            <div class="form-group">
                <label for="ngay_dang_ky">Ngày đăng ký:</label>
                <input type="date" class="form-control" name="ngay_dang_ky" id="ngay_dang_ky">
            </div>

            <div class="form-group">
                <label for="ghi_chu">Ghi chú:</label>
                <textarea class="form-control" name="ghi_chu" id="ghi_chu" cols="30" rows="5"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Thêm sinh viên</button>
        </form>
    </div>

    <!-- Bootstrap JS và jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sinhVienKhoaSelect = document.getElementById('sinh_vien_khoa');
            var nganhHocSelect = document.getElementById('nganh_hoc');

            // Hàm để vô hiệu hóa hoặc kích hoạt trường ngành học
            function toggleNganhHocField() {
                nganhHocSelect.disabled = (sinhVienKhoaSelect.value === 'khác');
            }

            // Xử lý sự kiện khi giá trị của Sinh viên khoa thay đổi
            sinhVienKhoaSelect.addEventListener('change', toggleNganhHocField);

            // Khởi tạo trạng thái ban đầu
            toggleNganhHocField();
        });
    </script>
</body>
</html>
