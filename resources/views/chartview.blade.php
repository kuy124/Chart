<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chart Kelahiran dan Kematian di Jakarta Timur tahun 2020</title>
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/404/404621.png">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            fetch('/chart-data')
                .then(response => response.json())
                .then(chartData => {
                    const dataArray = [
                        ['Bulan', 'Kelahiran', 'Kematian']
                    ];
                    chartData.forEach(item => {
                        dataArray.push([item.year, item.sales, item.expenses]);
                    });

                    const data = google.visualization.arrayToDataTable(dataArray);

                    const options = {
                        title: 'Kelahiran dan Kematian di Jakarta Timur tahun 2020 perbulan',
                        legend: {
                            position: 'right'
                        },
                        width: '100%',
                        height: '100%'
                    };

                    const chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
                    chart.draw(data, options);

                    window.addEventListener('resize', function() {
                        chart.draw(data, options);
                    });
                });
        }

        function fetchTableData() {
            fetch('/chart-data')
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('dataTableBody');
                    tableBody.innerHTML = '';

                    data.forEach(item => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                    <td>${item.id}</td> 
                    <td>${item.year}</td>
                    <td>${item.sales}</td>
                    <td>${item.expenses}</td>
                `;
                        tableBody.appendChild(row);
                    });
                });
        }

        document.addEventListener('DOMContentLoaded', function() {
            fetchTableData();

            $('#addDataModal').on('hidden.bs.modal', function () {
                location.reload();
            });

            document.getElementById('saveData').addEventListener('click', function() {
                const id = this.dataset.id || '';
                const year = document.getElementById('year').value;
                const sales = document.getElementById('sales').value;
                const expenses = document.getElementById('expenses').value;

                if (year && sales && expenses) {
                    const url = id ? '/update-chart-data' :
                        '/add-chart-data';
                    fetch(url, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                id,
                                year,
                                sales,
                                expenses
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data);
                            $('#addDataModal').modal('hide');
                            location.reload();
                        })
                        .catch(error => console.error('Error:', error));
                }
            });
        });
    </script>
</head>

<body>
    <p align="center"><a href="{{ url('/2') }}"><button class="btn-success btn mt-2">Chart kedua</button></a></p>
    <div class="container mt-5">
        <a href="{{ url('login') }}" class="btn btn-warning mb-3">Masuk</a> 
        <div id="curve_chart" style="width: 100%; height: 500px"></div>

        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Bulan</th>
                        <th>Kelahiran</th>
                        <th>Kematian</th>
                    </tr>
                </thead>
                <tbody id="dataTableBody">

                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
