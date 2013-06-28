<html>
    <head>
        <title>Tasks</title>
    </head>
    <body>
        <?php if(isset($task_list)){
            foreach($task_list as $task){
                if(isset($task->title)){
                    echo "<br>Project:".$task->title;
                }
                echo "<br>Task:".$task->task_title;
                echo "<br>Description:".$task->description;
                echo "<br>Created by:".$task->created_by." at ".$task->created_at;
                echo "<br>Assigned to:".$task->assigned_to;
                echo '<br>Deadline:'.$task->deadline;
                if($ind){
                    echo '<br><a href="http://localhost/taskmanager/index.php/todo_controller/remove_todo/'.$task->task_id.'/'.$project_id.'">Remove task</a>';
                }
            }
        }else{
                        echo 'no tasks';} ?>
        <?php if($ind){echo '<a href="http://localhost/taskmanager/index.php/todo_controller/add_task/'.$project_id.'">ADD TASK</a>';} ?>
    </body>
</html>