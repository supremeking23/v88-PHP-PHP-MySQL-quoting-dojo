<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quoting Dojo</title>
    <style>

        body * {
            /* outline:1px dashed red; */
        }
        textarea{
            width:600px;
            height:200px;
            display:block;
            margin-bottom:10px;

        }

        label {
            display:block
        }

        .container {
            width:920px;
            margin:0 auto;
            padding:20px;
        }

        input[type="submit"]{
            margin-right:20px;
        }

    </style>
</head>
<body>

    <div class="container">
        <h1>Welcome to QuotingDojo</h1>

        <?php if(isset($_SESSION["errors"])):
            foreach($_SESSION["errors"] as $error): ?>
            <p><?= $error?></p>
        <?php endforeach;
        endif;?>

        <?php if(isset($_SESSION["success_message"])): ?>
            <h2><?= $_SESSION["success_message"];?></h2>
        <?php endif;?>

        <form action="process.php" method="POST">
            <label for="name">Your Name:</label>
            <input type="text" name="name" value="" id="name">

            <label for="quote">Your quote:
            </label>
            <textarea name="quote" id="quote"></textarea>
            <input type="submit" name="submit" value="Add my qoute">
            <a href="main.php">Skip to quotes</a>
        </form>
    </div>
    
</body>
</html>

<?php 
    unset($_SESSION["errors"]);
    unset($_SESSION["success_message"]);
?>