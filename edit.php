<?php
include_once "config.php";
$id = "";
$name = "";
$type = "";
$price = "";
$code = "";
$qty = "";

$errormessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    // show the data of the item

    if (!isset($_GET["id"]))
    {
        header("location: /project/index.php");
        exit;
    }
    $id = $_GET["id"];

    // read the row of the selected item from the table

    $sql = "SELECT * FROM item WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$row)
    {
        header("location: /project/index.php");
        exit;
    }

    $name = $row["name"];
    $type = $row["type"];
    $price = $row["price"];
    $code = $row["code"];
    $qty = $row["qty"];
}
else
{
    // update the data of the item
    $id = $_POST['id']; // Assign the value of 'id' from the form
    $name = $_POST['name'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $code = $_POST["code"];
    $qty = $_POST["qty"];

    do
    {
        if (empty($name) || empty($type) || empty($price) || empty($code) || empty($qty))
        {
            $errormessage = "All the fields are required!";
            break;
        }
        $sql = "UPDATE item SET name = '$name', type = '$type', price = '$price', code = '$code', qty = '$qty' WHERE id = $id";

        $result = $conn->query($sql);

        if (!$result)
        {
            $errormessage = "Invalid query: ".$conn->error;
            break;
        }

        $successMessage = "Update successfully";

        header("location: /project/index.php");
        exit;


    } while (true);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>Edit</title>
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

    <div class="container my-5">
        <h2>New Item</h2>

        <?php
        if (!empty($errormessage))
        {
            echo "
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>$errormessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                ";
        }
        ?>


        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Item Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Item Type</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="type" value="<?php echo $type; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Item Price</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="price" value="<?php echo $price; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Item Code</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="code" value="<?php echo $code; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Item Quantity</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="qty" value="<?php echo $qty; ?>">
                </div>
            </div>
            

            <?php
            if (!empty($successMessage))
            {
                echo "
                        <div class='row mb-3'>
                            <div class='offset-sm-3 col-sm-6'>
                                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                    <strong>$successMessage</strong>
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>
                            </div>
                        </div>
                    ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/project/index.php" role="button"> Cancel </a>
                </div>
            </div>
        </form>
    </div>

</body>
</html>
