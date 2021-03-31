<?php


namespace App\Http\Controllers;

use App\Models\HomeSlider;

class HomeController extends FirstController
{
    public function index() {
        $this->data['home_slider'] = HomeSlider::getHomeSliders();
        return view('pages.home', $this->data);
    }
}
