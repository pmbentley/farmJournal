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
    ?>

    
    <table>
                <caption>Vegetable Planting Schedule 2024</caption>
                <tr><th>Row</th><th>Date</th><th>Vegetable</th><th>Source</th></tr>
                <?php
                while($record=mysqli_fetch_assoc($result))
                {
                ?>
                <tr>
                    <th><?php echo $record['Row'] ?></th>
                    <td><?php echo $record['Date'] ?></td>
                    <td><?php echo $record['Vegetable'] ?></td>
                    <td><?php echo $record['Source'] ?></td>
                </tr>
                <?php
                } 
                ?>
    </table>

    </body>
</html>