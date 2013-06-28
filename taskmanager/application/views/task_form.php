<html>
    <head>
        <title>Add task</title>
    </head>
    <body>
        
        <?php echo validation_errors(); ?> 
        <?php echo form_open('http://localhost/taskmanager/index.php/todo_controller/add_task/'.$project_id); ?> 
        
        <p>Title: <input type="text" name="title"/></p>
        <p>Description: <input type="text" name="description"/></p>
        <p>Assign to: <select name="assigned_to[]" multiple="multiple">
                <?php foreach($members as $mem){
                    echo '<option value="'.$mem.'">'.$mem.'</option>';
                }
                ?>
            </select></p>
        <p>Deadline: <input type="date" name="deadline"/></p>
        <input type="submit"/>
    </body>
</html>