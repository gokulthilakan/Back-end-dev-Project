<?php
 require_once "config.php";


$rname = $ingred = $proces =  "";
$first_name_error = $ingred_error = $proces_error = "";

if (isset($_POST["id"]) && !empty($_POST["id"])) {

    $id = $_POST["id"];

        $Name = trim($_POST["rname"]);
        if (empty($Name)) {
            $rname_error = "First Name is required.";
        } elseif (!filter_var($Name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))) {
            $rname_error = "First Name is invalid.";
        } else {
            $Name = $Name;
        }

        
        $ingred = trim($_POST["ingred"]);
    if(empty($ingred)){
        $ingred_error = "ingredients are required.";
    } else {
        $ingred = $ingred;

  $proces = trim($_POST["proces"]);
    if(empty($proces)){
        $proces_error = "ingredients are required.";
    } else {
        $proces = $proces;
        

      if (empty($rname_error) ) {
          $sql = "INSERT INTO `users` (`rname`, `ingred`, `proces`) VALUES ('$Name', '$ingred', '$proces')";

          if (mysqli_query($conn, $sql)) {
              header("location: index.php");
          } else {
               echo "Something went wrong. Please try again later.";
          }
      }

    mysqli_close($conn);
} else {
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        $id = trim($_GET["id"]);
        $query = mysqli_query($conn, "SELECT * FROM users WHERE ID = '$id'");

        if ($user = mysqli_fetch_assoc($query)) {
            $Name   = $user["rname"];
            $ingred = $user["ingred"];
            $proces = $user["proces"];
        } else {
            echo "Something went wrong. Please try again later.";
            header("location: edit.php");
            exit();
        }
        mysqli_close($conn);
    }  else {
        echo "Something went wrong. Please try again later.";
        header("location: edit.php");
        exit();
    }
}
?>
<!--update-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update </title>
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
                        <h2>Update Recipe</h2>
                    </div>
                    
               <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                      <input type="hidden" name="id" value="<?php echo $id; ?>"/>
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
