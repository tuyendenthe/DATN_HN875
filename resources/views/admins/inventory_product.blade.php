@extends('admins.master')

@section('content')
<style>
    
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <div class="container">
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                  
                    <div class="pt-2">
                        @if ($errors->has('message'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('message') }}
                            </div>
                        @endif
                    </div>
                    <div class="pt-5 ">
                        <div style=" height:100vh;">
                            <h5 class="text-center"> Thống kê tồn kho sản phẩm (số lượng)</h5>
                            <canvas class="mb-5" id="myChart" ></canvas>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    const ctx = document.getElementById('myChart');
    

    var dateArray = @json($name_product);
    var countData = @json($quantity);
  

   
    new Chart(ctx, {
    type: 'bar',
    data: {
        labels: dateArray, // Mảng chứa tên cột
        datasets: [{
            label: 'Thống kê theo sản phẩm bán chạy theo số lượng',
            data: countData,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            x: {
                ticks: {
                    callback: function(value, index, values) {
                        let label = this.getLabelForValue(value);
                        return label.length > 20 ? label.substring(0, 20) + '...' : label;
                    }
                }
            },
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            tooltip: {
                callbacks: {
                    title: function(tooltipItems) {
                        // Hiển thị đầy đủ tên cột trong tooltip
                        return tooltipItems[0].label;
                    }
                }
            }
        }
    }
});

            
    </script>

@endsection