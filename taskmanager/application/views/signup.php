<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php echo validation_errors(); ?> 
<?php echo form_open('register/temp_signup'); ?> 

  <p>Username: 
    <input type="text" name="username">
  </p>
  <p>Company/Organization: 
    <input type="text" name="company">
  </p>
  <p>Email: 
      <input type="email" name="email">
  </p>
  <p>Password: 
      <input type="password" name="password">
  </p>
  <p>confirm password: 
      <input type="password" name="passconf">
  </p>
  <p>
    <input type="submit" name="Submit" value="Submit">
  </p>
</form>
</body>
</html>
