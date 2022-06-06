<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        $mostReadableBooks = Book::where('most_readable', true)->inRandomOrder()->get();
        $recommendedBooks = Book::where('most_readable', false)->inRandomOrder()->take(7)->get();
        $topBooks = Book::orderBy('views', 'desc')->take(5)->get();
        $latestBooks = Book::latest()->take(15)->get();

        return view('home.index', compact('mostReadableBooks', 'latestBooks', 'recommendedBooks', 'topBooks'));
    }

    public function contacts()
    {
        return view('contacts.index');
    }

    public function faq()
    {
        return view('faq.index');
    }
}
