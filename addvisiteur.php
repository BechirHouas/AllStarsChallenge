<?php

	date_default_timezone_set('UTC');
	if(time() <  strtotime('17-2-2016 19:0:0')) //time on UTC 21 UTC = 22 Tunis
		die("time");
	$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);

	$nom           =$request->nom;
	$prenom        =$request->prenom;
	$email         =$request->email;
	$formation     =$request->formation;
	
	include("connect.php");

	$con->set_charset("utf8");
	

	$stmt = $con->prepare("INSERT INTO visiteur VALUES (NULL , ?,  ?,  ?,  ?)");
	$stmt->bind_param('ssss', $nom, $prenom, $email, $formation);
	$stmt->execute();

		echo  "$stmt->errno";
	$stmt->close();
	$to      = $email;
	$subject = 'the subject';
	$message = 'Merci, tu as pris ta place. On va vous envoyer votre billet dans quelques jours (sur cette adresse mail)';
	$headers = 'From: webmaster@217event.net' . "\r\n" .
	'Reply-To: webmaster@217event.net' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();	

mail($to, $subject, $message, $headers);