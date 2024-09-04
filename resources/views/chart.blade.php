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
                    <td>
                        <button class="btn btn-warning btn-sm" onclick="editRow(${item.id}, '${item.year}', ${item.sales}, ${item.expenses})">Ubah</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteRow(${item.id})">Hapus</button>
                    </td>
                `;
                        tableBody.appendChild(row);
                    });
                });
        }

        function editRow(id, year, sales, expenses) {
            document.getElementById('year').value = year;
            document.getElementById('sales').value = sales;
            document.getElementById('expenses').value = expenses;
            document.getElementById('saveData').dataset.id = id;

            document.getElementById('modalTitle').innerText = 'Ubah Data';
            document.getElementById('saveData').innerText = 'Perbarui';

            $('#addDataModal').modal('show');
        }

        function deleteRow(id) {
            fetch('/delete-chart-data', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    drawChart();
                    fetchTableData();
                })
                .catch(error => console.error('Error:', error));
        }

        document.addEventListener('DOMContentLoaded', function() {
            fetchTableData();

            $('#addDataModal').on('hidden.bs.modal', function() {
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
    <style>
        p {
            font-size: 10px;
            padding-top: 5px;
            padding-bottom: 10px;
        }
    </style>
</head>

<body>
    <p align="center"><a href="{{ url('/admin2') }}"><button class="btn-success btn mt-2">Chart kedua</button></a></p>
    <div class="container mt-5">
        <form action="{{ url('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-warning mb-3">Keluar</button>
        </form>
        <div id="curve_chart" style="width: 100%; height: 500px"></div>
        <p align="center">Sumber/Source: Dinas Kependudukan dan Catatan Sipil Provinsi DKI Jakarta/Civil Registration Service of DKI Jakarta Province</p>

        <div class="text-center mt-1">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDataModal">
                Tambah Data
            </button>
        </div>

        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Bulan</th>
                        <th>Kelahiran</th>
                        <th>Kematian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="dataTableBody">

                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="dataForm">
                        <div class="form-group">
                            <label for="year">Bulan</label>
                            <input type="text" class="form-control" id="year" placeholder="Masukkan Bulan">
                        </div>
                        <div class="form-group">
                            <label for="sales">Kelahiran</label>
                            <input type="number" class="form-control" id="sales" placeholder="Masukkan Kelahiran">
                        </div>
                        <div class="form-group">
                            <label for="expenses">Kematian</label>
                            <input type="number" class="form-control" id="expenses" placeholder="Masukkan Kematian">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        id="closeModals">Tutup</button>
                    <button type="button" class="btn btn-primary" id="saveData">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
