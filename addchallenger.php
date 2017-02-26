<?php
	date_default_timezone_set('UTC');
	if(time() <  strtotime('17-2-2016 19:0:0')) //time on UTC 21 UTC = 22 Tunis
		die("time");
	$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);

	$nom           =$request->nom;
	$nomeq         =$request->nomeq;
	$email         =$request->email;
	$tel		   =$request->tel;
	$etab          =$request->etab;
	$nombre        =$request->nombre;
	$members       =$request->members;
	$type		   =$request->type;
	
	include("connect.php");

	$con->set_charset("utf8");
	for($i=$nombre-1; $i<4; $i++) {
		$members[$i] = NULL;
	}

	$stmt = $con->prepare("INSERT INTO challenger VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param('ssssssssss', $email, $nomeq, $nom, $members[0], $members[1], $members[2], $members[3], $tel, $etab, $type);
	$stmt->execute();
	if($stmt->errno)
		die("-1");
	$stmt->close();
	$x=$con->insert_id;
	$stmt = $con->prepare("SELECT count(*) FROM challenger WHERE id <= ? AND challenge = ?");
	$stmt->bind_param('dd', $x, $type);
	$stmt->execute();
	$stmt->bind_result($count);
	$stmt->fetch();
	$stmt->close();
	echo $count;