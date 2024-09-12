<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .contact-header {
            background-color: #007bff;
            padding: 50px 0;
            color: white;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .contact-header h1 {
            font-size: 2.5rem;
        }

        .contact-info {
            margin-bottom: 50px;
            display: flex;
            justify-content: space-around;
            gap: 30px;
        }

        .contact-info i {
            font-size: 3rem;
            transition: transform 0.3s ease;
        }

        .contact-info i:hover {
            transform: scale(1.1);
            color: #0056b3;
        }

        .contact-info h4 {
            margin-top: 15px;
            font-weight: bold;
        }

        .form-section {
            background-color: #f8f9fa;
            padding: 50px 0;
            box-shadow: inset 0 -5px 10px rgba(0, 0, 0, 0.1);
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
            margin-top: 50px;
        }

        .mapouter {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .mapouter iframe {
            border-radius: 10px;
        }

        footer {
            padding: 30px 0;
        }

        footer a {
            text-decoration: underline;
        }

        .btn-success {
            border-radius: 20px;
            padding: 5px 15px;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-success:hover {
            background-color: #28a745;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .contact-info {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>
<body>

<header class="contact-header text-center">
    <div class="container">
        <h1>Kontak Kami</h1>
        <p>Kami siap membantu Anda. Hubungi kami melalui salah satu saluran di bawah ini.</p>
    </div>
</header>

<section class="container my-5">
    <div class="row contact-info text-center">
        <div class="col-md-4">
            <i class="bi bi-telephone-fill" aria-hidden="true" title="Telepon Kami"></i>
            <h4>Telepon</h4>
            <p>0812-3456-7890</p>
        </div>
        <div class="col-md-4">
            <i class="bi bi-envelope-fill" aria-hidden="true" title="Kirim Email"></i>
            <h4>Email</h4>
            <p><a href="mailto:kun.faris.7d@gmail.com">kun.faris.7d@gmail.com</a></p>
        </div>
        <div class="col-md-4">
            <i class="bi bi-geo-alt-fill" aria-hidden="true" title="Kunjungi Lokasi"></i>
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

<div class="text-center mt-4 mb-4">
    <button class="btn btn-success" onclick="window.history.back()">Kembali</button>
</div>

<footer class="text-center">
    <div class="container">
        <p>&copy; 2024 Jakarta Timur</p>
        <p>Didukung oleh <a href="https://developers.google.com/chart" target="_blank">Google Charts</a></p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
</body>
</html>
