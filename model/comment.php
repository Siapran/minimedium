<!-- create table t_comment (
    com_id integer not null primary key auto_increment,
    com_content varchar(500) not null,
    art_id integer not null,
    username varchar(100) not null,
    constraint fk_com_art foreign key(art_id) references t_article(art_id)
) engine=innodb character set utf8 collate utf8_unicode_ci; -->

<?php

require_once("model/dao.php");

/**
* Comment
*/
class Comment
{
    public $com_id;
    public $com_content;
    public $art_id;
    public $username;

    public function save()
    {
        global $dao;
        if (isset($this->com_id)) {
            $dao->updateComment($this);
        } else {
            $dao->createMovie($this);
        }
    }

    public function delete()
    {
        global $dao;
        if (isset($this->com_id)) {
            $dao->deleteComment($this->com_id);
        }
    }

}

?>
