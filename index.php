<?php

require_once("vendor/autoload.php");

require_once("php/db.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Список дел</title>
	<link rel='stylesheet' type='text/css' href='css/main.css'/>
</head>
<body>

	<div class="container">
		<div class="tasks-wrap">
		<?php

            $deals = $collection->find([],['limit' => 1,'sort' => ['id' => 1]]);

            foreach ($deals as $doc) {
                $id = $doc['id'];
            }

            if($id !=  NULL) {

                $deals = $collection->find();

                foreach ($deals as $doc) {
                    if($doc['done'] == false) {
                        echo "<div class='tasks'>".$doc['id'].". <div class='tasks-text-wrap'>".$doc['text']."</div><a class='mark-btn' href='php/mark.php?id=".$doc['id']."'></a><a class='delete-btn' href='php/delete.php?id=".$doc['id']."'></a></div>";
                    } else {
                        echo "<div class='tasks'>".$doc['id'].". <div class='tasks-text-wrap'>".$doc['text']."</div><div class='marked-btn'></div><a class='delete-btn' href='php/delete.php?id=".$doc['id']."'></a></div>";
                    }
                }
            } else {
                echo "You don't have any deals yet.";
            }

            $client->close;

        ?>
        </div>
        <form class="send-form-wrap" method="POST" action="php/add.php">
        	<textarea class="send-textarea" placeholder="Напишите дело..." type="textarea" name="add_text"></textarea>
        	<input class="send-btn" type="submit" value="Добавить"/>
        </form>
	</div>

</body>
</html>
