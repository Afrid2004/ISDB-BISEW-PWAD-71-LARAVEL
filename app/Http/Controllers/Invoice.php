<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Invoice extends Controller
{
    function showInvoice()
    {
        $items = [
            ["id" => 1, "name" => "Laptop", "price" => 50000],
            ["id" => 2, "name" => "Smartphone", "price" => 20000],
            ["id" => 3, "name" => "Desktop", "price" => 120000],
        ];
        $name = "Hasan";
        //passing data to view page
        return view("invoice", compact("items", "name"));
    }
}
