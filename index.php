<?php
    include_once "config.php";
?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0, minimum-scale = 1.0, maximum-scale = 1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Items</title>
</head>
<body>
    <nav class = "navbar navbar-expand-lg navbar-dark bg-dark">
        <div class = "container-fluid">
            <a class = "container-brand" href = "index.php">Items</a>
            <ul class = "navbar-nav">
                <li class = "nav-item">
                    <a class = "nav-link active" araia-current = "page" href = "index.php">Home</a>
                </li>
                <li class = "nav-item">
                    <a type = "button" class = "btn btn-secondary nav-link" href = "addItem.php">Add New</a>
                </li>
            </ul>
        </div>
    </nav>
    <br><br>

    <table class = "table">
        <tr>
            <th>Item Id</th>
            <th>Item Name</th>
            <th>Item Type</th>
            <th>Item Price</th>
            <th>Item Code</th>
            <th>Quantity</th>
            <th>Image</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>

        <?php
            $sql = "select * from item";
            $result = $conn->query($sql);

            if ($result->num_rows>0)
            {
                while($row=$result->fetch_assoc())
                {
                    echo"<tr>
                            <td>$row[id]</td>
                            <td>$row[name]</td>
                            <td>$row[type]</td>
                            <td>$row[price]</td>
                            <td>$row[code]</td>
                            <td>$row[qty]</td>
                            <td>$row[img]</td>
                            <td>$row[description]</td>
                            <td>
                                <a class = 'btn btn-success' href = 'edit.php?id=$row[id]'>Edit</a>
                                <a class = 'btn btn-danger' href = 'delete.php?id=$row[id]'>Delete</a>
                            </td>
                        </tr>";
                }
            }
        ?>
    </table>
</body>
</html>