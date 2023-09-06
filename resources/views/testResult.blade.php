<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <style>
        #userNewLineChart {
            background-color: #fff;
            border-radius: 15px;
        }

        #revenueLineChart {
            background-color: #fff;
            border-radius: 15px;
        }
    </style>
</head>

<body>
    <div class="lineChart">
        <div class="card-body">
            <canvas id=userNewLineChart></canvas>
        </div>
        <div class="card-body">
            <canvas id=revenueLineChart></canvas>
        </div>
    </div>

    <script>
        // lineChart
        // 將API透過controller處理過後傳來之array轉為json給JS用
        const userNewData = <?php echo json_encode($jsonUserNew); ?>;
        console.log('userNewData:', userNewData);

        // 創userNewLineChart結構
        const userNewLineChart = new Chart($('#userNewLineChart'), {
            data: {
                labels: , // X軸座標值
                datasets: [{
                        label: , // data命名
                        type: ,
                        data: ,
                        backgroundColor: ,
                        borderColor: ,
                        pointBorderColor: ,
                        pointBackgroundColor: ,
                        fill: ,
                        lineTension: 0,
                    },
                    {
                        label: , // data命名
                        type: ,
                        data: ,
                        backgroundColor: ,
                        borderColor: ,
                        pointBorderColor: ,
                        pointBackgroundColor: ,
                        fill: , 
                        lineTension: 0,
                    },
                ],
            },
            options: {
                title:,
                maintainAspectRatio:, 
                legend:, // 線圖是否顯示
                scales:, // 座標刻度單位

            },
        })
    </script>

</body>

</html>
