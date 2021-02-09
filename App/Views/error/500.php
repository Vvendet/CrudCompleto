<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo TITLE; ?> 500</title>
    <link href="http://<?php echo APP_HOST; ?>/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://<?php echo APP_HOST; ?>/public/css/error.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="error"><?php echo $varMessage; ?></h1>
    </div>
</body>
</html>
