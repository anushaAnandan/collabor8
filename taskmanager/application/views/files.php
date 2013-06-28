<html>
    <head>
        <title>Files</title>
    </head>
    <body>
        <?php
        if(!isset($list)){
            echo 'no files';
        }
        else {
            foreach ($list as $files){
                echo '<br><img src="'.$files->profile_pic.'"/><br>';
                echo '<a href="'.$files->file_name.'">'.$files->file_name.'</a>';
            }
        }
        echo '<br><a href="http://localhost/taskmanager/index.php/file_controller/do_upload/'.$project_id.'">Upload</a>'
        ?>
    </body>
</html>