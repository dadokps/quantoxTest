<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\User;

class SearchController extends Controller
{
    public function get_results($keyword){
        return view('users.results')
                ->withUsers(User::search($keyword));
    }
    
    public function post_search(){
        $keyword = htmlentities(Input::get('keyword'));
        if(empty($keyword)){
            $message = 'No keyword entered, please try again';
            return view('searchUsers')->withMessage($message);
        }
        
        return Redirect::to('results/'.$keyword);
    }
}
