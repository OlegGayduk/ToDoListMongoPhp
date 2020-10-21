<?php

$client = new MongoDB\Client;

$db = $client->dealsdb;

$collection = $db->dealsCollection;

?>