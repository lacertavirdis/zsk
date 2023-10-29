<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function show(){
        return "Kontroler ShowController";
    }

    public function showView(){
        $users = [
            'firstName' => 'Anna',
            'lastName' => 'Nowak',
            'city' => 'Poznań',
            'hobby' => ['siatkówka', 'piłka ręczna', 'skoki narciarskie', 'żużel']
        ];
        return View('users', $users);
    }

    public function showArray(){
        $users = [
            'firstName' => 'Anna',
            'lastName' => 'Nowak',
            'city' => 'Poznań',
            'hobby' => ['siatkówka', 'piłka ręczna', 'skoki narciarskie', 'żużel']
        ];
        return View('usersarray', ['users' => $users]);
    }
}
