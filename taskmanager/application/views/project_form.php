<html>
    <head>
        <title>New Project</title>
    </head>
    <body>
        <?php echo $error_msg; ?>
        <?php echo validation_errors(); ?> 
        <?php echo form_open('project_controller/create_project'); ?> 
        
        <p>Title:<input type="text" name="title"/></p>
        <p>Description:<input type="text" name="description"/></p>
        <input type="submit"/>
    </body>
</html>