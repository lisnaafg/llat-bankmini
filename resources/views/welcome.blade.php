<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome - Bank Mini</title>

    <!-- Internal CSS -->
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Hero Section */
        .hero-section {
            background: url('https://source.unsplash.com/1600x900/?bank,finance') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        }

        .hero-content {
            max-width: 600px;
            text-align: center;
        }

        .hero-content h1 {
            font-size: 4rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #ff66b2; /* Pink Color */
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: #ffffff;
        }

        .hero-buttons .btn {
            margin: 10px;
            padding: 15px 30px;
            font-size: 1.1rem;
            border-radius: 30px;
            transition: all 0.3s ease;
        }

        /* Buttons Styling */
        .hero-buttons .btn-login {
            background-color: #ff66b2; /* Pink Color */
            border-color: #ff66b2;
        }

        .hero-buttons .btn-login:hover {
            background-color: #e50091;
            border-color: #e50091;
        }

        .hero-buttons .btn-signup {
            background-color: transparent;
            border: 2px solid #ff66b2;
            color: #ff66b2;
        }

        .hero-buttons .btn-signup:hover {
            background-color: #ff66b2;
            color: white;
        }

        /* Footer */
        footer {
            background-color: #343a40;
        }

        footer p {
            font-size: 0.9rem;
            color: #adb5bd;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }

            .hero-content p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container text-center">
            <div class="hero-content">
                <h1>Welcome to Bank Mini</h1>
                <p>Your easy and reliable banking solution.</p>
                <div class="hero-buttons">
                    <a href="/login" class="btn btn-login btn-lg">Login</a>

                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center py-4 bg-dark text-light">
        <p>&copy; 2025 Bank Mini. All rights reserved.</p>
    </footer>

</body>
</html>
