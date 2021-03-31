<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OsnovniController extends Controller
{
    protected $data;

    public function __construct(){
        $this->data["menu"] = [
            [
                "name" => "Home",
                "route" => "home"
            ],
            [
                "name" => "Products",
                "route" => "products"
            ],
            [
                "name" => "Contact",
                "route" => "contact"
            ]
        ];

        $this->data["products"] = [
            [
                "name" => "Item One",
                "price" => "24.99",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!",
                "image" => "700x400.png"
            ],
            [
                "name" => "Item Two",
                "price" => "24.99",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!",
                "image" => "700x400.png"
            ],
            [
                "name" => "Item Three",
                "price" => "24.99",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!",
                "image" => "700x400.png"
            ],
            [
                "name" => "Item Four",
                "price" => "24.99",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!",
                "image" => "700x400.png"
            ],
            [
                "name" => "Item Five",
                "price" => "24.99",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!",
                "image" => "700x400.png"
            ],
            [
                "name" => "Item Six",
                "price" => "24.99",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!",
                "image" => "700x400.png"
            ]
        ];
    }
}
