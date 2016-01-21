<?php

require_once("model/article.php");
require_once("model/comment.php");

$dao = new DAO();

/**
 *
 */
class DAO
{
    private $db;

    function __construct() {
        $servername = "localhost";
        $username = "minimedium_user";
        $password = "secret";
        $dbname = "minimedium";
        try {
            $this->db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            if (!$this->db) {
                die ("Database error");
            }
            // set the PDO error mode to exception
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function readArticleList()
    {
        try {
            $statement = $this->db->prepare("SELECT * FROM t_article ORDER BY art_id DESC;");
            $statement->execute();
            $res = $statement->fetchAll(PDO::FETCH_CLASS,'Article');
        } catch(PDOException $e) {
            die("PDO Error :" . $e->getMessage());
        }
        return $res;
    }

    public function readArticle($art_id)
    {
        try {
            $statement = $this->db->prepare("SELECT * FROM t_article WHERE art_id=:art_id;");
            $statement->bindParam(":art_id", $art_id);
            $statement->execute();
            $res = $statement->fetchAll(PDO::FETCH_CLASS,'Article');
            if (sizeof($res) == 0)
            {
                return NULL;
            }
        } catch(PDOException $e) {
            die("PDO Error :" . $e->getMessage());
        }
        return $res[0];
    }

    public function existsArticle($art_id)
    {
        $res = $this->readArticle($art_id);
        if (!$res) {
            return false;
        }
        return true;
    }

    public function updateArticle($article)
    {
        try {
            $statement = $this->db->prepare(
            "UPDATE t_article SET
            art_title = :art_title,
            art_content = :art_content
            WHERE art_id = :art_id;");

            $statement->bindParam(":art_id", $article->art_id);
            $statement->bindParam(":art_title", $article->art_title);
            $statement->bindParam(":art_id", $article->art_content);

            $statement->execute();

        } catch(PDOException $e) {
            die("PDO Error :" . $e->getMessage());
        }
    }

    public function createArticle($article)
    {
        try {
            $statement = $this->db->prepare(
            "INSERT INTO t_article VALUES (
            null,
            :art_title,
            :art_content);");

            $statement->bindParam(":art_title", $article->art_title);
            $statement->bindParam(":art_id", $article->art_content);
            $statement->execute();

        } catch(PDOException $e) {
            die("PDO Error :" . $e->getMessage());
        }
    }

    public function deleteArticle($art_id)
    {
        try {
            $statement = $this->db->prepare("DELETE FROM t_article WHERE art_id=:art_id;");
            $statement->bindParam(":art_id", $art_id);
            $statement->execute();
        } catch(PDOException $e) {
            die("PDO Error :" . $e->getMessage());
        }
    }



    public function readCommentList($art_id)
    {
        try {
            $statement = $this->db->prepare("SELECT * FROM t_comment WHERE art_id = :art_id ORDER BY com_id DESC;");
            $statement->bindParam(":art_id", $art_id);
            $statement->execute();
            $res = $statement->fetchAll(PDO::FETCH_CLASS,'Comment');
        } catch(PDOException $e) {
            die("PDO Error :" . $e->getMessage());
        }
        return $res;
    }

    public function createComment($comment)
    {
        try {
            $statement = $this->db->prepare(
            "INSERT INTO t_comment VALUES (
            null,
            :com_content,
            :art_id,
            :username);");

            $statement->bindParam(":com_content", $comment->com_content);
            $statement->bindParam(":art_id", $comment->art_id);
            $statement->bindParam(":username", $comment->username);
            $statement->execute();

        } catch(PDOException $e) {
            die("PDO Error :" . $e->getMessage());
        }
    }

    public function deleteComment($com_id)
    {
        try {
            $statement = $this->db->prepare("DELETE FROM t_comment WHERE com_id=:com_id;");
            $statement->bindParam(":com_id", $com_id);
            $statement->execute();
        } catch(PDOException $e) {
            die("PDO Error :" . $e->getMessage());
        }
    }
}

 ?>
