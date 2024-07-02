<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Harvesting</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="farmJournal.css" rel="stylesheet">
    </head>
    <body id="repeat3">
        <section id="harvesting">
            <h2>Harvesting</h2>
            <img src="Linden with squash.jpg">
            <?php
            $connect=mysqli_connect("localhost","root","root","farmJournal");
            $query='SELECT Row,Date,Vegetable,Source FROM Harvesting';
            $result=mysqli_query($connect,$query);
            ?>
        
    <!--Nick wrote the php code to get this table to diplay on my page.-->          
            <table>
                        <caption>Vegetable Harvesting Schedule 2024</caption>
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