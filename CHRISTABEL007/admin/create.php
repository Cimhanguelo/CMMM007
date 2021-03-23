<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $group = $mat_no = "";
$name_err = $group_err = $mat_no_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate group
    $input_group = trim($_POST["group"]);
    if(empty($input_group)){
        $group_err = "Please enter group.";     
    } else{
        $group = $input_group;
    }
    
    // Validate mat_no
    $input_mat_no = trim($_POST["mat_no"]);
    if(empty($input_mat_no)){
        $mat_no_err = "Please enter the mat_no.";     
    } elseif(!ctype_digit($input_mat_no)){
        $mat_no_err = "Please enter a positive integer value.";
    } else{
        $mat_no = $input_mat_no;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($group_err) && empty($mat_no_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO groups (name, group, mat_no) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_group, $param_mat_no);
            
            // Set parameters
            $param_name = $name;
            $param_group = $group;
            $param_mat_no = $mat_no;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index1.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create New Record</h2>
                    <p>Please fill this form and submit to add student record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Group</label>
                            <textarea name="group" class="form-control <?php echo (!empty($group_err)) ? 'is-invalid' : ''; ?>"><?php echo $group; ?></textarea>
                            <span class="invalid-feedback"><?php echo $group_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Mat No</label>
                            <input type="text" name="mat_no" class="form-control <?php echo (!empty($mat_no_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $mat_no; ?>">
                            <span class="invalid-feedback"><?php echo $mat_no_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="group.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>