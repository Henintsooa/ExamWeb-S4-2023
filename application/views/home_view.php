<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>HELLO YOU <?php echo $userdata['username'] ;?> </h1>
    <p>
        <?php
            var_dump($userdata);
        ?>
    </p>
</body>
</html>