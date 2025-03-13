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
            font-family: 'Arial', sans-serif;
        }

        /* Navbar */
        .navbar {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            padding: 15px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #8b5e22;
            text-transform: uppercase;
        }

        .navbar .nav-links a {
            color: #8b5e22;
            text-decoration: none;
            margin-left: 20px;
            font-weight: bold;
            transition: color 0.3s;
        }

        .navbar .nav-links a:hover {
            color: #b95b1d;
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #b95b1d;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
            background: linear-gradient(135deg, #f5e1c0, #a67b5b);
            overflow: hidden;
            padding: 0 20px;
        }

        .hero-content {
            max-width: 600px;
            position: relative;
            z-index: 2;
            animation: fadeIn 1.5s ease-in-out;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #583b15;
            animation: slideDown 1.5s ease-in-out;
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: #fad09f;
            animation: fadeIn 2s ease-in-out;
        }

        .hero-buttons .btn {
            margin: 10px;
            padding: 15px 30px;
            font-size: 1.1rem;
            border-radius: 30px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Buttons Styling */
        .hero-buttons .btn-login {
            background-color: #8B4513;
            border-color: #b36630;
        }

        .hero-buttons .btn-login:hover {
            background-color: #5a2e0e;
            border-color: #5a2e0e;
            transform: scale(1.05);
        }


    /* Ilustrasi Bank Mini (Sisi Kanan) */
.hero-image {
    position: absolute;
    right: 5%; /* Geser ke kanan */
    top: 50%;
    transform: translateY(-50%);
    width: 300px; /* Ukuran gambar */
    opacity: 0.9;
    animation: float 3s ease-in-out infinite;
}

/* Responsiveness untuk Mobile */
@media (max-width: 768px) {
    .hero-image {
        width: 150px; /* Perkecil ukuran di layar kecil */
        right: 2%;
    }
}


        /* Wave Effect */
        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 200%;
            height: auto;
        }

        /* Footer */
        footer {
            background-color: #c0a08b;
            text-align: center;
            padding: 15px;
            color: #e0c3a0;
        }

         /* Keyframe Animations */
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

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
            100% {
                transform: translateY(0);
            }
        }


        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }

            .hero-content p {
                font-size: 1rem;
            }

            .hero-image {
                width: 150px;
                right: 5%;
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
                    <a href="/login" class="btn btn-login">Login</a>
                </div>
            </div>
        </div>

        <!-- Illustration -->
        <img src="https://cdn-icons-png.flaticon.com/512/2331/2331943.png" class="hero-image" alt="Bank Illustration">

        <!-- Wave Effect -->
        <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="#8B4513" fill-opacity="1" d="M0,160 C360,280 720,280 1080,200 C1300,140 1440,160 1440,160 L1440,320 L0,320 Z"></path>
        </svg>
    </section>

</body>
</html>
