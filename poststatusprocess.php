<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Assignment 1 - Web Dev 2023</title>
</head>
<body>
    <h1>Post Status Process</h1>
    <?php
    
    	$statuscode = $_POST["statuscode"];
	$status = $_POST["status"];
	$shareOption = $_POST["shareOption"];
	$date = $_POST["date"];
	$likePermission= $_POST["likePermission"];
    	$commentPermission= $_POST["commentPermission"];
    	$sharePermission= $_POST["sharePermission"];

        if($statuscode && $status && $shareOption && $date ){
        	require_once ("../../conf/settings.php"); 
	
		$conn = mysqli_connect($host,
			$user,
			$pswd,
			$dbnm);

 		// Checks if connection is successful
		if (!$conn) {
			// Displays an error message
    			die("Connection failed: " . mysqli_connect_error());
		} 

		$sql_tble = "assignment_one";
 		$timestamp = strtotime($date);
    		$formattedDate = date("d/m/Y", $timestamp);

		// Validates date using checkdate function after removing the "/"
		// index 0 = Day 
		// index 1 = Month
		// index 2 = Year
            	$dateParts = explode('/', $date);
		

            	if (!checkdate($dateParts[1], $dateParts[0], $dateParts[2])) {
                	echo "<p>Date is not valid: ", $date, "</p>";
                	return;
            	}
		
		// Create table if it does not exist
		$sql = "CREATE TABLE IF NOT EXISTS $sql_tble (
    		status_code VARCHAR(5) PRIMARY KEY,
    		status_description TEXT NOT NULL,
            	share VARCHAR(10) NOT NULL,
            	status_date DATE NOT NULL,
            	allow_like TINYINT(1) NOT NULL DEFAULT 0,
            	allow_comment TINYINT(1) NOT NULL DEFAULT 0,
            	allow_share TINYINT(1) NOT NULL DEFAULT 0
            	)";
            
		// Executes the query
		$result = mysqli_query($conn, $sql);

		// checks if the execution was successful
		if(!$result) {
			echo "<p>Something is wrong with: ", $sql, "</p>";
			echo "<p>Error message: " . mysqli_error($conn) . "</p>";
			return;
		}
		
		// Set up the SQL command to add the data into the table
		$query = "INSERT INTO $sql_tble"
			 ."(status_code, status_description, share, status_date, allow_like, allow_comment, allow_share)"
			. " VALUES"
			."('$statuscode','$status','$shareOption', '$formattedDate', '$likePermission', '$commentPermission', '$sharePermission')";

		// executes the query
		$result = mysqli_query($conn, $query);

		// checks if the execution was successful
		if(!$result) {
			echo "<p>Something is wrong with: ", $query, "</p>";
			echo "<p>Error message: " . mysqli_error($conn) . "</p>";
		} else {
			// display an operation successful message
			echo "<p>Success! " . $statuscode . " added! </p>";
			echo "<p>". $formattedDate . "</p>";
			echo "Created date is " . date("d/m/Y", $formattedDate);
		} 

		// close the database connection
		mysqli_close($conn);
	} else {
            echo "<p> Please enter a value for all fields in the input form.";
        }
    ?>
</body>
</html>
