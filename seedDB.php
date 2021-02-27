<?php
require_once("db.php");

$db = new DB();
$urlPosts = file_get_contents("https://jsonplaceholder.typicode.com/posts");
$urlComments = file_get_contents("https://jsonplaceholder.typicode.com/comments");

$posts = json_decode($urlPosts, true);
$comments = json_decode($urlComments, true);

$countPost = 0;
$countComment = 0;

foreach ($posts as $item) {
    $db->createPost($item);
    $countPost++;
}

foreach ($comments as $item) {
    $db->createComment($item);
    $countComment++;
}

echo "Загружено " . $countPost . " записей и " . $countComment . " комментариев", PHP_EOL;