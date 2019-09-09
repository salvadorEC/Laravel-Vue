<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tasks = Task::orderBy('id','ASC')->paginate(5);

        return [
          'pagination' => [
              'total'          => $tasks->total(),
              'current_page'   => $tasks->currentPage(),
              'per_page'       => $tasks->perPage(),
              'last_page'      => $tasks->lastPage(),
              'from'           => $tasks->firstItem(),
              'to'             => $tasks->lastItem(),
          ],
          'tasks' => $tasks
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //recibe todos los datos del form
        //validar que tengamos datos
        $this->validate($request, [
          'keep' => 'required'
        ]);

        //traer todos los registros del modelo campo keep
        Task::create($request->all());
        //no es necesario retornar algun mensaje pq javascript lo hara
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'keep' => 'required',
        ]);

        Task::find($id)->update($request->all());

        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
    }
}
