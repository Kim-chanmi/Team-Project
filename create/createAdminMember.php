<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE myAdminMember (";
    $sql .= "myMemberID int(10) unsigned auto_increment,";
    $sql .= "youName varchar(20) NOT NULL,";
    $sql .= "youEmail varchar(40) NOT NULL,";
    $sql .= "youNickName varchar(40) UNIQUE NULL,";
    $sql .= "youPass varchar(40) NOT NULL,";
    $sql .= "youBirth varchar(20) NOT NULL,";
    $sql .= "youPhone varchar(20) NOT NULL,";
    $sql .= "youGender enum('남자', '여자') DEFAULT NULL,";
    $sql .= "youPhoto varchar(250) DEFAULT NULL,";
    $sql .= "youSite varchar(255) DEFAULT NULL,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY (myMemberID)";
    $sql .= ") charset=utf8;";
    $sql .= "ALTER TABLE myAdminMember ADD youImgFile varchar(100) DEFAULT NULL AFTER myMemberID";
    $connect -> query($sql); 
?>