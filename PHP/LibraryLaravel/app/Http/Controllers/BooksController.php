<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index() {

        $books = Book::all();
        $authors = Author::all();
        return view("books.index", ["books" => $books, "authors"=> $authors]);

    }

    public function create() {

        $authors = Author::all();
        return view("books.create", ["authors" => $authors]);

    }

    public function store(Request $request) {
        
        try{
            $book = new Book();

            $book->title = $request->title;
            $book->description = $request->description;
            $book->author_id = $request->author_id;

            $book->save();
            return redirect()->action([BooksController::class,"index"]);

        }
        catch(\Exception $e){
            echo $e->getMessage();
        }
    }

    public function edit($id) {

        $book = Book::find($id);
        $authors = Author::all();

        if(empty($book)){

            abort(404, "El Libro con id $id no existe");
        }

        $authorSelected = Author::find($book->author_id);
        if(empty($authorSelected)){

            abort(404, "El autor con id $id no existe");
        }

        return view("books.edit", ['book' => $book, 'authors' => $authors, 'authorSelected' => $authorSelected]);
    }

    public function update(Request $request) {

        try{

            $book = Book::find( $request->book_id );

            if(empty($book)){
    
                abort(404, "El Libro con id $request->book_id no existe");
            }

            $book->title = $request->title;
            $book->description = $request->description;
            $book->author_id = $request->author_id;

            $book->save();
            return redirect()->action([BooksController::class,"index"]);

        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }

    public function delete($id) {
        try{

            $book = Book::find($id);

            if(empty($book)){

                abort(404, "El Libro con id $id no existe");
            }
            $book->delete();

            return redirect()->action([BooksController::class,"index"]);

        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }
}
