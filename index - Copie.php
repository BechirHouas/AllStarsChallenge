<?php
header('Content-Type:text/html');
function contains($haystack, $needle) {
    // search backwards starting from haystack length characters from the end
    return $needle === "" || strpos($haystack, $needle) !== false;
}

//if(!contains($_SERVER['HTTP_USER_AGENT'],'AppleWebKit'))
//	die('Please Use AppleWebKit Supported browser like Google, Safari, ...')
?>
<!DOCTYPE html>
<html ng-app="app">
<head>

	<meta charset="UTF-8">
	<title>All STARS CHALLENGE</title>
	<link rel="icon" type="image/png"  href="lg.png">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	<link rel="stylesheet" type="text/css" href="font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
	


</head>
<body>
	
	<div ng-controller="ctrl" style="opacity:0">
	<!-- begin -->
		
		<div id="first" style="top:{{ top1 }}">
			<div id="by" style="opacity:{{bydisplay}}">
				<i class="fa fa-code"></i> 
				<a href="https://www.facebook.com/ElheniMokhles" target="_blank">
					<span>Houas Bechir</span>
				</a>
				<a href="https://www.facebook.com/thamer.belfkih" target="_blank">
					<i class="fa fa-code"></i> <span>Lazhar Ahmed</span>
				</a>
			</div>
			<header>
				<div class="buttons">
					<a href="https://www.facebook.com/events/1743255809239472/" target="_blank" class="fb"><i class="fa fa-facebook-square"></i></a>
					<button class="pure-button button-small" ng-click="showformateurs()" >
						<i class="fa fa-child" ></i> VOIR LES FORMATIONS
					</button>
					<button class="button-secondary pure-button button-small" ng-click="showchallenges()" >
						<i class="fa fa-plus" ></i> {{ "S'inscrire pour les Challenges " | uppercase}}
					</button>
					<button class="button-secondary pure-button button-small" ng-click="showInscreption()" ng-if="moretime">
						<i class="fa fa-plus"></i> {{ "S'inscrire comme formateur " | uppercase}}
					</button>

					<div id="calnd">
						{{ days }}
					</div>
				</div>
			</header>
			<section id="s1">
				<centre>
					<div id="right" style="margin-left:{{mrightleft}};opacity:{{opacity}}">
						<img id="msgimg" src="infos.png">
					</div>
					<div id="left" style="margin-left:{{mleftright}};opacity:{{opacity}}">
						<img src="rot.png" id="rot">
					</div>
					<div class="barre" style="margin-top:{{barrey}};opacity:{{opacity}}"></div>
					<div id="spons"></div>
				</centre>
			</section>
			<div class="arrow" ng-click="showDesc()">
				<i class="fa fa-angle-double-right"></i>
				<div class="inarrow">
					<img src="inarrowbg.png">
					C'est quoi All STARS Challenge ?
				</div>
			</div>
			<div class="descevent" style="opacity:{{opacity}};right:{{rightof}}">
			<div class="arrow2" ng-click="showDesc()">
				<i class="fa fa-angle-double-right"></i>
			</div>
<h2>C'est Quoi All STARS Challenge ?</h1>
					<p>
Etes-vous intéressés par le Web , Mobile, Embarqué, Securité, gaming ou bien l’audiovisuel ?
<br> 
C’est parti alors pour un nouvel événement organisé par la famille Netlinks 
<br>
le Samedi et le dimanche 20 et 21 février au Technopark Ghazela.
<br>
Il y’aura un challenge dans chacun de ces 6 domaines et un thème précis sera imposé dans chaque domaine 
<br>
et un ensemble de formations présentés par des professionnels ouverts à tous les participants.
<br> 
Le planning : 
<br>
Pour le samedi :
<br>
A 14h : Déclenchement des challenges.

<br>
19h : Diner Puis continuation du challenge.
<br> 
Pour le Dimanche :
<br>
8h : Petit déjeuner.

