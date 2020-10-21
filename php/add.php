<?php

require "../vendor/autoload.php";

require_once("db.php");

if(isset($_POST['add_text'])) {
    
	$text = htmlspecialchars($_POST['add_text']);

	if($text != "") {

        $lastDeal = $collection->find([],['limit' => 1,'sort' => ['id' => -1]]);

        foreach ($lastDeal as $deal) {
            $id = $deal['id'];
        }

        $res = $collection->insertOne(['id' => ($id + 1),'text' => $text,'done' => false]);

        if($res != false) {
            header('Location: ../index.php');
        } else {
            echo "Error! Can not write in db!";
        }

    } else {
    	header('Location: index.php');
    }
} else {
	echo "Error! Please try again!";
}
?>