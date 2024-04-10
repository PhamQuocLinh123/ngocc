<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách học viên</title>
    <!-- Bao gồm tệp CSS của Bootstrap và DataTables -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Danh sách học viên</h1>
        <table id="hocvien_table" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ và tên</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hocViens as $hocVien)
                <tr>
                    <td>{{ $hocVien->id }}</td>
                    <td>{{ $hocVien->ho_ten }}</td>
                    <td><a href="{{ route('hocvien.details', ['id' => $hocVien->id]) }}" class="btn btn-primary btn-sm">Xem chi tiết</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bao gồm tệp JavaScript của Bootstrap và DataTables -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <!-- Khởi tạo DataTable trên bảng của bạn -->
    <script>
        $(document).ready(function() {
            $('#hocvien_table').DataTable();
        });
    </script>
</body>
</html>
