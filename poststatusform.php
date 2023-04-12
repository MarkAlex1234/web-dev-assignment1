<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Assignment 1 - Web Dev 2023</title>
    <link rel="stylesheet" type="text/css" href="style/styles.css">
</head>

<body>
    <h1>Status Posting System</h1>
    <form action="poststatusprocess.php" method="post">
        <label>Status Code: <input type="text" name="statuscode" required="true"></label>
	<br>
        <label>Status: <input type="text" name="status"></label>
	<br>
        <label>Share:</label>
        <radioLabel><input type="radio" id="publicRadioOption" name="shareOption" value="Public"> Public</radioLabel>
        <radioLabel><input type="radio" id="friendsRadioOption" name="shareOption" value="Friends"> Friends</radioLabel>
        <radioLabel><input type="radio" id="onlyMeRadioOption" name="shareOption" value="Only Me"> Only Me</radioLabel>
	<br>
	<label>Date:</label>
	<input type="text" name="date" value="<?php echo date('d/m/Y'); ?>">
	<br>
        <label>Permission:</label>
        <checkboxLabel><input type="checkbox" id="likePermission" name="likePermission" value="Like"> Allow Like</checkboxLabel>        <checkboxLabel><input type="checkbox" id="commentPermission" name="commentPermission" value="Comment"> Allow Comments</checkboxLabel>
        <checkboxLabel><input type="checkbox" id="sharePermission" name="sharePermission" value="Share"> Allow share</checkboxLabel>
	<br>
        <button type="Post">Submit</button>
    </form>
    <a href="index.html">Return to home page</a>
</body>
</html>
