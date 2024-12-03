<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title ?></title>

	<!-- Styles CSS -->
	<link rel="stylesheet" href="Content/css/plugin_theme_css.css"> <!-- CSS des plugins -->
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"> <!-- Swiper CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet"> <!-- Icones -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
	<link rel="stylesheet" href="Content/css/stylesheet.css"> <!-- Votre CSS personnalisé -->



</head>

<body class="base">

	<header class="header">
		<nav class="navbar navbar-expand-lg header-custom">
			<div class="container-fluid d-flex flex-column align-items-center">
				<!-- Logo au centre -->
				<a class="navbar_logo" href="?controller=accueil&action=accueil">
					<img src="Content/img/logo_long.png" alt="Logo" class="img-fluid" style="max-width: 150px;" />
				</a>

				<!-- Menu en dessous -->
				<div class="collapse navbar-collapse mt-2" id="navbarNavDropdown">
					<ul class="navbar-nav d-flex justify-content-center w-100">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page"
								href="?controller=accueil&action=accueil">Accueil</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" aria-current="page"
								href="?controller=Controller_inspiration&action=afficherentreprise">Entreprise</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle"
								href="?controller=Controller_inspiration&action=afficherinspiration" role="button"
								data-bs-toggle="dropdown" aria-expanded="false">Inspiration</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item"
										href="?controller=Controller_inspiration&action=affichepalettes">Palettes</a>
								</li>
								<li><a class="dropdown-item"
										href="?controller=Controller_inspiration&action=afficheroeuvre">Œuvres</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link active" aria-current="page"
								href="?controller=boutique&action=boutique">Boutique</a>
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

				<!-- Bouton hamburger -->
				<button class="navbar-toggler position-absolute top-0 start-0 ms-3 mt-3" type="button"
					data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
					aria-expanded="false" aria-label="Toggle navigation">
					<img src="Content/img/icons8-hamburger-menu.png" alt="Menu" style="width: 30px; height: 30px;" />
				</button>

			</div>
		</nav>
	</header>
	<div class="home" id="home">
		<div class="home-content">
			<div class="swiper mySwiper">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<video class="home-img" src="Content/img/test.mp4" autoplay muted loop playsinline></video>

						<div class="home-details">
							<div class="home-text">
								<h4 class="homeSubtitle">Exprimez-vous en couleurs.</h4>
								<h2 class="homeTitle"> Les couleurs de <br>votre art</h2>
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<img src="https://th.bing.com/th/id/OIP.GXMvjgr-sSB8Uqqos6JNCwHaFa?rs=1&pid=ImgDetMain" alt=""
							class="home-img">

						<div class="home-details">
							<div class="home-text">
								<h4 class="homeSubtitle">Slogan different si on veut.</h4>
								<h2 class="homeTitle">Slogan different si on veut <br> reflechir</h2>
							</div>
						</div>
					</div>

					<div class="swiper-slide">
						<img src="https://static.vecteezy.com/system/resources/previews/002/744/052/original/trendy-beautiful-gradient-color-palettes-vector.jpg"
							alt="" class="home-img">

						<div class="home-details">
							<div class="home-text">
								<h4 class="homeSubtitle">Slogan different si on veut.</h4>
								<h2 class="homeTitle">Slogan different si on veut <br> reflechir</h2>
							</div>
						</div>
					</div>

					<div class="swiper-slide">
						<img src="https://www.johnbeckley.com/images/2017/04/Marilyn-monroe-painting-john-beckley-2017-edition.jpg"
							alt="" class="home-img">

						<div class="home-details">
							<div class="home-text">
								<h4 class="homeSubtitle">Slogan different si on veut.</h4>
								<h2 class="homeTitle">Slogan different si on veut <br> reflechir</h2>
							</div>
						</div>
					</div>
				</div>

				<div class="swiper-button-next swiper-navBtn"></div>
				<div class="swiper-button-prev swiper-navBtn"></div>
				<div class="swiper-pagination"></div>
			</div>
		</div>
	</div>

	<!-- ?controller=Controller_inspiration&action=afficherentreprise -->