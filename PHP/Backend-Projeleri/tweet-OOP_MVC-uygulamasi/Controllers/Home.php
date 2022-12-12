<?php

namespace mEsin\Controllers;

use mEsin\Core\Controller;
use Session;

class Home extends Controller
{
    public function Index(): void
    {

        $user_id = Session::get('userId');

        $followed = $this->Model('Users')->GetFollowed($user_id);
        $criteriaSQL = '';

        if (count($followed) > 1) {
            for ($i = 0; $i < count($followed); $i++) {
                $criteriaSQL .= ' user_id=' . $followed[$i]->user_id . ' ';
                if ($i < count($followed) - 1) $criteriaSQL .=  ' OR ';
            }
        } else {
            if (isset($followed[0])) $criteriaSQL = ' AND user_id=' . $followed[0]->user_id . ' ';
        }

        if ($criteriaSQL != '') {
            [$count, $tweets] = $this->Model('Tweet')->getTweets($criteriaSQL);
        } else {
            [$count, $tweets] = $this->Model('Tweet')->getTweets();
        }

        $header_params = [
            'title' => 'Ana Sayfa'
        ];


        $params = [
            'header' => (object) $header_params,
            'posts' => $tweets,
            'count' => $count
        ];


        $this->view('Home', $params);
    }
}
