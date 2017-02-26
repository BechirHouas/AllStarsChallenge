<?php
	echo "Session : " . intval($_GET['nm']/100000000);
	echo "person : " . intval ( ($_GET['nm']%100000000) /1000000);
	echo "formation : " .  ($_GET['nm']%1000000 / 21);