<br>
9h : Formations dans les 6 domaines 
<br>
14h : Fin des challenges.
<br>
Nous vous attendons le 20/02/2016 à Technopôle El Ghazela.
<br>
Bienvenue à tous les candidats et bonne chance à tous ! 
<br>
N.B: événement ouvert pour tous (débutants ou professionnels)
</p>
				</div>
			<!--
			<div id="coin"  style="opacity:{{opacity}}" ng-click="showDesc()">
				
			</div>
			-->
			<div class="whats" style="opacity:{{opacitywhats}};transition:{{transwhats}};-webkit-transform:{{rotate}};right:{{rightwhats}};bottom:{{bottomwhats}}" ng-click="showDesc()">C'est Quoi 217 ?</div>
			

		</div>

		<div id="formateurs" class="annexe" style="top:{{ top2 }}">
		<div class="holder" id="holder" onscroll="showShadow()" style="opacity:{{fopacity}}; width:700px; margin-left:auto; margin-right:auto">
			<div ng-repeat="formateur in formateurs | filter:search" class="formateur">
				
				<div ng-if="formateur.full<visiteurlimit" class="image" style="background-image:url({{ formateur.image }})" ng-click="showFormf(formateur,formateurs.indexOf(formateur) + 1)"> </div> 
				<div ng-if="formateur.full>=visiteurlimit" class="image" style="background-image:url({{ formateur.image }});opacity:0.2" ng-click="showFormf(formateur,formateurs.indexOf(formateur) + 1)"> </div> <br>
				
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
		<div id="challenges" class="annexe" style="top:{{ top3 }}">
		<div class="holder" id="holder" onscroll="showShadow()" style="opacity:{{fopacity}}; width:700px; margin-left:auto; margin-right:auto">
			<div ng-repeat="challenge in challenges | filter:search" class="formateur">
				
				<div class="image" style="background-image:url({{ challenge.image }})" ng-click="showFormc(challenge,$index + 1)"> </div> 
				
				<div class="num">
					<span>{{ $index + 1 }}</span>
				</div>
				<div class="text">
					<span class="nom">{{ challenge.nom }} </span>
					<br />
					<span class="formation">{{ challenge.description }}</span>
				</div>
			</div>
		</div>
		<div class="shadow"></div>
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
Commençons à prendre des initiatives, à travailler pour construire un meilleur avenir aux jeunes !
				</p>
				<h3>Inscription</h3>
				<input ng-model="nom" placeholder="nom" style="box-shadow:{{bsnom}}">
				<input ng-model="prenom" placeholder="prenom" style="box-shadow:{{bsprenom}}">
				<input ng-model="fac" placeholder="fac,club ou association" style="box-shadow:{{bsfac}}">
				<input ng-model="nom_formation" placeholder="nom de la formation" style="box-shadow:{{bsnomformation}}">
				<textarea ng-model="discreption" style="box-shadow:{{bsdiscreption}}" placeholder="description de la formation"></textarea>
				<input ng-model="image" placeholder="url image" style="box-shadow:{{bsimage}}">
				<input ng-model="email" placeholder="email" style="box-shadow:{{bsemail}}" type="email">
				<button class="pure-button pure-button-primary" ng-click="add()">valider</button>
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
				<div style="display:{{ bsfullbar }}" class="warning" >
					il n'y a plus de place
				</div>
				<div style="display:{{ bsfull }}" >
				
				<h3>Prendre ta place</h3>
				<input ng-model="nom" placeholder="nom" style="box-shadow:{{bsnom}}">
				<input ng-model="prenom" placeholder="prenom" style="box-shadow:{{bsprenom}}">
				<input ng-model="email" placeholder="email" style="box-shadow:{{bsemail}}">
				<button class="pure-button pure-button-primary" ng-click="addVisiteur()"  id="visiteuraddbutton">valider</button>
				</div>
			
			</div>
		</div>

		<div id="formchallenge" class="pure-form pure-form-stacked form" style="display:{{showForm2}}" title="l'inscription sera ouverte bientôt">
		<button class="button-warning pure-button close" ng-click="closeform()">x</button>
			<div class="holder2">
				
				<div class="full">
					<div style="background-image:url({{ challengeimage }})" ng-click="showFormc(challengeindex)" class="img"></div> <br>
					<div class="num">
						<span>{{ challengeindex }}</span>
					</div>
					<div class="text">
						<span class="nom">{{ challengenom }} </span>
						<br />
						<span class="formation">{{ challengedescription }}</span>

					</div>
					
				</div>
				<div style="display:{{ bsfullbar }}" class="warning" >
					il n'y a plus de place, mais vous pouvez vous inscrire pour la liste d'attente
				</div>
				
				<h3>Prendre ta place</h3>
				<input ng-model="nomeq" placeholder="nom de l'équipe" style="box-shadow:{{bsnomeq}}">
				<input ng-model="nom" placeholder="nom et prénom du capitain" style="box-shadow:{{bsnom}}">
				<input ng-model="email" placeholder="email" style="box-shadow:{{bsemail}}">
				<input ng-model="tel" placeholder="numéro du téléphone" style="box-shadow:{{bstel}}">
				<input ng-model="etab" placeholder="établissement" style="box-shadow:{{bsetab}}">
				<label for="membres" style="display:inline"><pre style="display:inline">Membres:    </pre></label><input style="display:inline" id="membres" ng-model="nombre" placeholder="nombre des membres" type="number" min="3" max="5" style="box-shadow:{{bsemail}}">
				<div ng-repeat="i in [] | range:(nombre-1)">
					<input ng-model="noms[i]"  style="box-shadow:{{bsnoms[i]}}" placeholder="nom et prénom du membre {{i+1}}">
				</div>
				<button class="pure-button pure-button-primary" ng-click="addChallenger()" id="challengeraddbutton" ></span></button>
			
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
	<script src="angular.min.js">
	</script>
	<script type="text/javascript">
    formateursdata=<?php
		include("connect.php");
		$con->set_charset("utf8");
		$res=$con->query("select * from formateur where conferme = 1");
		$a = array();
		while ($row = $res->fetch_assoc()) {
			$stmt = $con->prepare("select count(*) from visiteur where formation = ?");
			$stmt->bind_param('d', $row['id']);
			$stmt->execute();
			$stmt->bind_result($count);
			$stmt->fetch();
			$stmt->close();
			$row['full'] = $count;
			$a[] = $row;
		}
		echo json_encode($a);
	?>;
	challengesdata=<?php
		$a = array();
		for($i=1; $i<=6; $i++) {
			$stmt = $con->prepare("select count(*) from challenger where challenge = ?");
			$stmt->bind_param('d', $i);
			$stmt->execute();
			$stmt->bind_result($count);
			$stmt->fetch();
			$stmt->close();
			$a[] = $count;
		}
		echo json_encode($a);
	?>;
	</script>
	<script src="script.js">
	</script>
	


    <!-- latest jQuery direct from google's CDN -->
    <!-- the jScrollPane script -->
 
    <!--instantiate after some browser sniffing to rule out webkit browsers-->
    <script type="text/javascript">

     $("#ctr").css("visibility","hidden");
      $(window).load(function () {
          if (!$.browser.webkit) {
              $('.holder').jScrollPane();
              $('.holder2').jScrollPane();
          }
      });
     
    </script>



</body>
</html>