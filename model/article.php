<!-- create table t_article (
art_id integer not null primary key auto_increment,
art_title varchar(100) not null,
art_content varchar(2000) not null
) engine=innodb character set utf8 collate utf8_unicode_ci; -->

<?php

require_once("model/dao.php");

/**
* Article
*/
class Article
{
    public $art_id;
    public $art_title;
    public $art_content;

    public function save()
    {
        global $dao;
        if (isset($this->art_id)) {
            $dao->updateArticle($this);
        } else {
            $dao->createMovie($this);
        }
    }

    public function delete()
    {
        global $dao;
        if (isset($this->art_id)) {
            $dao->deleteArticle($this->art_id);
        }
    }

}

?>
