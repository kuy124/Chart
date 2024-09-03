<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/404/404621.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #00b3a4, #003d75);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #fff;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            max-width: 400px;
            width: 100%;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            color: #fff;
            margin-bottom: 1.5rem;
            font-size: 2rem;
            text-align: center;
            font-weight: 700;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 1rem;
            font-weight: 500;
        }

        .form-group input {
            width: 94%;
            padding: 0.75rem;
            border: none;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .form-group input:focus {
            background: rgba(255, 255, 255, 0.4);
            outline: none;
        }

        .form-group button {
            width: 100%;
            padding: 0.75rem;
            border: none;
            border-radius: 8px;
            background-color: #00b3a4;
            color: #fff;
            font-size: 1.2rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .form-group button:hover {
            background-color: #008579;
            transform: translateY(-2px);
        }

        .back {
            width: 100%;
            padding: 0.75rem;
            border: none;
            border-radius: 8px;
            background-color: #630000;
            color: #fff;
            font-size: 1.2rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .back:hover {
            background-color: #8b0000;
            transform: translateY(-2px);
        }

        .error-message {
            color: #ff4c4c;
            margin-top: 1rem;
            text-align: center;
            font-weight: 600;
        }

        @media (max-width: 600px) {
            .login-container {
                padding: 1.5rem;
                max-width: 90%;
            }

            h1 {
                font-size: 1.75rem;
            }

            .form-group input {
                padding: 0.6rem;
            }

            .form-group button, .back {
                padding: 0.6rem;
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h1>Masuk</h1>
        @if ($errors->any())
            <div class="error-message">
                @foreach ($errors->all() as $error)
                    <p>Email atau kata sandi yang Anda masukkan tidak sesuai. Mohon periksa kembali dan coba lagi.</p>
                @endforeach
            </div>
        @endif
        <form method="POST" action="{{ url('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Sandi</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="button">Masuk</button>
            </div>
        </form>
        <a href="{{ url('') }}" style="text-decoration: none;">
            <button class="back">Kembali</button>
        </a>
    </div>
</body>

</html>
