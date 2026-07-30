<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        echo "This is user controller index";
    }
    function save()
    {
        echo "This is user controller save";
    }
    function create()
    {
        echo "This is user controller create";
    }
    function show()
    {
        echo "This is user controller show";
    }
    function edit($id)
    {
        echo "This is user controller edit id" . $id;
    }
    function delete($id)
    {
        echo "This is user controller delete id" . $id;
    }
}
