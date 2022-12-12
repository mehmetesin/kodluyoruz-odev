<?php

use mEsin\Core\Db;

class Users extends Db
{
    public function Get($id)
    {
        $stmt = $this->cn->prepare('SELECT * FROM ' . Env::$dbTbl_users . ' WHERE username = ? LIMIT 1');
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    public function Save($userInfo)
    {
        $stmt = $this->cn->prepare('SELECT * FROM ' . Env::$dbTbl_users . ' WHERE username=? LIMIT 1');
        $stmt->execute([$userInfo->username]);
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        if ($user) {
            Session::set('errorMessage', 'Bu kullanıcı adı uygun değil');
        } else {
            $stmt = $this->cn->prepare('INSERT INTO ' . Env::$dbTbl_users . ' SET name_surname=?, username=?, email=?, password=? ');
            $res = $stmt->execute([$userInfo->name, $userInfo->username, $userInfo->email, $userInfo->password]);
            if ($res) {
                Session::set('username', $userInfo->username);
                Tools::redirect('/user/profile');
            } else {
                Session::set('errorMessage', 'İşlem tamamalanamadı<br>Üyelik bilgileri kaydedilemedi!');
            }
        }
    }

    public function Follow($followup_id, $followed_id)
    {
        $stmt = $this->cn->prepare('SELECT * FROM ' . Env::$dbTbl_follow . ' WHERE followup_id=? AND followed_id =? LIMIT 1');
        $stmt->execute([$followup_id, $followed_id]);
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        if ($user) {
            return 'WAIT';
        } else {
            $stmt = $this->cn->prepare('INSERT INTO ' . Env::$dbTbl_follow . ' SET followup_id=?, followed_id=?, state=?');
            $res = $stmt->execute([$followup_id, $followed_id, 0]);

            if ($res) {
                return 'OK';
                // Tools::redirect('/user/profile');
            } else {
                return 'HATA';
            }
        }
    }

    public function GetFollowRequest($user_id)
    {
        $stmt = $this->cn->prepare('
        SELECT 
            f.id,
            f.followup_id,
            f.followed_id,
            f.state,
            u.id as user_id,
            u.name_surname,
            u.username,
            u.email
        FROM tweet_follow f
        JOIN tweet_users u
        ON u.id = f.followup_id
        WHERE state= 0 AND f.followed_id=?
        ');
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function GetFollowed($user_id)
    {
        $stmt = $this->cn->prepare('
        SELECT 
            f.id,
            f.followup_id,
            f.followed_id,
            f.state,
            u.id as user_id,
            u.name_surname,
            u.username,
            u.email
        FROM tweet_follow f
        JOIN tweet_users u
        ON u.id = f.followed_id
        WHERE state= 1 AND f.followup_id=?
        ');
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function FollowOK($id)
    {
        $stmt = $this->cn->prepare('UPDATE ' . Env::$dbTbl_follow . ' SET state=? WHERE id=?');
        $res = $stmt->execute([1, $id]);

        if ($res) {
            return 'OK';
        } else {
            return 'HATA';
        }
    }

    public function FollowNO($id)
    {
        $stmt = $this->cn->prepare('DELETE FROM ' . Env::$dbTbl_follow . ' WHERE id=?');
        $res = $stmt->execute([$id]);

        if ($res) {
            return 'OK';
        } else {
            return 'HATA';
        }
    }


    public function isFollow($followup_id, $followed_id)
    {
        $stmt = $this->cn->prepare('
        SELECT 
            f.id,
            f.followup_id,
            f.followed_id,
            f.state,
            u.id as user_id,
            u.name_surname,
            u.username,
            u.email
        FROM tweet_follow f
        JOIN tweet_users u
        ON u.id = f.followup_id
        WHERE state= 1 AND f.followup_id=? AND f.followed_id=?
        LIMIT 1
        ');
        $stmt->execute([$followup_id, $followed_id]);
        return $stmt->fetch(PDO::FETCH_OBJ) ? TRUE : FALSE;
    }
}
