<?php


namespace App\Http\Controllers;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Link;
use App\Models\Nav;

class FirstController extends Controller
{
    protected $data;

    public function __construct()
    {
        $this->data['links'] = Link::all();
        $this->data['navs'] = Nav::getNav();
    }
}
