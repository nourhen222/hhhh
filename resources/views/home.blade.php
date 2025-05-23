<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Plateforme de doléances</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <link rel="icon" type="image/png" href="{{ asset('images/Sonatrachh.png') }}">

  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: white;
    }
    header {
      display: flex;
      align-items: center;
      padding: 10px 3%;
      background-color: #fdccaa87;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 20px 20px 20px 20px;
      width: 90%;
      margin: 20px 20px 0 20px;
    }

    header img {
      height: 60px;
    }
    header nav a::after {
  content: '';
  display: block;
  width: 0;
  height: 2px;
  background: #fd8531;
  transition: width 0.3s;
  position: absolute;
  bottom: -4px;
  left: 0;
}

header nav a:hover::after {
  width: 100%;
}


    .container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 40px 5% 0;
      min-height: calc(100vh - 60px); /* 100% height minus header */
    }

    .left {
      max-width: 40%;
      margin-top: -130px;
      margin-left : 40px;
    }

    .slogan {
      font-size: 3.5em;
      font-weight: bold;
      color: black;
      margin-bottom: 0.5px;
      margin-top: 10px;
    }

    .slogan span {
      color: #fd8531;
    }

    .subtitle {
      font-family: 'Roboto Slab', serif;
      font-size: 0.95em;
      color: #555;
      margin-bottom: 30px;
      text-transform: lowercase;
      letter-spacing: 0.5px;
    }

    .btn-group a {
      min-width: 120px;
      text-align: center;
    }

    .btn {
      background-color: #fd8531;
      border: none;
      padding: 12px 25px;
      color: white;
      font-size: 1em;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
      position: relative;
      top: 0;
      left: 0;
      transition: background-color 0.3s ease;
      margin-left : 15px;
    }

    .btn.secondary {
      background-color: transparent;
      color: #fd8531;
      border: 2px solid #fd8531;
    }

    .btn:hover {
      background-color: #e76f15;
    }

    .btn.secondary:hover {
      background-color: #fd8531;
      color: white;
    }

    .right img {
      max-width: 500px;
      height: auto;
      margin-top: -20px;
      margin-right: -20px;
    }

  





    /* About Us */
    #about-us {
      background-color: #ffffff;
      color: white;
      padding: 50px 0;
    }

    .about-content {
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  width: 85%;
  margin: 0 auto;
  gap: 80px; /* ✅ ajoute de l'espace entre l'image et le texte */
}


    .about-image {
      flex: 1;
      text-align: left;
      min-width: 300px;
    }
    .about-image img {
  width: 130%;
  margin-top: -150px; /* ✅ Monte l'image encore plus haut */
  margin-left: -70px;
  border-radius: 10px;
}


    .about-text {
  flex: 1;
  padding-left: 70px;
  min-width: 300px;
  margin-top: -110px; /* ⬅️ monte le texte seulement */
}


    .about-text h2 {
      font-size: 2.5rem;
      font-weight: bold;
      margin-bottom: 50px;
      color: #fd8531;
      font-family: 'Roboto Slab', serif;
      letter-spacing: 1px;
    }

    .about-text p {
      font-size: 1.1rem;
      line-height: 1.8;
      color: white;
      font-family: 'Arial', sans-serif;
    }

    /* New Style to match slogan */
    .about-text h2 {
  font-size: 3.5em;
  font-weight: bold;
  color: black;
  margin-bottom: 0.5px;
  margin-top: 10px;
  font-family: Arial, sans-serif; /* ✅ même que le slogan */
}


    .about-text h2 span {
      color: #fd8531; /* Same orange color as in the slogan */
    }

    .about-text p {
      font-family: 'Roboto Slab', serif; /* Same font as slogan */
      font-size: 1.1rem;
      line-height: 1.8;
      color: #555;
      margin-top: 10px;
    }

    html {
      scroll-behavior: smooth;
    }
    .footer {
  background-color: #fdccaa87;
  padding: 20px 5%;
  border-top: 1px solid #ddd;
  margin-bottom: 10px;
}

.footer-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
}

.footer-left {
  display: flex;
  align-items: center;
}

.footer-logo {
  height: 60px;
  margin-right: 15px;
}

.footer-text {
  display: flex;
  flex-direction: column;
}

.footer-line1 {
  font-size: 16px;
  margin: 0;
  color: #111;
}

.footer-line2 {
  font-size: 18px;
  font-weight: 600;
  color: #111;
  margin: 2px 0;
}

.footer-bar {
  width: 150px;
  height: 5px;
  background-color: #fd8531;
  margin-top: 5px;
}

.footer-right {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-top: 10px;
}

.footer-right p {
  margin: 0;
  color: #333;
  font-size: 15px;
}

