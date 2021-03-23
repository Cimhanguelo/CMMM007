<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GroupDashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<ul>
  <li><a class="active" href="group1.php">Group</a></li>
  <li><a href="todo.php">Task</a></li>
  <li><a href="upload.php">Upload</a></li>
  <li><a href="skill.php">Feedback</a><li>
  <li><a href="logout.php">Logout</a></li>
</ul>
<style>
* {box-sizing: border-box}

.container {
  width: 100%;
  background-color: #ddd;
}

.skills {
  text-align: right;
  padding-top: 10px;
  padding-bottom: 10px;
  color: white;
}

.planning {width: 80%; background-color: #D2691e;}
.development {width: 60%; background-color: #4b0082;}
.coordination {width: 50%; background-color: #f44336;}
.appraisal {width: 40%; background-color: #808080;}
</style>
</head>
<body>

<h1>Group Feedback</h1>


<p>Planning</p>
<div class="container">
  <div class="planning">80%</div>
</div>

<p>Development</p>
<div class="container">
  <div class="development">65%</div>
</div>

<p>Coordination</p>
<div class="container">
  <div class="Coordination">50%</div>
</div>

<p>Appraisal</p>
<div class="container">
  <div class="appraisal">40%</div>
</div>

</body>
</html>
