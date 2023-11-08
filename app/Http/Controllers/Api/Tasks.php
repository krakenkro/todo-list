<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Http\Requests\Tasks\Store as StoreRequest;
use App\Http\Requests\Tasks\Update as UpdateRequest;

class Tasks extends Controller
{
    public function index()
    {
        return TaskResource::collection(Task::all());
    }

    public function store(StoreRequest $request)
    {
        $task = Task::create($request->validated());
        return TaskResource::make($task);
    }

    public function show($id)
    {
        $task = Task::find($id);
        if ($task) {
            return TaskResource::make($task);
        }
        return response()->json([
            'message' => 'not found'
        ], 404);

        // try {
        //     $foundTask = Task::findOrFail($id);
        //     if($foundTask) {
        //         return TaskResource::make($foundTask);
        //     } 
        //     throw new \Exception('not found');
        // } catch(\Exception $e) {
        //     return response()->json([
        //         'message' => $e->getMessage()
        //     ], 404);
        // }

        // $foundTask = $task->findOrFail($task->id);
        // return TaskResource::make($foundTask);
        // if (!$foundTask) {
        //     abort(200, 'Задача не найдена');
        // }
    }

    public function update(UpdateRequest $request, Task $task)
    {
        $task->update($request->validated());
        return TaskResource::make($task);
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->delete();
            return response()->noContent();
        }
        return response()->json([
            'message' => 'not found'
        ], 404);
    }

    public function completeTask(Request $request, Task $task)
    {
        $task->status = $request->status;
        $task->save();
        return TaskResource::make($task);
    }
}
