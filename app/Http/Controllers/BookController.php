<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // used while generating route names in dashboard
    const MODEL_SHORTCUT = 'books';
    // used while uploading files
    const FILE_PATH = 'books';
    const IMAGE_PATH = 'img/books';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Ҳамаи китобҳо'; 
        $books = Book::latest()->paginate(30);
        $description = null;

        return view('categories.show', compact('title', 'books', 'description'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $book = Book::where('slug', $slug)->firstOrFail();
        
        return view('books.show', compact('book'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function read(Request $request)
    {
        $book = Book::where('slug', $request->name)->firstOrFail();
        $book->views = $book->views + 1;
        $book->save();
        
        return view('books.read', compact('book'));
    }

        /**
     * Display a listing of the resource in dashboard
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboardIndex(Request $request)
    {
        // used while generating route names
        $modelShortcut = self::MODEL_SHORTCUT;

        // for search & counting on index pages
        $allItems = Book::select('title', 'id')->orderBy('title')->get();

        // Default parameters for ordering
        $orderBy = $request->orderBy ? $request->orderBy : 'created_at';
        $orderType = $request->orderType ? $request->orderType : 'desc';
        $activePage = $request->page ? $request->page : 1;

        // orderby Categories
        if ($orderBy == 'category_titles') {
            $items = Book::selectRaw('group_concat(categories.title order by categories.title asc) as category_titles, books.*')
                ->join('book_category', 'books.id', '=', 'book_category.book_id')
                ->join('categories', 'categories.id', '=', 'book_category.category_id')
                ->groupBy('book_id')
                ->orderBy($orderBy, $orderType)
                ->paginate(30, ['*'], 'page', $activePage)
                ->appends($request->except('page'));
        }

        // orderBy Author name 
        else if ($orderBy == 'author_names') {
            $items = Book::selectRaw('group_concat(authors.name order by authors.name asc) as author_names, books.*')
                ->join('author_book', 'books.id', '=', 'author_book.book_id')
                ->join('authors', 'authors.id', '=', 'author_book.author_id')
                ->groupBy('book_id')
                ->orderBy($orderBy, $orderType)
                ->paginate(30, ['*'], 'page', $activePage)
                ->appends($request->except('page'));
        } 
        
        else {
            $items = Book::orderBy($orderBy, $orderType)
                ->paginate(30, ['*'], 'page', $activePage)
                ->appends($request->except('page'));
        }

        return view('dashboard.books.index', compact('modelShortcut', 'allItems', 'items', 'orderBy', 'orderType', 'activePage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // used while generating route names
        $modelShortcut = self::MODEL_SHORTCUT;

        $users = User::orderBy('name')->select('name', 'id')->get();

        return view('dashboard.authors.create', compact('modelShortcut', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate request
        $validationRules = [
            'name' => [
                'required',
                Rule::unique('authors'),
            ],
        ];

        $validationMessages = [
            "name.unique" => "Автор с таким названием уже существует !",
        ];

        Validator::make($request->all(), $validationRules, $validationMessages)->validate();

        // store quote
        $author = new Author();
        $fields = ['name', 'user_id', 'biography', 'popular', 'individual'];
        Helper::fillModelColumns($author, $fields, $request);
        $author->slug = Helper::generateUniqueSlug($request->name, Author::class);

        Helper::uploadModelsFile($request, $author, 'image', $author->slug, self::IMAGE_PATH, 300);

        $author->save();

        return redirect()->route('authors.dashboard.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // used while generating route names
        $modelShortcut = self::MODEL_SHORTCUT;

        $item = Author::find($id);
        $users = User::orderBy('name')->select('name', 'id')->get();

        return view('dashboard.authors.edit', compact('modelShortcut', 'item', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $author = Author::find($request->id);

        // validate request
        $validationRules = [
            'name' => [
                'required',
                Rule::unique('authors')->ignore($author->id),
            ],
        ];

        $validationMessages = [
            "name.unique" => "Автор с таким названием уже существует !",
        ];

        Validator::make($request->all(), $validationRules, $validationMessages)->validate();

        // update author
        $fields = ['name', 'user_id', 'biography', 'popular', 'individual'];
        Helper::fillModelColumns($author, $fields, $request);
        $author->slug = Helper::generateUniqueSlug($request->name, Author::class, $author->id);

        Helper::uploadModelsFile($request, $author, 'image', $author->slug, self::IMAGE_PATH, 300);

        $author->save();

        return redirect()->back();
    }

    /**
     * Request for deleting items by id may come in integer type (single item destroy form) 
     * or in array type (multiple item destroy form)
     * That`s why we need to get them in array type and delete them by loop
     *
     * Checkout Model Boot methods deleting function 
     * Models relations also deleted on deleting function of Models Boot method
     * 
     * @param  int/array  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        $ids = (array) $request->id;
        
        foreach($ids as $id) {
            Author::find($id)->delete();
        }
        
        return redirect()->route('authors.dashboard.index');
    }
}
