<?php

require "../vendor/autoload.php";

require_once("db.php");

if(isset($_GET['id'])) {
    
	$id = htmlspecialchars($_GET['id']);

	if($id != "") {

        $res = $collection->updateOne(['id' => (int)$id],['$set' => ['done' => true]]);

        if($res != false && $res->getMatchedCount() > 0 && $res->getModifiedCount() > 0) {
            header('Location: ../index.php');
        } else {
            echo "Error! Can not mark a deal!";
        }
    } else {
    	header('Location: index.php');
    }
} else {
	echo "Error! Please try again!";
}

?>