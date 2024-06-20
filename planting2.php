<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Planting table</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="farmJournal.css" rel="stylesheet">
    </head>
    <body>
     <h1>Vegetable Planting Schedule 2024</h1>
    <?php
    $connect=mysqli_connect("localhost","root","root","farmJournal");
    $query='SELECT Row,Date,Vegetable,Source FROM Planting';
    $result=mysqli_query($connect,$query);

   //echo mysqli_num_rows($result);
    while($record=mysqli_fetch_assoc($result))
    {
        //pre tag prints the entries in a column
        echo '<pre>';
        print_r($record);
        echo '</pre>';
        echo '<h2>'.$record['Vegetable'].'</h2>';
    }
    ?>
    </body>
</html>