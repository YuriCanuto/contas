<?php

namespace App\Http\Controllers\Cards;

use App\Http\Controllers\Controller;

class NovoCardController extends Controller {

    public function __invoke()
    { 
        return view('cards.create');
    }

}