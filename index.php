<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Blood Bank System</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- Particles JS -->
    <script src="https://cdn.jsdelivr.net/npm/particles.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            overflow: hidden;
            color: white;
            text-align: center;
        }

        /* 🌈 ANIMATED RED BACKGROUND */
        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, #ff0000, #8b0000, #b22222, #ff4d4d);
            background-size: 400% 400%;
            animation: bgMove 8s ease infinite;
            z-index: -1;
        }

        @keyframes bgMove {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }

        /* 🔥 LOGO */
        .logo {
            margin-top: 40px;
            font-size: 55px;
            font-weight: bold;
            position: relative;
            display: inline-block;
            animation: glow 1.5s infinite alternate;
        }

        @keyframes glow {
            from { text-shadow: 0 0 10px red; }
            to { text-shadow: 0 0 40px #ff4d4d, 0 0 60px darkred; }
        }

        /* ✨ SHINE EFFECT */
        .logo::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, transparent, rgba(255,255,255,0.8), transparent);
            animation: shine 3s infinite;
        }

        @keyframes shine {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        /* ✍ TYPING TEXT */
        .typing {
            font-size: 20px;
            margin-top: 10px;
            height: 25px;
            color: #ffe6e6;
        }

        /* 🧊 CARDS */
        .container {
            display: flex;
            justify-content: center;
            margin-top: 80px;
            gap: 40px;
            flex-wrap: wrap;
        }

        .card {
            background: rgba(255,255,255,0.08);
            backdrop-filter: blur(15px);
            padding: 30px;
            width: 230px;
            border-radius: 20px;
            transition: 0.4s;
            cursor: pointer;
            border: 1px solid rgba(255,255,255,0.2);
            box-shadow: 0 0 20px rgba(255,0,0,0.3);
        }

        .card:hover {
            transform: translateY(-15px) scale(1.08);
            background: rgba(255,255,255,0.2);
            box-shadow: 0 0 40px red;
        }

        .card h3 {
            margin-bottom: 10px;
            font-size: 22px;
        }

        .card p {
            font-size: 14px;
        }
    </style>
</head>

<body>

<div id="particles-js"></div>

<!-- 🔴 LOGO -->
<div class="logo">🩸 Blood Bank</div>

<!-- ✍ TEXT -->
<div class="typing" id="typing"></div>

<!-- 🧊 CARDS -->
<div class="container">

    <div class="card" onclick="location.href='donor.php'">
        <h3>👤 Donor</h3>
        <p>Register & View Donors</p>
    </div>

    <div class="card" onclick="location.href='request.php'">
        <h3>🩸 Request</h3>
        <p>Request Blood</p>
    </div>

    <div class="card" onclick="location.href='admin.php'">
        <h3>⚙ Admin</h3>
        <p>Manage System</p>
    </div>

</div>

<script>
/* PARTICLES */
particlesJS("particles-js", {
    particles: {
        number: { value: 60 },
        size: { value: 3 },
        move: { speed: 2 },
        line_linked: { enable: true }
    }
});

/* ✍ TYPING EFFECT */
const text = "🩸 Save Lives • Donate Blood • Be a Hero ❤️";
let i = 0;

function typing() {
    if (i < text.length) {
        document.getElementById("typing").innerHTML += text.charAt(i);
        i++;
        setTimeout(typing, 40);
    }
}
typing();
</script>

</body>
</html>