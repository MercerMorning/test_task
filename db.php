<?php
require_once("config.php");

class DB
{
    protected static $pdo;

    public function __construct()
    {
        if (self::$pdo === null) {
            self::$pdo = new \PDO(
                DSN_DB, USERNAME_DB, PASSWORD_DB
            );
        }
    }

    public function createPost($request)
    {
        $sql = "INSERT INTO `posts` (id, userId, title, body) VALUES (:id, :user_id, :title, :body)";
        $statement = self::$pdo->prepare($sql);
        $ret = $statement->execute(["id" => $request["id"],
            "user_id" => $request["userId"],
            "title" => $request["title"],
            "body" => $request["body"]
        ]);
        return $ret;
    }

    public function createComment($request)
    {
        $sql = "INSERT INTO `comments` (id, postId, name, email, body) VALUES (:id, :postId, :name, :email, :body)";
        $statement = self::$pdo->prepare($sql);
        $ret = $statement->execute(["id" => $request["id"],
            "postId" => $request["postId"],
            "name" => $request["name"],
            "email" => $request["email"],
            "body" => $request["body"]
        ]);
        return $ret;
    }

    public function searchPosts($comment)
    {
        $sql = "SELECT posts.title, comments.body FROM `posts` INNER JOIN comments WHERE comments.body LIKE :comment AND comments.postId = posts.id";
        $statement = self::$pdo->prepare($sql);
        $statement->execute(["comment" => "%" . $comment . "%",
        ]);
        return $statement->fetchAll(\PDO::FETCH_ASSOC);;
    }

}
