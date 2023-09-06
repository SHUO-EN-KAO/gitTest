<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script> --}}

    <script src="//cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

    <style>
        #userNewLineChart {
            height: 245px;
            background-color: #fff;
            border-radius: 15px;
        }

        #revenueLineChart {
            height: 245px;
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

        // userNewLineChart之X軸定義
        const hourLabels = [];
        for (let i = 0; i < 24; i++) {
            hourLabels.push(i);
        }
        console.log('hourLabels:', hourLabels);

        // userNewLineChart之androidUserCount之data定義
        const androidUserCount = userNewData['data']['statistics'][0]['userCount'];
        console.log('androidUserCount:', androidUserCount);

        // userNewLineChart之iOSUserCount之data定義
        const iOSUserCount = userNewData['data']['statistics'][1]['userCount'];
        console.log('iOSUserCount:', iOSUserCount);

        // 創userNewLineChart結構
        let userNewLineChart = new Chart($('#userNewLineChart'), {
            data: {
                labels: hourLabels, // X軸座標值
                datasets: [{
                        label: 'AndroidUser', // data命名
                        type: 'line',
                        data: androidUserCount,
                        backgroundColor: 'transparent',
                        borderColor: '#B39A02',
                        pointBorderColor: '#B39A02',
                        pointBackgroundColor: '#B39A02',
                        fill: false,
                        lineTension: 0,
                    },
                    {
                        label: 'iOSUser', // data命名
                        type: 'line',
                        data: iOSUserCount,
                        backgroundColor: 'transparent',
                        borderColor: '#1500B3',
                        pointBorderColor: '#1500B3',
                        pointBackgroundColor: '#1500B3',
                        fill: false,
                        lineTension: 0,
                    },
                ],
            },
            options: {
                title: {
                    display: true,
                    text: 'New User',
                    fontSize: 18,
                    fontStyle: 'bold',
                    padding: 0
                },
                maintainAspectRatio: false,

                // 線圖是否顯示
                legend: {
                    display: false
                },

                // 座標刻度單位
                scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'userCount'
                        }
                    }],
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'hour'
                        }
                    }]
                },
            },
        });

    </script>

</body>

</html>
