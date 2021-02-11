<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Codes d'accès au serveur central de la NASA</title>
    </head>
    <body>
    
        <?php
    	require_once('radius.class.php');
	$radius = new Radius('172.17.0.3', 'testing123');
	$result = $radius->AccessRequest($_POST['Username'],$_POST['Password']);
	if ($result) {
  	echo 'Authentication successful';

    
    ?>
        <h1>Voici les codes d'accès :</h1>
        <p><strong>CRD5-GTFT-CK65-JOPM-V29N-24G1-HH28-LLFV</strong></p>   
        
        <p>
        Cette page est réservée au personnel de la NASA. N'oubliez pas de la visiter régulièrement car les codes d'accès sont changés toutes les semaines.<br />
        La NASA vous remercie de votre visite.
        </p>
        <?php
    }
    else {
  	echo 'Authentication failed';
	}
    ?>

        
    </body>
</html>
