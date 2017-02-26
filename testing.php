<!DOCTYPE html>
<html ng-app="app">
<head>


	<meta charset="UTF-8">
	<title>217 EVENT</title>
	<link rel="icon" type="image/png"  href="favicon.png">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	<link rel="stylesheet" type="text/css" href="font-awesome.min.css">
    	
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="jquery.jscrollpane.css" />
	<script src="lib/sweet-alert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="lib/sweet-alert.css">


</head>
<body>
	<div style="opacity:0;position:fixed" id="ctr">
	<a href="http://www.compteurdevisite.com" target="_Blank" title="compteur site">compteur site</a><br/>
<script type="text/javascript" src="http://counter5.allfreecounter.com/private/countertab.js?c=e50e7933b015e7e4d1cf20c34ff23d26"></script>
<noscript><a href="http://www.compteurdevisite.com" title="compteur site"><img src="http://counter5.allfreecounter.com/private/compteurdevisite.php?c=e50e7933b015e7e4d1cf20c34ff23d26" border="0" title="compteur site" alt="compteur site"></a>
</noscript>
        
	</div>

	<div ng-controller="ctrl" style="opacity:0">
	<!-- begin -->
		
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
					<a href="https://www.facebook.com/event217?fref=ts" target="_blank" class="fb"><i class="fa fa-facebook-square"></i></a>
					<a ng-click="showVideo()"><i class="fa fa-play-circle"></i></a>
					<button class="pure-button button-small" ng-click="showformateurs()" >
						<i class="fa fa-child" ></i> VOIR LES FORMATIONS
					</button>
					<button class="button-secondary pure-button button-small" ng-click="showInscreption()" >
						<i class="fa fa-plus"></i> {{ "S'inscrire comme formateur " | uppercase}}
					</button>

					<div id="calnd">
						{{ days }}
					</div>
				</div>
			</header>
			<section id="s1">
				<centre>
					<div id="left" style="margin-left:{{mleftleft}};opacity:{{opacity}}">
						<img id="msgimg" src="message.PNG">
					</div>
					<div id="right" style="margin-left:{{mleftright}};opacity:{{opacity}}">
						<img id="barre" src="hl.png">
						<img src="217.png" id="a217">
					</div>
					<div class="barre" style="margin-top:{{barrey}};opacity:{{opacity}}"></div>
				</centre>
			</section>
			<div class="arrow" ng-click="showDesc()">
				<i class="fa fa-angle-double-right"></i>
				<div class="inarrow">
					<img src="inarrowbg.png">
					C'est quoi 217?
				</div>
			</div>
			<div class="descevent" style="opacity:{{opacity}};right:{{rightof}}">
			<div class="arrow2" ng-click="showDesc()">
				<i class="fa fa-angle-double-right"></i>
			</div>
<h2>C'est Quoi 217 ?</h1>
					<p>

Nous avons voté pour le bien de notre pays, et nous avons élu nos 217 députés, nos futurs représentants au parlement. Mais est ce que c’est tout ce qu’on a à faire ? Est-ce que notre rôle s’arrête là ?
<br>
Netlinks vous répond : « Deux valent mieux qu'un, que dire de 217! » et vous offre l’opportunité de contribuer à la construction de notre cher pays !
<br>
Le 217 Event vous attend. 217 formations sur de différents domaines vous seront accordées.
<br>
N’oubliez pas que notre patrie a besoin de vos mentalités optimistes, de vos esprits créatifs et de votre motivation à travailler.
<br>
Nous vous attendons le 18/01/2015 à Technopôle El Ghazela. 
Le destin de la Tunisie est entre nos mains. Nous ne pouvons pas rater cette occasion !
</p>
				</div>
			<!--
			<div id="coin"  style="opacity:{{opacity}}" ng-click="showDesc()">
				
			</div>
			-->
			<div class="whats" style="opacity:{{opacitywhats}};transition:{{transwhats}};-webkit-transform:{{rotate}};right:{{rightwhats}};bottom:{{bottomwhats}}" ng-click="showDesc()">C'est Quoi 217 ?</div>
			

		</div>

		<div id="formateurs" style="top:{{ top2 }}">
		<div class="holder" id="holder" onscroll="showShadow()" style="opacity:{{fopacity}}">
			<div ng-repeat="formateur in formateurs | random | filter:search" class="formateur">
				<div class="image" style="background-image:url({{ formateur.image }})" ng-click="showFormf(formateur,formateurs.indexOf(formateur) + 1)"> </div> <br>
				<div class="num">
					<span>{{ formateurs.indexOf(formateur) + 1 }}</span>
				</div>
				<div class="text">
					<span class="nom">{{ formateur.nom }} {{ formateur.prenom }} </span>
					<br />
					<span class="formation">{{ formateur.nom_formation }}</span>
				</div>
			</div>
		</div>
		<div class="shadow"></div>
		<input ng-model="search" placeholder="recherche (par nom,fac ou technologie)"  id="search">
		<button id="topbtn" class="pure-button" ng-click="top()"><i class="fa fa-angle-double-up"></i></button>
		</div>
		
		<div class="form alert" style="display:{{alertShow}}">
			<button class="button-warning pure-button close" ng-click="closeform()">x</button>
			{{ "Vérifiez votre email dans quelques jours" }}
		</div>
		<div class="form" id="video" style="display:{{videoShow}}">
			<button class="button-warning pure-button close" ng-click="closeform()">x</button>
			<iframe width="560" height="315" src="//www.youtube.com/embed/iXjXqy8BmPI" frameborder="0" allowfullscreen></iframe>
		</div>

		<div id="forminscrire" class="pure-form pure-form-stacked form" style="display:{{inscrireDisplay}}">
			<button class="button-warning pure-button close" ng-click="closeform()">x</button>
			<div class="holder2">
				<p>
