<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        .contact-header {
            background-color: #f8f9fa;
            padding: 50px 0;
        }

        .contact-header h1 {
            color: #007bff;
        }

        .contact-info {
            margin-bottom: 30px;
        }

        .form-section {
            background-color: #f8f9fa;
            padding: 50px 0;
        }

        .form-control, .btn {
            border-radius: 0;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .map-container {
            margin-top: 30px;
        }
    </style>
</head>
<body>

<header class="contact-header text-center">
    <div class="container">
        <h1>Kontak Kami</h1>
    </div>
</header>

<section class="container my-5">
    <div class="row contact-info">
        <div class="col-md-4 text-center">
            <i class="bi bi-telephone-fill" style="font-size: 3rem; color: #007bff;"></i>
            <h4>Telepon</h4>
            <p>0812-3456-7890</p>
        </div>
        <div class="col-md-4 text-center">
            <i class="bi bi-envelope-fill" style="font-size: 3rem; color: #007bff;"></i>
            <h4>Email</h4>
            <p>jakarta@email.com</p>
        </div>
        <div class="col-md-4 text-center">
            <i class="bi bi-geo-alt-fill" style="font-size: 3rem; color: #007bff;"></i>
            <h4>Alamat</h4>
            <p>Blok Sadar 2, Jalan Doktor Sumarno Blok Sadar 2 No.1, Penggilingan, Cakung</p>
        </div>
    </div>
</section>

<section class="container map-container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-4">Lokasi Kami</h2>
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3877436267794!2d106.94278977482901!3d-6.212484593775434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698b61120bc16d%3A0x491d2682f185dbbd!2sWalikota%20Jakarta%20Timur!5e0!3m2!1sen!2sid!4v1726101444223!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="text-center mt-4">
    <button class="btn btn-success" onclick="window.history.back()">Kembali</button>
</div>

<footer class="bg-light text-center text-lg-start mt-4">
    <div class="container p-4">
        <p>&copy; 2024 Jakarta Timur</p>
        <p>Didukung oleh <a href="https://developers.google.com/chart" target="_blank">Google Charts</a></p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
