
function shuffle(array) {
  var currentIndex = array.length, temporaryValue, randomIndex ;

  // While there remain elements to shuffle...
  while (0 !== currentIndex) {

    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    // And swap it with the current element.
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }

  return array;
}

function validateEmail(email) { 
  // http://stackoverflow.com/a/46181/11236
  
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}


var app = angular.module("app",[]);
randomBool = false;
tmpm = [];

app.filter('range', function() {
  return function(input, total) {
    total = parseInt(total);

    for (var i=0; i<total; i++) {
      input.push(i);
    }

    return input;
  };
});

app.controller("ctrl",function($scope,$http){
	document.body.style.zoom = 1;
	document.body.style.zoom = (document.body.clientWidth/1366);
	window.addEventListener('resize', function(){
		document.body.style.zoom = 1;
		document.body.style.zoom = (document.body.clientWidth/1366);
	})
	$scope.visiteurlimit = 20;
	$scope.endinsc = new Date(2016, 1, 14, 20);
	$scope.moretime = ($scope.endinsc > new Date());
	jours = nj=>nj?nj>1?nj+" jours ":"un jour ":"encore ";
	get_msg = (tms_challenge)=>tms_challenge > 0?jours(parseInt(tms_challenge/86400))+parseInt(tms_challenge/3600)%24+":"+parseInt(tms_challenge/60)%60+":"+tms_challenge%60:"valider";
	$scope.debut_insc_challenge = new Date(2016, 1, 17, 20);
	$scope.debut_insc_formation = new Date(2016, 1, 17, 20);
	tms_challenge = parseInt(($scope.debut_insc_challenge - new Date())/1000);
	tms_formation = parseInt(($scope.debut_insc_formation - new Date())/1000);
	$('#challengeraddbutton')[0].textContent = get_msg(tms_challenge);
	$('#challengeraddbutton')[0].disabled = tms_challenge > 0;
	$('#visiteuraddbutton')[0].textContent = get_msg(tms_formation);
	$('#visiteuraddbutton')[0].disabled = tms_formation > 0;
	setInterval(function(){
		tms_challenge = parseInt(($scope.debut_insc_challenge - new Date())/1000);
		tms_formation = parseInt(($scope.debut_insc_formation - new Date())/1000);
		$('#challengeraddbutton')[0].textContent = get_msg(tms_challenge);
		$('#challengeraddbutton')[0].disabled = tms_challenge > 0;
		$('#visiteuraddbutton')[0].textContent = get_msg(tms_formation);
		$('#visiteuraddbutton')[0].disabled = tms_formation > 0;
	}, 1000);
	
	data = formateursdata;
	$scope.formateurs = data;
	formateura = window.location.hash.substr(1);
	$scope.challenges = [{nom:"Sécurité", description:"Capture The Flag", image:"security.png"},{nom:"Web", description:"Web", image:"cloud.png"},{nom:"Mobile", description:"Mobile", image:"mobil.jpg"},{nom:"Embarqué", description:"Embarqué", image:"prov.jpg"},{nom:"Gaming", description:"Gaming", image:"gaming.png"},{nom:"Audiovisuel", description:"Audiovisuel", image:"camera.jpg"}];
	nom_formateur = formateura.substr(0,formateura.indexOf("_"));
	prenom_formateur = formateura.substr(formateura.indexOf("_")+1);

	nom_formateur = nom_formateur.replace("-"," ");
	prenom_formateur = prenom_formateur.replace("-"," ");

	console.log(nom_formateur+"***"+prenom_formateur);
	var formateur = null;
	for(t in data){
		if((data[t].nom.toLowerCase() == prenom_formateur.toLowerCase() &&
		 data[t].prenom.toLowerCase() == nom_formateur.toLowerCase()) || (
		 	data[t].nom.toLowerCase() == nom_formateur.toLowerCase() &&
		 data[t].prenom.toLowerCase() == prenom_formateur.toLowerCase()
		 )) {
			formateur = data[t];
			indexoff=$scope.formateurs.indexOf(formateur)+1;
		}
	}
	console.log(formateur);
	if(formateur!=null){
			console.log("scrolling down..");
			console.log("showing trainer");
			$scope.showFormf(formateur,indexoff);
		
			
	}else{
		$scope.search=formateura;
	}
	randomBool = true;

	

	$scope.showForm = $scope.inscrireDisplay = "none";
	$scope.videoShow = "none";
	$scope.bydisplay = "1";
	$scope.alertShow = "none";

	$scope.alertMessage = ""

	$scope.nom = "";
	$scope.prenom= "";
	$scope.fac= "";
	$scope.nom_formation= "";
	$scope.discreption = "";
	$scope.image= "";
	$scope.email= "";

	$scope.bsnom = "";
	$scope.bsprenom = "";
	$scope.bsfac = "";
	$scope.bsnomformation = "";
	$scope.bsdiscreption = "";
	$scope.bsimage = "";
	$scope.bsemail = "";

	$scope.add = function(){
		$scope.moretime = ($scope.endinsc > new Date());
		if(!$scope.moretime) {
			$scope.inscrireDisplay = "none";
			swal("Désolé!", "La période d'inscription a expiré", "error");
		}
		if( $scope.nom.length>0 &&
			$scope.prenom.length>0 &&
			$scope.fac.length>0 &&
			$scope.nom_formation.length>0 &&
			$scope.discreption.length>0 &&
			$scope.image.length>0 &&
			validateEmail($scope.email) 

			){
			$http.post("./addformateur.php",{
				"nom":$scope.nom,
				"prenom":$scope.prenom,
				"fac":$scope.fac,
				"nom_formation":$scope.nom_formation,
				"discreption":$scope.discreption,
				"image":$scope.image,
				"email":$scope.email
			}).success(function(data){
				$scope.nom="";
				$scope.prenom="";
				$scope.fac="";
				$scope.nom_formation="";
				$scope.discreption="";
				$scope.image="";
				$scope.email="";
				$scope.inscrireDisplay = "none";
				swal("Merci!", "Vérifiez votre email dans quelques jours!", "success");
			}).error(function(){
				$scope.inscrireDisplay = "none";
				swal("Désolé!", "La période d'inscription a expiré", "error");
				$scope.moretime = false;
			});
		}else{
			$scope.bsnom=($scope.nom.length==0)?"0 0 10px red":"";
			$scope.bsprenom=($scope.prenom.length==0)?"0 0 10px red":"";
			$scope.bsfac=($scope.fac.length==0)?"0 0 10px red":"";
			$scope.bsnomformation=($scope.nom_formation.length==0)?"0 0 10px red":"";
			$scope.bsdiscreption=($scope.discreption.length==0)?"0 0 10px red":"";
			$scope.bsimage=($scope.image.length==0)?"0 0 10px red":"";
			$scope.bsemail=($scope.email.length==0)?"0 0 10px red":"";
		}
	}
	$scope.selectedFormation = 1;
	$scope.exit = function(){swal('désolé', 'la session d\'inscription a expirée', 'error')}
	$scope.addVisiteur = function(){
		if( $scope.nom.length>0 &&
			$scope.prenom.length>0  &&
			validateEmail($scope.email)
			){
			$http.post("./addvisiteur.php",{
				"nom":$scope.nom,
				"prenom":$scope.prenom,
				"email":$scope.email,
				"formation":$scope.selectedFormation,
			}).success(function(data){
				console.log('**--', data);
				if(data=="1062"){
					$scope.showForm = "none";
					swal("Ooops..", "Vous avez déjà pris votre place dans ce workshop!", "error")
					
				}else if(data =="1644"){
					$scope.showForm = "none";
					swal("Ooops..", "il n'y a pas plus de place!", "error")
					
				}else{
					$scope.showForm = "none";
					swal("Merci!", "Vérifiez votre email dans quelques jours!", "success")
				}
			}).error(function(){
				$scope.showForm = "none";
				swal("Ooops..", "", "error")
			});

		}else{
			$scope.bsnom=($scope.nom.length==0)?"0 0 10px red":"";
			$scope.bsprenom=($scope.prenom.length==0)?"0 0 10px red":"";
			$scope.bsemail=(validateEmail($scope.email) == false)?"0 0 10px red":"";
		}
	}
	$scope.addChallenger = function(){
		var ok = $scope.nombre<=5 && $scope.nombre>=3;
		for(var i=0 ; ok && i<$scope.nombre-1; i++) {
			ok = $scope.noms[i] != "";
		}
		$scope.bsnomeq=($scope.nomeq=="")?"0 0 10px red":"";
		$scope.bsnom=($scope.nom=="")?"0 0 10px red":"";
		$scope.bsetab=($scope.etab=="")?"0 0 10px red":"";
		$scope.bstel=($scope.tel=="")?"0 0 10px red":"";
		$scope.bsemail=(validateEmail($scope.email) == false)?"0 0 10px red":"";
		for(var i=0 ; i<$scope.nombre-1; i++) {
			$scope.bsnoms[i] = ($scope.noms[i]=="")?"0 0 10px red":"";
		}
		if( ok && 
			$scope.nom!="" &&
			$scope.nomeq!=""  &&
			$scope.tel!=""  &&
			$scope.etab!=""  &&
			validateEmail($scope.email)
			){
			$http.post("./addchallenger.php",{
				"nom":$scope.nom,
				"nomeq":$scope.nomeq,
				"email":$scope.email,
				"tel":$scope.tel,
				"etab":$scope.etab,
				"nombre":$scope.nombre,
				"members":$scope.noms,
				"type":$scope.challengeindex
			}).success(function(rang){
				console.log(rang);
				if(rang=="-1"){
					$scope.showForm2 = "none";
					swal("Ooops..", "Vous avez déjà pris votre place dans ce challenge!", "error")
					
				}else if(parseInt(rang) > ($scope.challengeindex==4?5:10)){ // Embarqué index = 4
					$scope.showForm2 = "none";
					swal("Bon chance", "Il n'y a pas plus de place!\nVous êtes placé dans la liste d'attente", "warning")
					
				}else{
					$scope.showForm2 = "none";
					swal("Merci!", "On vous contacterait bientôt", "success")
				}
			}).error(function(){
				$scope.showForm = "none";
				swal("Ooops..", "", "error")
			});
		}
	}

	$scope.top1="0px";
	$scope.top2="100%";
	$scope.top3="100%";
	$scope.barrey="0px";
	$scope.fopacity = 0;
	$scope.showformateurs = function(){
		$scope.top1="-100%";
		$scope.top2="0px";
		$scope.top3="100%";
		$scope.mrightleft="1550px";
		$scope.mleftright="-100%";
		$scope.opacity=0;
		$scope.bydisplay = "0";
		$scope.barrey="50px";
		$scope.rightof = "-1027.10027100px";
		$scope.rotate = "rotate(-73deg)";
		$scope.rightwhats = "-20px";
		$scope.transwhats = "1.2";
		$scope.bottomwhats = "100px";
		$scope.fopacity = 1;
		$scope.closeform();
	}

	$scope.showchallenges = function(){
		$scope.top1="-100%";
		$scope.top2="100%";
		$scope.top3="0px";
		$scope.mrightleft="1550px";
		$scope.mleftright="-100%";
		$scope.opacity=0;
		$scope.bydisplay = "0";
		$scope.barrey="50px";
		$scope.rightof = "-1027.10027100px";
		$scope.rotate = "rotate(-73deg)";
		$scope.rightwhats = "-20px";
		$scope.transwhats = "1.2";
		$scope.bottomwhats = "100px";
		$scope.fopacity = 1;
		$scope.closeform();
	}

	$scope.top = function(){
		$scope.top1="0px";
		$scope.top2="100%";
		$scope.top3="100%";
		$scope.mrightleft="550px";
		$scope.mleftright="0px";
		$scope.opacity=1;
		$scope.bydisplay = "1";
		$scope.barrey="0px";
		$scope.fopacity = 0;
		$scope.closeform();
	}

	$scope.showVideo = function(){
		$scope.videoShow = "block";
	}

	$scope.closeform = function(){
		$scope.inscrireDisplay = "none";
		$scope.showForm = "none";
		$scope.showForm2 = "none";
		$scope.videoShow = "none";
		$scope.alertShow = "none";
	}

	$scope.showInscreption = function(){
		$scope.moretime = ($scope.endinsc > new Date());
		if($scope.moretime)
			$scope.inscrireDisplay = "block";
	}

	$scope.showFormf = function(i,index){
		console.log(i);
		$scope.selectedFormation = i.id;
		$scope.formateurindex = index;
		$scope.formateurimage = i.image;
		$scope.formateurnom = i.nom;
		$scope.formateurprenom = i.prenom;
		$scope.formateurnomformation= i.nom_formation;
		$scope.bsfull= i.full<$scope.visiteurlimit ?"block":"none";
		$scope.bsfullbar= i.full>=$scope.visiteurlimit ?"block":"none";
		$scope.showForm = "block";
		$scope.formateurdiscreption = i.discreption;
	}

	$scope.showFormc = function(k,index){
		$scope.nombre = 3;
		$scope.noms = [];
		$scope.bsnoms = [];
		$scope.challengeindex = index;
		$scope.challengeimage = k.image;
		$scope.challengenom = k.nom;
		$scope.challengedescription = k.description;
		$scope.nomeq="";
		$scope.nom="";
		$scope.etab="";
		$scope.tel="";
		$scope.email="";
		for(var i=0 ; i<4; i++)
			$scope.noms[i]="";
		$scope.bsnomeq="";
		$scope.bsnom="";
		$scope.bsetab="";
		$scope.bstel="";
		$scope.bsemail="";
		for(var i=0 ; i<4; i++)
			$scope.bsnoms[i]="";
		$scope.showForm2 = "block";
		$scope.challengerslimit = ($scope.challengeindex==4?5:10);
		$scope.bsfull= challengesdata[index-1]<$scope.challengerslimit ?"block":"none";
		$scope.bsfullbar= challengesdata[index-1]>=$scope.challengerslimit ?"block":"none";
	}

	$scope.rightof = "-100%";
	$scope.opacitywhats = 0;
	$scope.showDesc = function(){
		if($scope.rightof!="0px") {
			$scope.rightof = "0px";
			$scope.rotate = "rotate(-0deg)";
		}
		else {
			$scope.rightof = "-100%";
			$scope.rotate = "rotate(-73deg)";
		}
	}


	$scope.shadowopacity = 0;
	

	var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
	var firstDate = Date.now();
	var secondDate = new Date(2016,02,21);

	var diffDays = Math.round(Math.abs((firstDate - secondDate.getTime())/(oneDay))) - 30;
	$scope.days = (diffDays>=10)?diffDays:"0"+diffDays;

	if(window.location.hash.substr(1).length!=0){
		$scope.showformateurs();
	}

});






$(".shadow").css("display","none");
showShadow = function(){
	if($(".holder").scrollTop() > 1){
		$(".shadow").css("opacity","0.2");
		$(".shadow").css("display","block");
	}else{
		$(".shadow").css("display","none");
		$(".shadow").css("opacity","0");
	}
}



$("body").children().each(function(i,c){
		c.style.transition = "all 1s";
		c.style.opacity = 0;
});

$(".loading").css("opacity","1");

$(window).load(function(){
	$(".loading").css("opacity","0");
	setTimeout(function(){

		$("body").children().each(function(i,c){
			c.style.opacity = 1;
		});
		$(".loading").css("display","none");

		


		$("#ctr").css("visibility","hidden");
      	/*
        if (!$.browser.webkit) {
              $('.holder').jScrollPane();
              $('.holder2').jScrollPane();
          }
        */
	},1000);
});

