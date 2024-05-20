<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple PHP Page</title>
</head>
<body>
    <!-- $ will allow us to make a varible -->
    <?php $place = 'Website' ?>
    <?php function myFirstFunction() {echo 2 + 2;}
        myFirstFunction();
    ?>
    <h1>Welcome to My <?php echo $place ?></h1>
    <p>This is a simple HTML page with PHP!</p>
    <!-- Echo outputs executed code to page -->
    <p>Today's date is: <?php echo date('Y-m-d'); ?>.</p>
    <p> <?php echo myFirstFunction() ?></p>

    <!-- <h2><?php bloginfo('name'); ?></h2> -->
</body>
</html>

