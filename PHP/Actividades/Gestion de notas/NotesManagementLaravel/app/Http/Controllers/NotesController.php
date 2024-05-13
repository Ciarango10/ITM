<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->filter;

        if (!empty($request->records_per_page)) {
            $request->records_per_page = $request->records_per_page <= env("PAGINATION_MAX_SIZE")
                ? $request->records_per_page
                : env("PAGINATION_MAX_SIZE");
        } else {
            $request->records_per_page = env("PAGINATION_DEFAULT_SIZE");
        }

        $notes = Note::with('category')->where('title', 'LIKE', "%$filter%")->paginate($request->records_per_page);
        return view('notes.index', ['notes' => $notes, 'data' => $request]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('notes.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        try {
            $note = new Note;
            $note->title = $request->title;
            $note->content = $request->content;
            $note->category_id = $request->category_id;
            $note->save();
            return redirect()->action([NotesController::class, "index"]);

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function edit($id)
    {
        $note = Note::findOrFail($id);
        $categories = Category::all();
        return view('notes.edit', ['note' => $note, 'categories' => $categories]);
    }

    public function update(Request $request)
    {
        try {

            $note = Note::find($request->note_id);

            if (empty($note)) {

                abort(404, "La nota con id $request->note_id no existe");
            }

            $note->title = $request->title;
            $note->content = $request->content;
            $note->category_id = $request->category_id;

            $note->save();
            return redirect()->action([NotesController::class, "index"]);

        } catch (\Exception $e) {
            echo $e->getMessage();
        }

    }

    public function delete($id)
    {
        try {

            $note = Note::find($id);

            if (empty($note)) {

                abort(404, "La nota con id $id no existe");
            }
            $note->delete();

            return redirect()->action([NotesController::class, "index"]);

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

}
