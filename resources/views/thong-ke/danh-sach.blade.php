@extends('trangchu')
@section('content')
<div class="table-responsive">
    <h1>Thống Kê Hóa Đơn</h1>

    <p>Tổng số khách hàng: {{ $khachhang }}</p>
    <p>Tổng doanh thu: {{ $tongtien }}</p>

    <canvas id="myChart" width="200" height="100"></canvas>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Tổng Khách Hàng', 'Tổng Doanh Thu'],
                datasets: [{
                    label: 'Thống Kê Hóa Đơn',
                    data: [{{ $khachhang }}, {{ $tongtien }}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</div>
@endsection