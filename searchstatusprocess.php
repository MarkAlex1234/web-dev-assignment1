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

	// If the string is empty or if only spaces are sent reject the search
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
                echo '<a href=poststatusform.php>Post a new Status<a>';
                return;
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
