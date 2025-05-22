<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function index(Request $request){

        return response()->json(["success"=>true,"message"=>"bien desde el index enpoint"],200);
    }


    public function destroy(Request $request){

        return response()->json(["success"=>true,"message"=>"DElete method"],200);
    }
}
