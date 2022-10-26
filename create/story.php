<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE myStory (";
    $sql .= "myStory int(10) unsigned auto_increment,";
    $sql .= "myMemberID int(10) unsigned NOT NULL,";
    $sql .= "storyTitle varchar(255) NOT NULL,";
    $sql .= "storyContents longtext NOT NULL,";
    $sql .= "storyCategory varchar(20) NOT NULL,";
    $sql .= "storyAuthor varchar(20) NOT NULL,";
    $sql .= "storyView int(10) NOT NULL,";
    $sql .= "storyLike int(10) NOT NULL,";
    $sql .= "storyImgFile varchar(100) DEFAULT NULL,";
    $sql .= "storyImgSize varchar(100) DEFAULT NULL,";
    $sql .= "storyDelete int(10) NOT NULL,";
    $sql .= "storyRegTime int(10) NOT NULL,";
    $sql .= "storyModTime int(10) DEFAULT NULL,";
    $sql .= "PRIMARY KEY (myStory)";
    $sql .= ") charset=utf8;";

    $connect -> query($sql);
?>