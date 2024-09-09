<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chart Jumlah Pencari Kerja yang Belum Ditempatkan Menurut Golongan Jabatan dan Jenis Kelamin di Kota Jakarta
        Timur, 2020</title>
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/404/404621.png">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            fetch('/jabatan-data')
                .then(response => response.json())
                .then(responseData => {
                    const dataArray = [
                        ['Jabatan', 'Laki-Laki', 'Perempuan']
                    ];

                    responseData.forEach(row => {
                        dataArray.push([row.jabatan, row.laki_laki, row.perempuan]);
                    });

                    const data = google.visualization.arrayToDataTable(dataArray);

                    var options = {
                        title: 'Jumlah Pencari Kerja Belum Ditempatkan Berdasarkan Golongan Jabatan dan Jenis Kelamin di Jakarta Timur, 2020',
                        vAxis: {
                            title: 'Jumlah'
                        },
                        hAxis: {
                            title: 'Jabatan',
                            textStyle: {
                                fontSize: 12
                            }
                        },
                        isStacked: true,
                        legend: 'top',
                        colors: ['#1b9e77', '#d95f02'],
                        chartArea: {
                            width: '80%',
                            height: '70%',
                            left: 80, 
                            bottom: 100 
                        }
                    };

                    var chart = new google.visualization.SteppedAreaChart(document.getElementById('chart_div'));
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
                            <td>
                                <button class="btn btn-warning btn-sm" onclick="editRow(${item.id}, '${item.jabatan}', ${item.laki_laki}, ${item.perempuan})">Ubah</button>
                                <button class="btn btn-danger btn-sm" onclick="deleteRow(${item.id})">Hapus</button>
                            </td>
                        `;
                        tableBody.appendChild(row);
                    });
                });
        }

        function editRow(id, jabatan, laki_laki, perempuan) {
            document.getElementById('jabatan').value = jabatan;
            document.getElementById('laki').value = laki_laki;
            document.getElementById('perempuan').value = perempuan;
            document.getElementById('saveData').dataset.id = id;

            document.getElementById('modalTitle').innerText = 'Ubah Data';
            document.getElementById('saveData').innerText = 'Perbarui';

            $('#addDataModal').modal('show');
        }

        function deleteRow(id) {
            fetch('/delete-jabatan-data', {
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
                            body: JSON.stringify({
                                id,
                                jabatan,
                                laki_laki,
                                perempuan
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
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            margin-top: 30px;
        }

        #chart_div {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .table {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            text-align: center;
            vertical-align: middle;
        }

        thead {
            background-color: #007bff;
            color: #fff;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .btn-primary,
        .btn-warning,
        .btn-danger {
            border-radius: 20px;
            padding: 5px 15px;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .modal-header,
        .modal-footer {
            background-color: #f8f9fa;
        }

        .modal-content {
            border-radius: 8px;
        }

        .modal-header h5 {
            color: #007bff;
        }
    </style>
</head>

<body>
    <p align="center"><a href="{{ url('/admin1') }}"><button class="btn-success btn mt-2">Chart pertama</button></a></p>
    <div class="container mt-5">
        <form action="{{ url('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-warning mb-3">Keluar</button>
        </form>
        <div id="chart_div" class="chart" style="width: 100%; height: 500px;"></div>
        <p align="center">Sumber/Source: Dinas Tenaga Kerja dan Transmigrasi Provinsi DKI Jakarta/Manpower and
            Transmigration Office of DKI Jakarta Province</p>
        <div class="text-center mt-4">
            <button class="btn btn-success" id="downloadChartBtn">Simpan statistik sebagai PDF</button>
        </div>
        <div class="pdf">
            <div class="table-responsive mt-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Jabatan</th>
                            <th>Laki-Laki</th>
                            <th>Perempuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="dataTableBody">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="text-center mt-1">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDataModal">
            Tambah Data
        </button>
    </div>

    <div class="text-center mt-4">
        <button class="btn btn-success" id="downloadTableBtn">Simpan tabel sebagai PDF</button>
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
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" placeholder="Masukkan Jabatan">
                        </div>
                        <div class="form-group">
                            <label for="laki">Laki-Laki</label>
                            <input type="number" class="form-control" id="laki"
                                placeholder="Masukkan Jumlah Laki-Laki">
                        </div>
                        <div class="form-group">
                            <label for="perempuan">Perempuan</label>
                            <input type="number" class="form-control" id="perempuan"
                                placeholder="Masukkan Jumlah Perempuan">
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

    <footer class="bg-light text-center text-lg-start mt-4">
        <div class="container p-4">
            <p>&copy; 2024 Grafik Jumlah Pencari Kerja yang Belum Ditempatkan</p>
            <p>Didukung oleh <a href="https://developers.google.com/chart" target="_blank">Google Charts</a></p>
        </div>
    </footer>

    <script>
        document.getElementById('downloadChartBtn').addEventListener('click', function() {
            var element = document.querySelector('.chart');
            html2pdf().from(element).set({
                margin: 0.2,
                filename: 'Chart_Pencari_Kerja_yang_Belum_Ditempatkan.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2,
                    width: 1100
                },
                jsPDF: {
                    orientation: 'landscape',
                    unit: 'in',
                    format: 'letter',
                    compressPDF: true
                }
            }).save();
        });

        document.getElementById('downloadTableBtn').addEventListener('click', function() {
            var element = document.querySelector('.pdf');
            html2pdf().from(element).set({
                margin: 0.2,
                filename: 'Tabel_Pencari_Kerja_yang_Belum_Ditempatkan.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2,
                },
                jsPDF: {
                    orientation: 'portrait',
                    unit: 'in',
                    format: 'letter',
                    compressPDF: true
                }
            }).save();
        });
    </script>
    <script src = "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js">
        < /body>

        <
        /html>
