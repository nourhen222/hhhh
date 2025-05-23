<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/Sonatrachh.png">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to bottom, #ffffff, #fef5ef);
            overflow: hidden;
        }

        .home-link {
            position: absolute;
            top: 20px;
            left: 30px;
            z-index: 2;
        }

        .home-link a {
            text-decoration: none;
            color: rgb(0, 0, 0);
            font-weight: bold;
            font-size: 0.95rem;
        }

        .wave-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            z-index: 0;
        }

        .wave-background svg {
            width: 100%;
            height: 100%;
            display: block;
        }

        .content {
            position: relative;
            z-index: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background: white;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.1);
            max-width: 420px;
            width: 100%;
            text-align: center;
        }

        .login-container img {
            max-width: 180px;
        }

        .login-container h2 {
            margin-bottom: 1rem;
            color: #333;
        }

        .login-container input {
            width: 100%;
            padding: 0.9rem;
            margin: 0.6rem 0;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }

        .login-container button {
            width: 70%;
            padding: 0.8rem;
            background-color: #fd8531;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1rem;
            margin-top: 1rem;
            cursor: pointer;
        }

        .login-container button:hover {
            background-color: #e67424;
        }

        .login-container a {
            display: block;
            margin-top: 1rem;
            color: #fd8531;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .login-container a:hover {
            text-decoration: underline;
        }

        /* Pour l'icône */
        .eye-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="home-link">
    <a href="{{ route('home') }}">⬅ Accueil</a>
</div>

<div class="wave-background">
    <svg viewBox="0 0 1440 320" preserveAspectRatio="none">
        <path fill="#fd8531" fill-opacity="1" d="M0,160L80,154.7C160,149,320,139,480,154.7C640,171,800,213,960,218.7C1120,224,1280,192,1360,176L1440,160L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
        <path fill="#fdccaa87" fill-opacity="1" d="M0,192L80,181.3C160,171,320,149,480,149.3C640,149,800,171,960,186.7C1120,203,1280,213,1360,218.7L1440,224L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
        <path fill="#737373" fill-opacity="0.2" d="M0,256L80,234.7C160,213,320,171,480,154.7C640,139,800,149,960,160C1120,171,1280,181,1360,186.7L1440,192L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
    </svg>
</div>

<div class="content">
    <div class="login-container">
        <!-- Logo Sonatrach -->
        <img src="{{ asset('images/sonatrach-logo.svg') }}" alt="Logo Sonatrach" style="height: 80px;">

        <h2>Se connecter</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="E-mail" required>
            
            <div style="position: relative;">
                <input type="password" name="password" id="password" placeholder="Mot de passe" required style="padding-right: 2.5rem;">
                <span onclick="togglePassword()" class="eye-icon">
                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" height="22" viewBox="0 0 24 24" width="22" stroke="gray">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm-3 7c-4.418 0-8-5-8-5s3.582-5 8-5 8 5 8 5-3.582 5-8 5z" />
                    </svg>
                </span>
            </div>

            <button type="submit">CONNEXION</button>
        </form>
    </div>
</div>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById("password");
        const eyeIcon = document.getElementById("eyeIcon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.418 0-8-5-8-5a16.42 16.42 0 013.05-3.338m3.197-2.013A2.988 2.988 0 0112 9c1.657 0 3 1.343 3 3 0 .477-.112.927-.313 1.33M6.202 6.203A10.004 10.004 0 0112 5c4.418 0 8 5 8 5a15.955 15.955 0 01-3.105 3.36M9.88 9.878l4.243 4.243M3 3l18 18" />
            `;
        } else {
            passwordInput.type = "password";
            eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm-3 7c-4.418 0-8-5-8-5s3.582-5 8-5 8 5 8 5-3.582 5-8 5z" />
            `;
        }
    }
</script>

</body>
</html>
