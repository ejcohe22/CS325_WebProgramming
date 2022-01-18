<!DOCTYPE html>
<!--
    File: Lab5_ejcohe22.html
    Name: Erik Cohen
    Class: CS 325, January 2022
    Lab: 1
    Due date: Tuesday, January 11, at 11:59pm
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 5 Interactive Comment Section</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
<?php
    date_default_timezone_set('America/New_York');
    function write_comments($comment_array){
        /* create an array of comments
        from a textfile stored on the server
        */
        $file = '/comments.txt';
        file_put_contents($file, '<?php return ' . var_export($comment_array, true) . ';') ;
    }
    function get_comments(){
        /* create an array of comments
        from a textfile stored on the server
        */
        return include '/comments.txt';
    }
?>
</head>


<body>
<?php
    $alert = "";
    //read comments from text file. if file empty initalize with empty array
    $comment_array = get_comments();
    if(!is_array($comment_array)){
        $comment_array = [];
    }
    //validate both name and comment are submitted
    if( isset($_GET["name"]) && isset($_GET["comment"]) ) {
        $name = $_GET["name"];
        $comment = $_GET["comment"];
        $today = date("D M j Y, g:i a");
        if(empty($name) || empty($comment)){
            $alert = "Error: To enter a comment you need to enter a name and comment";
        }else{
            //add to start of array
            array_unshift($comment_array, $comment, $today, $name);
            //write to txt file for persistence
            write_comments($comment_array);
        }
    }else{
        $alert = "Error: To enter a comment you need to enter a name and comment";
    }
?>
    <h1>User Comments</h1>
    <p class="alert"> 
        <?=$alert?>
    </p>
<?php
    // move through each comment block 
    for($i=0;$i<count($comment_array);$i+=3){
        $comment = $comment_array[$i];
        $time = $comment_array[$i + 1];
        $name = $comment_array[$i + 2];
?>
    <div class="comment">
    <p>
<?php
    // seperat comment into words
    $words = explode(' ', $comment);
    foreach($words as $word){
        //check if a link. wraps in html element (not sure how to do this without html tags)
        if(preg_match('/^(http:\/\/|https:\/\/)/i',$word)){
            $word = "<a href=$word> $word </a>";
        }
?>
        <?=$word?>
<?php
    }
?>
    </p>
        <div class="inline-buttons">
            <p class="left"><?=$time?></p>
            <p class="right"><?=$name?></p>
        </div>
    </div>
<?php
    }
?>
    <form action="./Lab5_ejcohe22.php" method="get">
        <legend>Add a comment</legend>
        <div class="inner-form">
            <label for="name">Name: </label>
            <input type="text" id="name" name= "name" placeholder="enter your name" />
            <label for="comment">Comment: </label>
            <textarea id="comment" name= "comment" rows=4 cols = 40>enter a comment</textarea>
            <div class="inline-buttons">
                <input class="button" type="reset"> 
                <input class="button" type="submit">
            </div>
        </div>
    </form>
</body>
</html>
