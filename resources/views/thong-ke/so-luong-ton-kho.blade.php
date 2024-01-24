@extends('trangchu')
@section('content')
<div class="table-responsive">
    <h1>Thống Kê Số Lượng hàng Tồn kho</h1>

    <p>Tổng Sô Lượng Hàng Tồn kho Hiện Tại: {{ $tongSoLuongTonKho }}</p>
    <p>Tổng Số Giá Trị hàng Tồn Kho: {{ $tongGiaTriTonKho }}</p>

    <form action="{{ route('thong-ke.so-luong-ton-kho') }}" method="get">
        <label for="ngayBatDau">Chọn Ngày Bắt Đầu:</label>
        <input type="date" id="ngayBatDau" name="ngayBatDau" >

        <label for="ngayKetThuc">Chọn Ngày Kết Thúc:</label>
        <input type="date" id="ngayKetThuc" name="ngayKetThuc" >

        <button type="submit" class="btn btn-success">Xem Thống Kê</button>
    </form>

    <canvas id="myChart" width="200" height="100"></canvas>

    @if(isset($ngayBatDau))
    <p>Ngày bắt Đầu: {{$ngayBatDau}}</p>
    @else
    <p>Ngày bắt Đầu: N/A</p>
    @endif

    
    @if(isset($ngayKetThuc))
    <p>Ngày Kết Thúc: {{$ngayKetThuc}}</p>
    @else
    <p>Ngày Kết Thúc: N/A</p>
    @endif
    

    <script>
       
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Số Lượng Hàng Tồn kho'],
                datasets: [
                {
                    label: 'Số Lượng hàng Tồn kho',
                    data: [{{ $tongSoLuongTonKhoTheoThoiGian }}],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)', 
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Số Lượng Hàng Đã Nhập Kho',
                    data: [{{ $tongSoLuongNhapKho }}],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Số Lượng Hàng Đã Xuất Kho',
                    data: [{{ $tongSoLuongXuatKho }}],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', 
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }
            ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        fontColor: 'rgb(0, 0, 0)',
                        fontSize: 14,
                    }
                }
            }
        });

    </script>
</div>
@endsection
