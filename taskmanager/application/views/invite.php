<html>
    <head>
        <title>INVITE</title>
    </head>
    <body>
        <?php echo $error_msg; ?>
        <?php echo validation_errors(); ?> 
        <?php echo form_open($url); ?> 
        Enter username:<input type="text" name="user"/>
        <input type="submit"/>
    </body>
</html>