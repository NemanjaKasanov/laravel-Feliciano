<?php


namespace App\Http\Controllers;

use App\Models\HomeSlider;
use App\Models\Link;
use App\Models\SliderDish;

class HomeController extends FirstController
{
    public function index() {
        $this->data['home_slider'] = HomeSlider::getHomeSliders();
        $this->data['slider_dishes'] = SliderDish::getSliderDishes();
        return view('pages.home', $this->data);
    }
}
