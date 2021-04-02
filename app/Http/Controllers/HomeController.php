<?php


namespace App\Http\Controllers;

use App\Models\HomeSlider;
use App\Models\Link;
use App\Models\SliderDish;
use App\Models\MasterChef;
use App\Models\Testimony;

class HomeController extends FirstController
{
    public function index() {
        $this->data['home_slider'] = HomeSlider::getHomeSliders();
        $this->data['slider_dishes'] = SliderDish::getSliderDishes();
        $this->data['chefs'] = MasterChef::getChefs();
        $this->data['testimonies'] = Testimony::getTestimonies();
        return view('pages.home', $this->data);
    }
}
