<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SectionsController extends Controller
{
    public function index(Request $request) {

        if(!empty($request->records_per_page)) {
            $request->records_per_page = $request->records_per_page <= env("PAGINATION_MAX_SIZE") ? $request->records_per_page : env("PAGINATION_MAX_SIZE");
        } else {
            $request->records_per_page = env("PAGINATION_DEFAULT_SIZE");
        }

        $sections = Section::where('name', 'LIKE', "%$request->filter%")->paginate($request->records_per_page);
        return view("sections.index", ['sections' => $sections, 'data' => $request]);
    }

    public function create() {
        return view("sections.create");
    }

    public function store(Request $request) {

        // Validación de los datos recibidos en la solicitud
        $validator = Validator::make($request->all(), [

            'name' => 'required|max:64',
        ],
        [
            'name.required' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no puede ser mayor a :max caracteres.',
        ])->validate();

        // Si la validación falla, redirigir de vuelta con los errores
        // if ($validator->fails()) {

        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        try {
            
            $section = new Section();
            $section->name = $request->name;
    
            $section->save();
    
            Session::flash('message', ['content' => 'Sección creada con éxito', 'type' => 'success']);
            return redirect()->action([SectionsController::class, 'index']);

        }catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
            return redirect()->back();
        }

    }

    public function edit($id) {

        $section = Section::find($id);

        if (empty($section)) {

            Session::flash('message', ['content' => "La sección con id '$id' no existe", 'type' => 'error']);
            return redirect()->action([SectionsController::class, 'index']);
        }

        return view('sections.edit', ['section' => $section]);
    }

    public function update(Request $request) {

        try {
            Validator::make($request->all(), [

                'section_id' => 'required|numeric|min:1',
                'name' => 'required|max:64',
            ],
            [
                'section_id.required' => 'El section_id es obligatorio.',
                'section_id.numeric' => 'El section_id debe ser un número.',
                'section_id.min' => 'El section_id no puede ser menor a :min.',
                'name.required' => 'El nombre es obligatorio.',
                'name.max' => 'El nombre no puede ser mayor a :max caracteres.',
            ])->validate();

            $section = Section::find($request->section_id);

            if (empty($section)) {

                Session::flash('message', ['content' => "La sección con id '$request->section_id' no existe", 'type' => 'error']);
                return redirect()->action([SectionsController::class, 'index']);
            }

            $section->name = $request->name;
            $section->save();

            Session::flash('message', ['content' => 'Sección editada con éxito', 'type' => 'success']);
            return redirect()->action([SectionsController::class, 'index']);

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
            return redirect()->back();
        }
    }

    public function delete($id) {
        try {

            $section = Section::find($id);

            if (empty($section)) {

                Session::flash('message', ['content' => "La sección con id '$id' no existe", 'type' => 'error']);
                return redirect()->action([SectionsController::class, 'index']);

            }

            $section->delete();

            Session::flash('message', ['content' => 'Sección eliminada con éxito', 'type' => 'success']);
            return redirect()->action([SectionsController::class, 'index']);

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
            return redirect()->back();
        }
    }
}
