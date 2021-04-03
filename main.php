<?php 
session_start();
require_once("new-connection.php");
date_default_timezone_set('Asia/Manila');

$query = "SELECT * FROM qoutes ORDER BY created_at DESC";
$get_all_data = fetch_all($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        body * {
            /* outline:1px dashed red; */
        }
       
        .container {
            width:920px;
            margin:0 auto;
            padding:20px;
        }

        .container div {
            border-bottom:1px solid #000;
        }

        .container div p{
            text-align:center;
        }

      

    </style>
</head>
<body>
    <div class="container">
            <h1>Here are the awesome quotes</h1>

            <?php foreach($get_all_data as $data):
                  $date = date_create($data["created_at"]);
                  $format_date = date_format($date,"h:i:s a F d Y");    
            ?>
                <div>
                    <h3>"<?= $data["quote"]?>"</h3>
                    <p>-<?= $data["name"] ." at ".$format_date?></p>
                </div>
            <?php endforeach;?>
    </div>
</body>
</html>