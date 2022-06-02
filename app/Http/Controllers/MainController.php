<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        $mostReadableBooks = Book::where('most_readable', true)->inRandomOrder()->get();

        return view('home.index', compact('mostReadableBooks'));
    }
}
