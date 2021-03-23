
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>upload</title>
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
  <li><a class="active" href="group.php">Group</a></li>
  <li><a href="todo.php">Task</a></li>
  <li><a href="upload.php">Upload</a></li>
  <li><a href="skill.php">Feedback</a><li>
  <li><a href="logout.php">Logout</a></li>
</ul>
</head>
<head>
<title>FileUpload</title>
</head>

<body>
<div style="padding: 20px; border: 1px solid #999">


<h2>Upload your document below</h2>
<form enctype="multipart/form-data"
	action="<?php print $_SERVER['PHP_SELF']?>" method="post">
<p><input type="hidden" name="MAX_FILE_SIZE" value="200000" /> <input
	type="file" name="pdfFile" /><br />
<br />
<input type="submit" value="upload!" /></p>
</form>

</div>
</body>
</html>

<?php
if ( isset( $_FILES['pdfFile'] ) ) {
	if ($_FILES['pdfFile']['type'] == "application/pdf") {
		$source_file = $_FILES['pdfFile']['tmp_name'];
		$dest_file = "upload/".$_FILES['pdfFile']['name'];

		if (file_exists($dest_file)) {
			print "The file name already exists!!";
		}
		else {
			move_uploaded_file( $source_file, $dest_file )
			or die ("Error!!");
			if($_FILES['pdfFile']['error'] == 0) {
				print "Pdf file uploaded successfully!";
				print "<b><u>Details : </u></b><br/>";
				print "File Name : ".$_FILES['pdfFile']['name']."<br.>"."<br/>";
				print "File Size : ".$_FILES['pdfFile']['size']." bytes"."<br/>";
				print "File location : upload/".$_FILES['pdfFile']['name']."<br/>";
			}
		}
	}
	else {
		if ( $_FILES['pdfFile']['type'] != "application/pdf") {
			print "Error occured while uploading file : ".$_FILES['pdfFile']['name']."<br/>";
			print "Invalid  file extension, should be pdf !!"."<br/>";
			print "Error Code : ".$_FILES['pdfFile']['error']."<br/>";
		}
	}
}
?>