<?php
    include "../connect/connect.php";
    $sql = "CREATE TABLE myComment (";
    $sql .= "myCommentID int(10) unsigned NOT NULL auto_increment,";
    $sql .= "myMemberID int(10) unsigned NOT NULL,";
    $sql .= "myStoryID int(10) unsigned NOT NULL,";
    // $sql .= "youNickName varchar(40) NOT NULL,";
    $sql .= "commentMsg varchar(255) NOT NULL,";
    $sql .= "commentPass varchar(10) NOT NULL,";
    $sql .= "commentDelete int(10) NOT NULL,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY (myCommentID)";
    $sql .= ") charset=utf8;";
    $connect -> query($sql);
?>