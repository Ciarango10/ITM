<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Section;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BlogsController extends Controller
{
    public function index(Request $request) {

        $filter = $request->filter;

        if(!empty($request->records_per_page)) {
            $request->records_per_page = $request->records_per_page <= env("PAGINATION_MAX_SIZE") 
                                                                    ? $request->records_per_page 
                                                                    : env("PAGINATION_MAX_SIZE");
        } else {
            $request->records_per_page = env("PAGINATION_DEFAULT_SIZE");
        }

        $blogs = Blog::with('section')->where('title', 'LIKE', "%$filter%")->paginate($request->records_per_page);
        return view("blogs.index", ['blogs' => $blogs, 'data' => $request]);

    }

    public function create() {
        $sections = Section::all();
        return view("blogs.create", ['sections' => $sections]);
    }

    public function store(Request $request) {

        // Validación de los datos recibidos en la solicitud
        $validator = Validator::make($request->all(), [

            'title' => 'required|max:64',
            'description' => 'required',
            'section_id' => 'required|exists:sections,id'

        ],
        [
            'title.required' => 'El titulo es requerido.',
            'title.max' => 'El titulo no puede ser mayor a :max caracteres.',
            'description.required' => 'La descripción es requerida.',
            'section_id.required' => 'La sección es requerida.',
            'section_id.exists' => 'El id dado para la sección no existe.',

        ])->validate();

        try {
            
            $blog = new Blog();
            $blog->title = $request->title;
            $blog->description = $request->description;
            $blog->section_id = $request->section_id;

    
            $blog->save();
    
            Session::flash('message', ['content' => 'Blog creado con éxito', 'type' => 'success']);
            return redirect()->action([BlogsController::class, 'index']);

        }catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
            return redirect()->back();
        }

    }
 
    public function edit($id) {

        $blog = Blog::find($id);
        $sections = Section::all();

        if (empty($blog)) {

            Session::flash('message', ['content' => "El blog con id '$id' no existe", 'type' => 'error']);
            return redirect()->action([BlogsController::class, 'index']);
        }

        return view('blogs.edit', ['blog' => $blog, 'sections' => $sections]);
    }

    public function update(Request $request) {

        try {
            Validator::make($request->all(), [

                'blog_id' => 'required|exists:blogs,id', 
                'title' => 'required|max:64',
                'description' => 'required',
                'section_id' => 'required|exists:sections,id'
    
            ],
            [
                'title.required' => 'El titulo es requerido.',
                'title.max' => 'El titulo no puede ser mayor a :max caracteres.',
                'description.required' => 'La descripción es requerida.',
                'section_id.required' => 'La sección es requerida.',
                'section_id.exists' => 'El id dado para la sección no existe.'
    
            ])->validate();

            $blog = Blog::find($request->blog_id);

            if (empty($blog)) {

                Session::flash('message', ['content' => "El blog con id '$request->blog_id' no existe", 'type' => 'error']);
                return redirect()->action([BlogsController::class, 'index']);
            }

            $blog->title = $request->title;
            $blog->description = $request->description;
            $blog->section_id = $request->section_id;

    
            $blog->save();

            Session::flash('message', ['content' => 'Blog editado con éxito', 'type' => 'success']);
            return redirect()->action([BlogsController::class, 'index']);

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
            return redirect()->back();
        }
    }

    public function delete($id) {
        try {

            $blog = Blog::find($id);

            if (empty($blog)) {

                Session::flash('message', ['content' => "El blog con id '$id' no existe", 'type' => 'error']);
                return redirect()->action([BlogsController::class, 'index']);
                
            }

            $blog->delete();

            Session::flash('message', ['content' => 'Blog eliminado con éxito', 'type' => 'success']);
            return redirect()->action([BlogsController::class, 'index']);

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
            return redirect()->back();
        }
    }
}
