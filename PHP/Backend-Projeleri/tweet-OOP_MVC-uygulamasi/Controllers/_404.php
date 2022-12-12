<?php

namespace mEsin\Controllers;

use mEsin\Core\Controller;

class _404 extends Controller
{
    public function Index(): void
    {
        $this->view('_404', [], false);
    }
}
