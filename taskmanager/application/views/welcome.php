<html>
    <head>
        <title>Welcome</title>
    </head>
    <body>
        <h2>Welcome <?php echo $username;?>,</h2>
        <a href="http://localhost/taskmanager/index.php/users_controller/logout">Logout</a>
        <a href="http://localhost/taskmanager/index.php/project_controller/my_projects">Projects</a>
        <a href="http://localhost/taskmanager/index.php/users_controller/get_activities">Activities</a>
        <a href="http://localhost/taskmanager/index.php/todo_controller/task_list">Calendar</a>
        <a href="http://localhost/taskmanager/index.php/users_controller/edit_profile_pic">edit profile pic</a>
        <?php echo '<img src="http://localhost/taskmanager/images/'.$profile_pic.'"/>'?>
    </body>
</html>