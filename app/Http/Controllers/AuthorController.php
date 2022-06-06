<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // used in search & filter by letter
        $allAuthors = Author::orderBy('name')->select('name', 'slug', 'popular')->get();
        if($request->popular) {
            $allAuthors = $allAuthors->where('popular', true);
        }

        // filter by letter
        $filterLetters = [];

        // get all letters
        foreach($allAuthors as $author) {
            array_push($filterLetters, mb_substr($author->name, 0, 1));
        }

        // remove duplicates letters
        $filterLetters = array_unique($filterLetters);

        // paginate authors due to request
        $authors = Author::orderBy('foreign')->orderBy('name');

        // filter popular
        $popular = $request->popular;
        if($popular) {
            $authors = $authors->where('popular', true);
        }

        // filter by letter
        $activeLetter = $request->letter;
        if($activeLetter) {
            $authors = $authors->where('name', 'LIKE', $activeLetter . '%');
        }

        $authors = $authors->paginate(30)->appends($request->except('page'));

        // generate page title
        $title = $popular ? 'Муаллифони машҳур' : 'Муаллифон';

        return view('authors.index', compact('allAuthors', 'authors', 'filterLetters', 'activeLetter', 'popular', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $author = Author::where('slug', $slug)->firstOrFail();

        return view('authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        //
    }
}
