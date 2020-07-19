<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;

class AboutsController extends Controller
{
    public function update($id){

        $errors = ['tab' => 'active'];

        $about = About::findOrFail($id);
        $about->about_line = request('about_line');
        $about->facebook_link = request('facebook_link');
        $about->twitter_link = request('twitter_link');
        $about->instagram_link = request('instagram_link');
        $about->linkedin_link = request('linkedin_link');
        $about->phone_line_1 = request('phone_line_1');
        $about->phone_line_2 = request('phone_line_2');
        $about->phone_line_3 = request('phone_line_3');
        $about->save();

        return redirect('home')->with('update-order', 'About us details udpated!')->with('errors', $errors);
    }
}
