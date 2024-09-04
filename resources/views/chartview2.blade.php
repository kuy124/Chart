<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chart Jumlah Pencari Kerja yang Belum Ditempatkan Menurut Golongan Jabatan dan Jenis Kelamin di Kota Jakarta Timur, 2020</title>
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/404/404621.png">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            fetch('/jabatan-data')
                .then(response => response.json())
                .then(responseData => {
                    const data = new google.visualization.DataTable();
                    data.addColumn('string', 'Jabatan');
                    data.addColumn('number', 'Laki-Laki');
                    data.addColumn('number', 'Perempuan');

                    responseData.forEach(row => {
                        data.addRow([row.jabatan, row.laki_laki, row.perempuan]);
                    });

                    const options = {
                        title: 'Jumlah Pencari Kerja yang Belum Ditempatkan Menurut Golongan Jabatan dan Jenis Kelamin di Kota Jakarta Timur, 2020',
                        hAxis: { title: 'Jabatan' },
                        vAxis: { title: 'Jumlah' },
                        legend: { position: 'right' },
                        isStacked: false,
                        colors: ['#1b9e77', '#d95f02'],
                        chartArea: { width: '100%', height: '70%' }
                    };

                    const chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
                    chart.draw(data, options);

                    window.addEventListener('resize', function() {
                        chart.draw(data, options);
                    });
                });
        }

        function fetchTableData() {
            fetch('/jabatan-data')
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('dataTableBody');
                    tableBody.innerHTML = '';

                    data.forEach(item => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${item.id}</td>
                            <td>${item.jabatan}</td>
                            <td>${item.laki_laki}</td>
                            <td>${item.perempuan}</td>
                        `;
                        tableBody.appendChild(row);
                    });
                });
        }

        document.addEventListener('DOMContentLoaded', function() {
            fetchTableData();

            $('#addDataModal').on('hidden.bs.modal', function() {
                location.reload();
            });

            document.getElementById('saveData').addEventListener('click', function() {
                const id = this.dataset.id || '';
                const jabatan = document.getElementById('jabatan').value;
                const laki_laki = document.getElementById('laki').value;
                const perempuan = document.getElementById('perempuan').value;

                if (jabatan && laki_laki && perempuan) {
                    const url = id ? '/update-jabatan-data' : '/add-jabatan-data';
                    fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ id, jabatan, laki_laki, perempuan })
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
    <p align="center"><a href="{{ url('/') }}"><button class="btn-success btn mt-2">Chart pertama</button></a></p>
    <div class="container mt-5">
        <a href="{{ url('login') }}" class="btn btn-warning mb-3">Masuk</a>
        <div id="chart_div" style="width: 100%; height: 500px;"></div>

        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Jabatan</th>
                        <th>Laki-Laki</th>
                        <th>Perempuan</th>
                    </tr>
                </thead>
                <tbody id="dataTableBody">

                </tbody>
            </table>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
