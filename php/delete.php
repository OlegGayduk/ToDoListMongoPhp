<?php

require "../vendor/autoload.php";

require_once("db.php");

if(isset($_GET['id'])) {
    
	$id = htmlspecialchars($_GET['id']);

	if($id != "") {

        $res = $collection->deleteOne(['id' => (int)$id]);

        if($res != false && $res->getDeletedCount() > 0) {
            header('Location: ../index.php');
        } else {
            echo "Error! Can not delete a deal!";
        }
    } else {
    	header('Location: index.php');
    }
} else {
	echo "Error! Please try again!";
}

?>