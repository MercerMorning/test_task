<?php
    require_once("../db.php");
    if ($_GET["comment"] && strlen($_GET["comment"]) >= 3) {
        $db = new DB();
        $results = $db->searchPosts($_GET["comment"]);
    }
    include "index.php";
?>