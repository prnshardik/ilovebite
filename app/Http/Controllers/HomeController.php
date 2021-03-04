<?php

    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use DB, Auth, Hash;

    class HomeController extends Controller{

        public function index(Request $request){
            return view('dashboard');
        }
    }
