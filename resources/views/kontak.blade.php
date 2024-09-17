<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami</title>
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/404/404621.png">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f1f4f9;
            margin: 0;
        }

        .contact-header {
            background-color: #007bff;
            padding: 60px 0;
            color: white;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .contact-header h1 {
            font-size: 2.8rem;
            font-weight: bold;
            letter-spacing: 1.5px;
        }

        .contact-info {
            margin: 50px 0;
            display: flex;
            justify-content: space-around;
            gap: 30px;
        }

        .contact-info div {
            background-color: #ffffff;
            padding: 30px 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            transition: transform 0.3s ease;
        }

        .contact-info div:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }

        .contact-info i {
            font-size: 3rem;
            margin-bottom: 15px;
            color: #007bff;
        }

        .contact-info h4 {
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        .contact-info p {
            margin-bottom: 0;
            font-size: 1.1rem;
            color: #555;
        }

        .form-section {
            padding: 50px 0;
            background-color: #f9f9f9;
        }

        .form-control,
        .btn {
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
            border-radius: 12px;
            overflow: hidden;
        }

        footer {
            background-color: #f8f9fa;
            padding: 30px 0;
        }

        footer p {
            margin-bottom: 5px;
            color: #777;
        }

        footer a {
            text-decoration: none;
            color: #007bff;
        }

        footer a:hover {
            text-decoration: underline;
        }

        .btn-success {
            border-radius: 20px;
            padding: 10px 20px;
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
                gap: 15px;
            }

            .contact-header h1 {
                font-size: 2.2rem;
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
                <p><a href="mailto:EXAMPLE@gmail.com">EXAMPLE@gmail.com</a></p>
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
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3877436267794!2d106.94278977482901!3d-6.212484593775434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698b61120bc16d%3A0x491d2682f185dbbd!2sWalikota%20Jakarta%20Timur!5e0!3m2!1sen!2sid!4v1726101444223!5m2!1sen!2sid"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
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
</body>

</html>
