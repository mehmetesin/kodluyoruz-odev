<?php

use mEsin\Core\Db;

class Tweet extends Db
{
    public function TweetByUser($id)
    {
        $stmt = $this->cn->prepare('
        SELECT
            posts.user_id,
            users.name_surname,
            users.username,
            users.email,
            users.created_at as user_created,
            posts.id, 
            posts.post,
            posts.created_at as post_created
        FROM  ' . Env::$dbTbl_users . ' users
        JOIN  ' . Env::$dbTbl_posts . ' posts 
        ON users.id=posts.user_id 
        WHERE user_id=? 
        ORDER BY post_created DESC');
        $stmt->execute([$id]);
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getTweets($criteria = '')
    {

        $stmt = $this->cn->prepare('
        SELECT
            posts.user_id,
            users.name_surname,
            users.username,
            users.email,
            users.created_at as user_created,
            posts.id as post_id, 
            posts.post,
            posts.created_at as post_created
        FROM  ' . Env::$dbTbl_users . ' users
        JOIN  ' . Env::$dbTbl_posts . ' posts 
        ON users.id=posts.user_id 
        ORDER BY post_created ' . $criteria . 'DESC');
        $stmt->execute();
        $count = $stmt->rowCount();
        return [$count, $stmt->fetchAll(\PDO::FETCH_OBJ)];
    }
    public function Save($tweet)
    {
        $stmt = $this->cn->prepare('INSERT INTO ' . Env::$dbTbl_posts . ' SET user_id=?, post=?');
        $res = $stmt->execute([$tweet->id, $tweet->post]);
        if (!$res) {
            Session::set('errorMessage', 'Hata!<br>mesajınız gönderilmedi');
        }
    }
}
