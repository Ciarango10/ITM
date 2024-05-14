<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TasksController extends Controller
{
    public function index(Request $request) {

        $tasks = Task::all();
        return view("tasks.index", ['tasks' => $tasks]);
    }

    public function create() {
        return view("tasks.create");
    }

    public function store(Request $request) {

        // Validación de los datos recibidos en la solicitud
        $validator = Validator::make($request->all(), [

            'title' => 'required|max:64',
        ],
        [
            'title.required' => 'El titulo es obligatorio.',
            'title.max' => 'El titulo no puede ser mayor a :max caracteres.',
        ])->validate();

        try {
            
            $task = new Task();
            $task->title = $request->title;
            $task->completed = $request->has('completed');

            $task->save();
    
            Session::flash('message', ['content' => 'Tarea creada con éxito', 'type' => 'success']);
            return redirect()->action([TasksController::class, 'index']);

        }catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
            return redirect()->back();
        }

    }

    public function edit($id) {

        $task = Task::find($id);

        if (empty($task)) {

            Session::flash('message', ['content' => "La tarea con id '$id' no existe", 'type' => 'error']);
            return redirect()->action([TasksController::class, 'index']);
        }

        return view('tasks.edit', ['task' => $task]);
    }

    public function update(Request $request) {

        try {
            $validator = Validator::make($request->all(), [

                'task_id' => 'required',
                'title' => 'required|max:64',
            ],
            [
                'task_id.required' => 'El id de la tarea es obligatorio.',
                'title.required' => 'El titulo es obligatorio.',
                'title.max' => 'El titulo no puede ser mayor a :max caracteres.',
            ])->validate();

            $task = Task::find($request->task_id);

            if (empty($task)) {

                Session::flash('message', ['content' => "La tarea con id '$request->task_id' no existe", 'type' => 'error']);
                return redirect()->action([TasksController::class, 'index']);
            }

            $task->title = $request->title;
            $task->completed = $request->has('completed');

            $task->save();

            Session::flash('message', ['content' => 'Tarea editada con éxito', 'type' => 'success']);
            return redirect()->action([TasksController::class, 'index']);

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
            return redirect()->back();
        }
    }

    public function delete($id) {
        try {

            $task = Task::find($id);

            if (empty($task)) {

                Session::flash('message', ['content' => "La tarea con id '$id' no existe", 'type' => 'error']);
                return redirect()->action([TasksController::class, 'index']);

            }

            $task->delete();

            Session::flash('message', ['content' => 'Tarea eliminada con éxito', 'type' => 'success']);
            return redirect()->action([TasksController::class, 'index']);

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
            return redirect()->back();
        }
    }
}
