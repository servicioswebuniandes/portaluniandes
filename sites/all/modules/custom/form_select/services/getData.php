<?php

include '../db/config.php';
          
if( isset( $_POST[ "getdata" ] ) && $_POST[ "getdata" ] == 1 ){

	$country = addslashes( $_POST[ "country" ] );


	$seelctSQL = "SELECT id, name FROM state WHERE id_country = " . $country." order by name ASC";
	$query = $db->prepare($seelctSQL);
    $query->execute();    

	echo json_encode( $query->fetchAll());

}

if( isset( $_POST[ "getdata" ] ) && $_POST[ "getdata" ] == 2 ){

	$country = addslashes( $_POST[ "state" ] );
	$seelctSQL = "SELECT id, name FROM city WHERE id_state = " . $country." order by name ASC";
	$query = $db->prepare($seelctSQL);
    $query->execute();    
	echo json_encode( $query->fetchAll());

}


if( isset( $_POST[ "getdata" ] ) && $_POST[ "getdata" ] == 3 ){

	$seelctSQL = "SELECT id, name FROM country order by name ASC";
	$query = $db->prepare($seelctSQL);
    $query->execute();    
	echo json_encode( $query->fetchAll());

}