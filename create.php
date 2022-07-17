<?php
require_once "config.php";

$rname = $ingred = $proces = "";
$rname_error = $ingred_error = $proces_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = trim($_POST["rname"]);
    if (empty($name)) {
        $Name_error = "Recipe Name is required.";
    } elseif (!filter_var($Name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))) {
        $rname_error = "RECIPE Name is invalid.";
    } else {
        $Name = $Name;
    
    }
    $ingred1 = trim($_POST["ingred"]);
    if(empty($ingred1)){
        $ingred_error = "ingredients are required.";
    } else {
        $ingred1 = $ingred1;
    }
    
    $proces1 = trim($_POST["proces"]);
    if(empty($proces1)){
        $proces_error = "process is required.";
    } else {
        $proces1 = $proces1;
    }

    if (empty($rname_error) ) {
          $sql = "INSERT INTO `Recipe` (`rname`, `ingred`, `proces`) VALUES ('$Name', '$ingred1', '$proces1')";

          if (mysqli_query($conn, $sql)) {
              header("location: index.php");
          } else {
               echo "Something went wrong. Please try again later.";
          }
      }
    mysqli_close($conn);
}
?>


<!-- CREATE-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Recipe</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper {
            width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Recipe</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Recipe Name</label>
                            <input type="text" name="rname" class="form-control" value="">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group" >
                            <label>Ingredients</label>
                            <textarea name="ingred" class="form-control"></textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label>Process</label>
                             <textarea name="proces" class="form-control"></textarea>
                            <span class="help-block"></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
