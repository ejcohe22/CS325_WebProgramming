<!DOCTYPE html>
<!--
File: Lab4_ejcohe22.php
Name: Erik Cohen
Class: CS 325, January 2022
Lab: 4
Due date: Monday, January 10, at 11:59pm
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The 12 Days of Christmas</title>
    <!-- Stylesheet -->
    <link href="12days.css" type="text/css" rel="stylesheet"/>
<?php
    function get_suffix($day){
        if ($day == 1){
            return 'st';
        }elseif ($day == 2){
            return 'nd';
        }elseif ($day == 3){
            return 'rd';
        }
        return 'th';
    }

    function get_gift($day, $firstDay){
        /* will output the gift depending on what day
        input : $day - what day of the loop we are in
                $firstDay - Boolean that lets us know to include/exlude "and"
        */
        $my_gifts = array("zero-index", "and a partridge in a pear tree.\n",
        "two turtle doves,\n", "three french hens,\n", "four calling birds,\n",
        "five golden rings,\n", "six geese a-laying,\n", "seven swans a-swimming,\n",
        "eight maids a-milking,\n", "nine ladies dancing,\n", "ten lords a-leaping,\n",
        "eleven pipers piping,\n", "twelve drummers drumming,\n");
        if($firstDay){
            return substr($my_gifts[$day], 4); # remove "and" on first day
        }
        return $my_gifts[$day];
    }
?>
</head>
<body>
    <h1>
        <img src="tree.gif" alt="xmas tree"/>
        12 Days of Christmas
        <img src="tree.gif" alt="xmas tree"/>
    </h1>
<div id="box">
<?php
    for($day = 1; $day <= 12; $day++){
        $suffix = get_suffix($day);
?>
    <div class="day">
        <p>
            On the <strong><?=$day?></strong><?=$suffix?> 
            day of Christmas my true love gave to me...
        </p>
<?php
        for($countdown = $day; $countdown>0; $countdown--){ 
            $description = get_gift($countdown, $day == 1); 
?>
        <p>
            <?= $description?>
        </p>
        <div>
<?php
            for($imgloop = 0; $imgloop < $countdown; $imgloop++){ 
?>
        <img src="gift<?=$countdown?>.jpg" alt="a xmas gift"/>
<?php
            } # end of image loop
?>
        </div>
<?php
        } # end of countdown loop
?>
    </div>
<?php
    } # end of day loop
?>
</div>
</body>
</html>