.social-icon {
  display: inline-block;
  color: white;
  background-color: gray;
  border-radius: 50%;
  width: 28px;
  height: 28px;
  text-align: center;
  line-height: 28px;
  font-size: 14px;
}

.social-icon.facebook {
  background-color: #1877F2;
}

.social-icon.youtube {
  background-color: #FF0000;
}


  </style>
</head>
<body>

<header style="display: flex; align-items: center; justify-content: space-between; padding: 1rem 2rem; ">
    <div style="display: flex; align-items: center; gap: 1rem;">
        <img src="{{ asset('images/sonatrach-logo.svg') }}" alt="Logo Sonatrach" style="height: 50px;">
    </div>
    <nav style="display: flex; gap: 3rem;">
       
        <a href="#about-us" style="text-decoration: none; color: #333; font-weight: 800; position: relative;">
            À propos
        </a>
        <a href="#footer " style="text-decoration: none; color: #333; font-weight: 800; position: relative;">
            Contact
        </a>
        <a href="{{ route('login') }}" style="text-decoration: none; color: #333; font-weight: 800; position: relative;">
            Se connecter    
        </a>
    </nav>
</header>


  <!-- Contenu principal -->
<div class="container">
  <div class="left">
    <div class="slogan"><span>Votre voix</span><br>Notre priorité.</div>
    <p class="subtitle">
      "Un site professionnel pour chaque employé, où vous pouvez soumettre, suivre et consulter l’évolution de vos doléances en toute transparence."
    </p>
    <div class="btn-group">
      <a href="{{ route('login') }}" class="btn">Se connecter</a>
      <a href="#about-us" class="btn secondary">À propos de nous</a>
    </div>
  </div>

  <div class="right">
    <img src="{{ asset('images/home.png') }}" alt="Illustration">
  </div>
</div>
<!-- Section Actualités -->
<section id="news" style="background-color:#ffffff; padding: 60px 20px;">
  <h2 style="text-align: center; font-size: 2em; margin-bottom: 40px; color: #fd8531;">Dernières actualités</h2>
  <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 40px; max-width: 1100px; margin: auto;">
    
    <div style="background-color: #fff0e5; padding: 20px; border-radius: 10px; width: 300px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
      <h3 style="color: #333;">📢 Lancement du nouveau système</h3>
      <p style="color: #555;">Nous sommes fiers d'annoncer le lancement officiel de notre plateforme de doléances. Découvrez ses fonctionnalités dès aujourd’hui !</p>
    </div>

    <div style="background-color: #fff0e5; padding: 20px; border-radius: 10px; width: 300px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
      <h3 style="color: #333;">📊 Mise à jour des statistiques</h3>
      <p style="color: #555;">Nos indicateurs de performance ont été actualisés. Consultez le taux de satisfaction et le nombre de doléances traitées !</p>
    </div>

    <div style="background-color: #fff0e5; padding: 20px; border-radius: 10px; width: 300px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
      <h3 style="color: #333;">👥 Nouvelle commission ajoutée</h3>
      <p style="color: #555;">Une nouvelle commission spécialisée a été constituée pour répondre plus efficacement aux doléances des employés.</p>
    </div>

  </div>
</section>

<!-- Section À propos de nous -->
<section id="about-us">
  <div class="container about-content">
    <div class="about-image">
      <img src="{{ asset('images/home2.png') }}" alt="Illustration du service">
    </div>
    <div class="about-text">
       <h2 id="about-title"><span>À propos</span><br> De nous</h2>
 <p>
  Cette plateforme a été conçue pour renforcer le dialogue interne et améliorer la communication entre les employés et les représentants syndicaux. 
  Elle permet un traitement structuré et confidentiel des doléances, tout en assurant un suivi rigoureux à chaque étape.
</p>

    </div>
  </div>
</section>
<footer id= "footer" class="footer">
  <div class="footer-container">
    <!-- Partie gauche : logo + texte -->
    <div class="footer-left">
      <img src="{{ asset('images/sonatrach-logo.svg') }}" alt="Logo Sonatrach" class="footer-logo">
      <div class="footer-text">
        <p class="footer-line1">L’Énergie pour un</p>
        <p class="footer-line2">
          <strong>Développement</strong> Durable
        </p>
        <div class="footer-bar"></div>
      </div>
    </div>

    <!-- Partie droite : réseaux sociaux -->
    <div class="footer-right">
  <p>Suivez-nous sur :</p>
  <a href="https://www.facebook.com/SONATRACH/" class="social-icon facebook" target="_blank" rel="noopener">
    <i class="fab fa-facebook-f"></i>
  </a>
  <a href="https://www.youtube.com/channel/UCNZPL_sNE1nQ2azMKyZX3xQ" class="social-icon youtube" target="_blank" rel="noopener">
    <i class="fab fa-youtube"></i>
  </a>
</div>

  </div>
</footer>

</body>
</html> 