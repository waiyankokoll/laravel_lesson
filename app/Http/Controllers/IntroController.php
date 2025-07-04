<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IntroController extends Controller
{
    //
    // public function show(string $id) : View 
    // {
    //     return view('user.profile',[
    //         'user' => User::findOrFail($id)
    //     ]);
        
    // }
    public function show()
    {
        $todos = [
            'Learn Laravel',
            'Learn Vue',
            'Learn Inertia',
        ];
        $title = 'Hello Laravel, This is show UI';  
        return view('showui', compact('title','todos'));
    }
    

    public function testfun() {
         return view('test.testui');
    }
}
