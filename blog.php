<!DOCTYPE html>
<html ng-app="app">
<head>
	
	<script src="angular.min.js">
	</script>
	<script src="script.js">
	</script>
	

	<meta charset="UTF-8">
	<title>217 EVENT</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Crafty+Girls' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="jquery.jscrollpane.css" />
	<link rel="stylesheet" type="text/css" href="style.css">


</head>
<body>
		<div ng-controller="ctrl">
		<div id="first" style="top:{{ top1 }}">
			<div id="by" style="opacity:{{bydisplay}}">
				<i class="fa fa-code"></i> 
				<a href="https://www.facebook.com/ElheniMokhles" target="_blank">
					<span>Elheni Mokhles</span>
				</a>
				<a href="https://www.facebook.com/kimoblack.bakar" target="_blank">
					<i class="fa fa-paint-brush"></i> <span>Bakar Karim</span>
				</a>
			</div>
			<header>
				<a href="http://www.netlinksclub.com" target="_blank"><img src="logo.png"></a>
				<div class="buttons">
					<a href="https://www.facebook.com/event217?fref=ts" target="_blank"><i class="fa fa-facebook-square"></i></a>
					<a ng-click="showVideo()"><i class="fa fa-play-circle"></i></a>
					
					<button class="pure-button button-small" onclick="window.location.href='/'">
						<i class="fa fa-child"></i> ACCUEIL
					</button>
					
					<button class="button-secondary pure-button button-small" ng-click="showInscreption()">
						<i class="fa fa-plus"></i> {{ "S'inscrire comme formateur " | uppercase}}
					</button>

					<div id="calnd">
						{{ days }}
					</div>
				</div>
			</header>
			<section style="float:left;width:60%;padding:10px 20%;margin-top:20px">
				<article style="float:left">
					<header>
						<h1>C'est quoi 217 ?</h1>
					</header>
					<p>
					Nous avons voté pour le bien de notre pays, et nous avons élu nos 217 députés, nos futurs représentants au parlement. Mais est ce que c’est tout ce qu’on a à faire ? Est-ce que notre rôle s’arrête là ?
					</p>
					<p>
					Netlinks vous répond : « Deux valent mieux qu'un, que dire de 217! » et vous offre l’opportunité de contribuer à la construction de notre cher pays ! 
					</p>
					<p>
					Le 217 Event vous attend. 217 formations sur de différents domaines vous seront accordées.
					</p>
					<p>
					N’oubliez pas que notre patrie a besoin de vos mentalités optimistes, de vos esprits créatifs et de votre motivation à travailler.
					</p>
					<p>
					Nous vous attendons le 26/12/2014 à la salle des conférences Technopôle El Ghazela.
					</p>
					<p>
					Le destin de la Tunisie est entre nos mains. Nous ne pouvons pas rater cette occasion !
					</p>
				</article>
			</section>
			
	</div>
	
 
</div>
</body>
</html>