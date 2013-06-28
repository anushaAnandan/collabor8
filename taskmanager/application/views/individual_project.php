<html>
    <head>
        <title><?php if(!$project_info){
          echo 'error';}
            else {
                    echo $project_info['title'];
                    }?></title>
    </head>
    <body>
        <h1><?php echo $username; ?></h1>
        <h2><?php echo $project_info['title'];?></h2>
        <p><?php echo $project_info['description'];?></p>
        <p>Created by: <?php echo $project_info['admin'];?></p>
        <p>Project leader:<?php 
                                if(isset($project_info['leader'])){
                                        echo $project_info['leader'];
                                        if($previlage == 'admin'){
                                            echo '<a href="http://localhost/taskmanager/index.php/project_controller/remove_leader/'.$project_info['project_id'].'">Remove</a>';
                                        }
                                }
                                elseif($previlage == 'admin'){
                                  echo '<a href="http://localhost/taskmanager/index.php/project_controller/invite_leader/'.$project_info['project_id'].'">Add</a>';
                                }
                                else{
                                    echo 'Not assigned';
                                }
        ?></p>
        <p>Developers:<?php     
                                $arr = explode('/', $project_info['developers']);
                                //print_r($arr);
                                foreach($arr as $a){
                                    if($a!=""&& $a !='&'){
                                        echo $a.'<a href="http://localhost/taskmanager/index.php/project_controller/remove_developer/'.$a.'/'.$project_info['project_id'].'">remove</a><br>';
                                    }
                                }
                                if($previlage == 'admin' || $previlage == 'leader'){
                                    echo '<a href="http://localhost/taskmanager/index.php/project_controller/invite_developer/'.$project_info['project_id'].'">Add</a>';
                                }
                                elseif(!isset ($project_info['developers'])){
                                    echo 'None';
                                }
        ?></p>
        <?php echo '<a href="http://localhost/taskmanager/index.php/todo_controller/task_list/'.$project_info['project_id'].'">Tasks</a>';?>
        <?php echo '<a href="http://localhost/taskmanager/index.php/discussion_controller/topics/'.$project_info['project_id'].'">Discussions</a>';?>
        <?php echo '<a href="http://localhost/taskmanager/index.php/users_controller/get_activities/'.$project_info['project_id'].'">Activities</a>';?>
		<?php echo '<a href="http://localhost/taskmanager/index.php/file_controller/files_list/'.$project_info['project_id'].'">Files</a>';?>
    </body>
          
    
</html>