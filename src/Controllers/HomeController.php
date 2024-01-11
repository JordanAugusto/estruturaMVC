<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Utils\RenderView;

class HomeController{
    public function index(Request $request, Response $response){
        return $response::json([
            'nome' => "Jordan",
        ]);
    }

    public function show(Request $request, Response $response){

        try{
            return RenderView::render('home', ['title' => 'Home Page']);
        }catch(\Exception $e){
            return $response::json([
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function create(Request $request, Response $response){
        echo "Create";
    }

    public function update(Request $request, Response $response){
        echo "Update";
    }

    public function delete(Request $request, Response $response){
        echo "Delete";
    }
}