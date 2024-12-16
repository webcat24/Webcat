<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8"/>
	<title><?= $title ?></title>

	<!-- Styles CSS -->
	<link rel="stylesheet" href="Content/css/plugin_theme_css.css"> <!-- CSS des plugins -->
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"> <!-- Swiper CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet"> <!-- Icones -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<!-- CSS de Venobox -->
	<link rel="stylesheet" href="https://unpkg.com/venobox@1.9.1/venobox.min.css" />
	<link rel="stylesheet" href="Content/css/stylesheet.css"> <!-- Votre CSS personnalisé -->



</head>
<body class="base">
	<script src="Content/js/footer.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
		
	<nav class="navbar navbar-expand-lg header-custom">
    	<div class="container-fluid d-flex flex-column align-items-center">
      	<!-- Logo au centre -->
      		<a class="navbar_logo" href="?controller=accueil&action=accueil">
				<img src="Content/img/logo_long.png" alt="Logo" class="img-fluid" style="max-width: 150px;"/>
			</a>

      		<!-- Menu en dessous -->
      		<div class="collapse navbar-collapse mt-2" id="navbarNavDropdown">
        		<ul class="navbar-nav d-flex justify-content-center w-100">
          			<li class="nav-item">
            			<a class="nav-link active" aria-current="page" href="?controller=accueil&action=accueil">Accueil</a>
          			</li>
          			<li class="nav-item">
            			<a class="nav-link active" aria-current="page" href="?controller=entreprise&action=entreprise">Entreprise</a>
          			</li>
          			<li class="nav-item dropdown">
            			<a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">Inspiration</a>
            			<ul class="dropdown-menu">
              				<li><a class="dropdown-item" href="?controller=palettes&action=palettes">Palettes</a></li>
              				<li><a class="dropdown-item" href="?controller=oeuvres&action=oeuvres">Œuvres</a></li>
            			</ul>
          			</li>
          			<li class="nav-item">
            			<a class="nav-link active" aria-current="page" href="?controller=boutique&action=boutique">Boutique</a>
          			</li>
        		</ul>
      		</div>

      		<!-- Logos user/panier à droite -->
      		<div class="d-flex align-items-center position-absolute top-0 end-0 mt-3 me-4">
        		<a href="?controller=compte&action=compte" class="me-3">
          			<img src="Content/img/user.png" alt="User" style="width: 30px; height: 30px;" />
        		</a>
        		<a href="?controller=compte&action=compte">
          			<img src="Content/img/panier.png" alt="Panier" style="width: 30px; height: 30px;" />
        		</a>
      		</div>

				<!-- Logos user/panier à droite -->
				<div class="d-flex align-items-center position-absolute top-0 end-0 mt-3 me-4">
					<a href="?controller=Connexion&action=connexion" class="me-3">
						<img src="Content/img/user.png" alt="User" style="width: 30px; height: 30px;" />
					</a>
					<a href="?controller=compte&action=compte">
						<img src="Content/img/panier.png" alt="Panier" style="width: 30px; height: 30px;" />
					</a>
				</div>

				<!-- Bouton hamburger -->
				<button class="navbar-toggler position-absolute top-0 start-0 ms-3 mt-3" type="button"
					data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
					aria-expanded="false" aria-label="Toggle navigation">
					<img src="Content/img/icons8-hamburger-menu.png" alt="Menu" style="width: 30px; height: 30px;" />
				</button>

			</div>
		</nav>
	</header>

	<!-- ?controller=Controller_inspiration&action=afficherentreprise -->
