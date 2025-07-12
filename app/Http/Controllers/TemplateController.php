<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function home(){
        $todos = [
            [
                "title" => "dfkj rseo jfh erutreh fdsj fhjnfio terjsdihf9erfjsdugefj ddsfoi sfjdfgf sjfyerjpfsjnjvcxjnjvfhv",
                "body" => "dfkj rseo jfh erutreh fdsj fhjnfio terjsdihf9erfjsdugefj ddsfoi sfjdfgf sjfyerjpfsjnjvcxjnjvfhv"

            ],
            [
                "title" => "dfkj rseo jfh erutreh fdsj fhjnfio terjsdihf9erfjsdugefj ddsfoi sfjdfgf sjfyerjpfsjnjvcxjnjvfhv",
                "body" => "dfkj rseo jfh erutreh fdsj fhjnfio terjsdihf9erfjsdugefj ddsfoi sfjdfgf sjfyerjpfsjnjvcxjnjvfhv"

            ],
            [
                "title" => "dfkj rseo jfh erutreh fdsj fhjnfio terjsdihf9erfjsdugefj ddsfoi sfjdfgf sjfyerjpfsjnjvcxjnjvfhv",
                "body" => "dfkj rseo jfh erutreh fdsj fhjnfio terjsdihf9erfjsdugefj ddsfoi sfjdfgf sjfyerjpfsjnjvcxjnjvfhv"

            ]
        ];
        return view('mytemplate.index', compact('$todos'));
    }
    public function about(){
        return view('mytemplate.about');
    }
    public function post(){
        return view('mytemplate.post');
    }
    public function contact(){
        return view('mytemplate.contact');
    }
}
