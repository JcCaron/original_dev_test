<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My page title</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

	<!-- STYLES -->
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
	
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
			<li class="menu-item hidden"><a href="/">Accueil</a></li>

            <?php if (isset($logged_user)) { ?> 
                <li class="menu-item hidden"><a href="/account/logout">Déconnexion</a></li>
            <?php } else { ?>
			    <li class="menu-item hidden"><a href="/account/login">Connexion</a></li>
            <?php }  ?>
		</ul>
	</div>

	<div class="heroe">

		<h1>Répertoire de ressources pédagogiques</h1>

	</div>

</header>