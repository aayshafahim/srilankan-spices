<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>

<form action="phpmailer/index.php" method="post">
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="email" value="John"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="subject" value="Doe"><br><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="message" value="Doe"><br><br>
  <input type="submit" value="Submit" name="emailsend">
</form> 

<p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>

</body>
</html>

