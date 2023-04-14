<!DOCTYPE html>
<html>
  <head>
    <title>Assignment 1 - Web Dev 2023</title>
    <link rel="stylesheet" type="text/css" href="style/styles.css">
  </head>
  <body>
    <div class="content">
      <h1>Reset Database</h1>
      <?php 
           require_once ("../../conf/settings.php"); 
	
	   	    $conn = mysqli_connect($host, $user,$pswd,$dbnm);

            // Checks if connection is successful
	        if (!$conn) {
			    // Displays an error message
    		    die("Connection failed: " . mysqli_connect_error());
	        }  
            
            $query = "DROP TABLE assignment_one";

            // Execute the query
            $result = mysqli_query($conn, $query)

            if(!$result){
                return {
                    echo 'Error resetting the database: ' . mysqli_error() . '<br> <br>';
                    echo 'Please create a new status on the post status form page <br> <br>'
                    echo '<a href=poststatusform.php>Create a Status<a> <br>';
                    echo '<a href=index.html>Return to Home Page<a> <br>';
                    echo '<a href=about.html>Return to About Page<a>';
                };
            } else {
                return {
                    echo 'Successfully reset the database! <br>';
                    echo '<a href=index.html>Return to Home Page<a> <br>';
                    echo '<a href=about.html>Return to About Page<a>';
                };
            }

            // Close the connection
            mysqli_close($conn);
      ?>
      <a href="searchstatusform.html">Search for another status</a>
      <a href="index.html">Return to Home Page</a>
    </div>
  </body>
</html>
