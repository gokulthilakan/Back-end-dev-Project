<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Recipes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
  <?php
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        require_once "config.php";

        $id = trim($_GET["id"]);
        $query = mysqli_query($conn, "SELECT * FROM users WHERE ID = '$id'");

        if ($user = mysqli_fetch_assoc($query)) {
            $Name   = $user["rname"];
            $ingred = $user["ingred"];
            $proces = $user["proces"];
        } else {
            header("location: read.php");
            exit();
        }

        mysqli_close($conn);
    } else {
        header("location: read.php");
        exit();
    }
  ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1> View</h1>
                    </div>
                    <div class="form-group">
                        <label>Recipe Name</label>
                        <p class="form-control-static"><?php echo $Name ?></p>
                    </div>
                    
                    <div class="form-group">
                        <label>Ingredients</label>
                        <p class="form-control-static"><?php echo $ingred ?></p>
                    </div>
                    <div class="form-group">
                        <label>proces</label>
                        <p class="form-control-static"><?php echo $proces ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
