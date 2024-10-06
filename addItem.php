<?php
    include_once "config.php";

    if (isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $type = $_POST['type'];
        $price = $_POST['price'];
        $code = $_POST['code'];
        $qty = $_POST['qty'];
        $img = $_POST['img'];
        $description = $_POST['description'];

        $q = "insert into item(id,name,type,price,code,qty,img,description)values('','$name','$type','$price','$code','$qty','$img','$description')";
        
        $query = mysqli_query($conn,$q);
    }
?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0, minimum-scale = 1.0, maximum-scale = 1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>Add items</title>
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

    <div class = "col-lg-6 m-auto">
        <form method = "post"><br><br>
            <div class = "card">
                <div class = "card-header bg-secondary">
                    <h2 class = "text-white text-center">Add New Items</h2>
                </div>
            </div><br>
            <label for = "name">Item Name</label><br>
            <input type = "text" name = "name" class = "form-control" id = "name"><br><br>

            <label for = "type">Item Type</label><br>
            <input type = "text" name = "type" class = "form-control" id = "type"><br><br>

            <label for = "price">Item Price</label><br>
            <input type = "text" name = "price" class = "form-control" id = "price"><br><br>

            <label for = "code">Item Code</label><br>
            <input type = "text" name = "code" class = "form-control" id = "code"><br><br>

            <label for = "qty">Quantity</label><br>
            <input type = "text" name = "qty" class = "form-control" id = "qty"><br><br>

            <label for = "img">Image</label><br>
            <input type = "file" name = "img" class = "form-control" id = "img"><br><br>

            <label for = "description">Description</label><br>
            <textarea name = "description" cols = "50" rows = "5" class = "form-control" id = "description"></textarea><br><br>

            <button class = "btn btn-success" type = "submit" name = "submit" id = "submit">Submit</button>
            <a class = "btn btn-info" type = "submit" name = "cancel" href = "index.php" id = "cancel">Cancel</a><br>
        </form>
    </div>
</body>
</html>