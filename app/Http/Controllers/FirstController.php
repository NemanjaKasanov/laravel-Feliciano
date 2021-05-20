<?php


namespace App\Http\Controllers;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Link;
use App\Models\Nav;
use Illuminate\Http\Request;

class FirstController extends Controller
{
    protected $data;

    public function __construct(Request $request)
    {
        $this->data['links'] = Link::all();
        $this->data['navs'] = Nav::getNavs($request);
    }

}
