<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Exception;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    public function index() {

        $authors = Author::all();

        return view("authors.index", ["authors" => $authors]);
    }

    public function create() {

        return view("authors.create");
    }

    public function store(Request $request) {
        
        try{

            $author = new Author();
            $author->first_name = $request->first_name;
            $author->last_name = $request->last_name;

            $author->save();

            return redirect()->action([AuthorsController::class,"index"]);

        }catch(Exception $ex){

            // Log::error($ex);
        }
    }

    public function edit($id) {

        $author = Author::find($id);

        if(empty($author)){

            abort(404, "El autor con id $id no existe");
        }

        return view("authors.edit", ['author' => $author]);
    }

    public function update(Request $request) {
        
        try{

            $author = Author::find($request->author_id);

            if(empty($author)){
    
                abort(404, "El autor con id $request->author_id no existe");
            }

            $author->first_name = $request->first_name;
            $author->last_name = $request->last_name;

            $author->save();

            return redirect()->action([AuthorsController::class,"index"]);

        }catch(Exception $ex){

            // Log::error($ex);
        }
    }

    public function delete($id) {

        $author = Author::find($id);

        if(empty($author)){

            abort(404, "El autor con id $id no existe");
        }

        $author->delete();
        
        return redirect()->action([AuthorsController::class,"index"]);
    }
}
