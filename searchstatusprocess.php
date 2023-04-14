<!DOCTYPE html>
<html>
  <head>
    <title>Assignment 1 - Web Dev 2023</title>
  </head>
  <body>
    <div class="content">
      <h1>Status Information</h1>
      <?php 
        $search = $_GET["Search"];

	// If the search is empty or if only spaces are sent reject the search
       	if(!(trim($search ) === '' || empty($search))){
           require_once ("../../conf/settings.php"); 
	
	   $conn = mysqli_connect($host, $user,$pswd,$dbnm);

            // Checks if connection is successful
	    if (!$conn) {
		// Displays an error message
    		die("Connection failed: " . mysqli_connect_error());
	     }       

	    $sql_tble = "assignment_one";

            $sql = "SELECT * FROM ".$sql_tble."";
            
	    // Executes the query to check the table exists:
	    $result = mysqli_query($conn, $sql);
            if(!$result){
                echo 'No status found in the system. Please go to the post status page to post one. <br>';
                echo '<a href=poststatusform.php>Post a new Status<a> <br>';
		echo '<a href=index.html>Return to Home Page<a>';
                return;
            }

	    $sql = "SELECT * FROM ".$sql_tble." WHERE status_description LIKE '%".$search."%'";
	    // Executes the query to find status descriptions like the search sent
	    $result = mysqli_query($conn, $sql);
	    if(mysqli_num_rows($result) == 0){
                echo 'Status not found. Please try a different keyword. <br> <br>';
                echo '<a href=searchstatusform.html>Search for another status<a> <br>';
		echo '<a href=index.html>Return to Home Page<a>';
                return;
            } else {
    		while($row = mysqli_fetch_assoc($result)) {

			if($row['allow_like'] == 1){
				$allowLike = "Allow Like";
			} else {
				$allowLike = "";
			}

			if($row['allow_comment'] == 1){
				$allowComment = "Allow Comment";
			} else {
				$allowComment = "";
			}

			if($row['allow_share'] == 1){
				$allowShare = "Allow Share";
			} else {
				$allowShare = "";
			}

        		// Display the details of the matched status record
			echo 'Status: '.$row['status_description'].'<br>';
        		echo 'Status Code: '.$row['status_code'].'<br> <br>';
			echo 'Share: '.$row['share'].'<br>';
			echo 'Date Posted: '.$row['status_date'].'<br>';
			echo 'Permission: '. ($allowLike ? $allowLike . " | " : '') . ($allowComment ? $allowComment  . " | " : '') . ($allowShare ? $allowShare : '') .'<br>';
        		echo '<br>';
    	    		}
		}
        } else {
            echo 'The search string is empty. Please enter a keyword to search.';
        }
      ?>
      <a href="searchstatusform.html">Search for another status</a>
      <a href="index.html">Return to Home Page</a>
    </div>
  </body>
</html>