<b>NB :</b> Vous pouvez déposer votre candidature, en indiquant la formation que vous proposez. Vous serez ensuite contacté par notre association qui tiendra pour responsabilité d’examiner cette candidature. 
Les places sont limitées alors n’hésitez pas à déposer le plus tôt possible votre candidature.</p>
<p>
Commençons à prendre des initiatives, à travailler pour construire un meilleur avenir à la Tunisie !
				</p>
				<h3>Inscription</h3>
				<input ng-model="nom" placeholder="nom" style="box-shadow:{{bsnom}}">
				<input ng-model="prenom" placeholder="prenom" style="box-shadow:{{bsprenom}}">
				<input ng-model="fac" placeholder="fac,club ou association" style="box-shadow:{{bsfac}}">
				<input ng-model="nom_formation" placeholder="nom de la formation" style="box-shadow:{{bsnomformation}}">
				<textarea ng-model="discreption" style="box-shadow:{{bsdiscreption}}" placeholder="description de la formation"></textarea>
				<input ng-model="image" placeholder="url image" style="box-shadow:{{bsimage}}">
				<input ng-model="email" placeholder="email" style="box-shadow:{{bsemail}}">
				<button class="pure-button pure-button-primary" ng-click="add()"   >valider</button>
			</div>
		</div>

		<div id="formvisiteur" class="pure-form pure-form-stacked form" style="display:{{showForm}}" title="l'inscription sera ouverte bientôt">
		<button class="button-warning pure-button close" ng-click="closeform()">x</button>
			<div class="holder2">
				
				<div class="full">
					<div style="background-image:url({{ formateurimage }})" ng-click="showFormf(formateur.id)" class="img"></div> <br>
					<div class="num">
						<span>{{ formateurindex }}</span>
					</div>
					<div class="text">
						<span class="nom">{{ formateurnom }} {{ formateurprenom }} </span>
						<br />
						<span class="formation">{{ formateurnomformation }}</span>

					<p>
						{{ formateurdiscreption }}
					</p>
					</div>
					
				</div>
				<div style="display:{{ bsfull2 }}" class="warning" >
					il n'y a pas plus de place
				</div>
				<div style="display:{{ bsfull }}" title="l'inscription sera ouverte bientôt">
				
				<h3>Prendre ta place</h3>
				<input ng-model="nom" placeholder="nom" style="box-shadow:{{bsnom}}">
				<input ng-model="prenom" placeholder="prenom" style="box-shadow:{{bsprenom}}">
				<input ng-model="email" placeholder="email" style="box-shadow:{{bsemail}}">
				<span class="label">Session: (1:matin, 2:apres midi)</span> <select id="ss" ng-model="session">
					<option id="opt1" value="1" selected>1</option><option value="2" id="opt2">2</option></select>
				<button class="pure-button pure-button-primary" ng-click="addVisiteur()"   disabled >valider</button>
				</div>
			
			</div>
		</div>


	<!-- end -->
	</div>
	
	<div class="loading">
		<div class="spinner">
		<div class="dot1"></div>
 		 <div class="dot2"></div>
		</div>
		<div class="textloading">Loading..</div>
	</div>	
 


    	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<!-- latest jQuery direct from google's CDN -->

    <!-- the jScrollPane script -->
    <script type="text/javascript" src="jquery.jscrollpane.min.js"></script>
 
  
	<script src="angular.min.js">
	</script>
	<script src="script.js">
	</script>
    


</body>
</html>