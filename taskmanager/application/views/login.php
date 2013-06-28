<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <?php echo $error_msg;?> 
        <?php echo validation_errors(); ?> 
        <?php echo form_open('users_controller/login'); ?> 
        <p>Username:<input type="text" name="username"/></p>
        <p>Password:<input type="password" name="password"/></p>
        <input type="submit"/>
    </body>
</html>