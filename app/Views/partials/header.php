<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ressources</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

	<!-- STYLES -->
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/admin_ressources.css">

	<!-- SCRIPTS -->
	<script src="/assets/js/ressources.js"></script>
	<script src="/assets/js/home.js"></script>
</head>
<body>

<!-- HEADER: MENU + HEROE SECTION -->
<header>
   
	<div class="menu">
        <?php if (isset($logged_user)) { ?> 
            <p style="float:left">Bonjour <?= $logged_user['name'] ?> !</p>
        <?php }  ?>
		<ul>
			<li class="menu-toggle">
				<button onclick="toggleMenu();">&#9776;</button>
			</li>
			<li class="menu-item visible"><a href="/">Accueil</a></li>

            <?php if (isset($logged_user)) { ?> 
                <li class="menu-item visible"><a href="/account/logout">Déconnexion</a></li>
            <?php } else { ?>
			    <li class="menu-item visible"><a href="/account/login">Connexion</a></li>
            <?php }  ?>
		</ul>
	</div>

	<div class="heroe">
		<h1>Répertoire de ressources pédagogiques</h1>

	</div>

</header>