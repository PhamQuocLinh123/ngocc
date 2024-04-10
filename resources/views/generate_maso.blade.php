<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Maso</title>
</head>
<body>
    <h1>Generate Maso</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ url('/generate-maso') }}" method="GET">
        @csrf
        <button type="submit">Tạo Mã Số</button>
    </form>
</body>
</html>
