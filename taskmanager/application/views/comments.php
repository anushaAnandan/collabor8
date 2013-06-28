<html>
    <head>
        <title>Comments</title>
    </head>
    <body>
        <?php
        if($comments!="no_comments"){
        foreach($comments as $c){
            echo "<br>".$c->comment."<br>".$c->username." at ".$c->time;
        }}
        echo validation_errors(); 
        echo form_open('http://localhost/taskmanager/index.php/discussion_controller/comments/'.$project_id.'/'.$topic_id);
        ?>
        <p><input type="text" name="comment"/></p>
        <input type="submit" />
    </body>
</html>