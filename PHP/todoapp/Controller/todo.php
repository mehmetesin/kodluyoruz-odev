<?php

if (!get_session('login') || get_session('login') != true) redirect('login');

if (route(0) == 'categories' && !route(1)) {
    view('categories/home');
} elseif (route(0) == 'todo' && route(1) == 'add') {
    $return = model('categories', [], 'list');
    view('todo/add', $return['data']);
} elseif (route(0) == 'todo' && route(1) == 'list') {

    $return = model('todo', [], 'list');

    view('todo/list', $return['data']);
} elseif (route(0) == 'todo' && route(1) == 'edit' && is_numeric(route(2))) {

    $return = model('todo', ['id' => route(2)], 'getsingle');

    view('todo/edit', $return['data']);
}
