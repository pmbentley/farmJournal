<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Planting</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="farmJournal.css" rel="stylesheet">
    </head>
    <body id="repeat1">
        <section id="planting">
            <h2>Planting</h2>
            <img src="Rob in Garden.jpg"  alt="garden">

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
        
<a href="index.html" class="button2">Home</a>
    </body>
</html>