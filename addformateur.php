<?php

	$postdata = file_get_contents("php://input");

    $request = json_decode($postdata);

	$nom           =$request->nom;
	$prenom        =$request->prenom;
	$fac           =$request->fac;
	$nom_formation =$request->nom_formation;
	$discreption   =$request->discreption;
	$image         =$request->image;
	$email         =$request->email;

	
	include("connect.php");
	$con->set_charset("utf8");
	$stmt = $con->prepare("INSERT INTO formateur VALUES (NULL , ?,  ?,  ?,  ?,  ?,  ?,  ?, true)");
	$stmt->bind_param('sssssss', $nom, $prenom, $fac, $nom_formation, $discreption, $image, $email);
	$stmt->execute();
	$stmt->close();
	?>