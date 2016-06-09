<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Guardian;
use Webpatser\Uuid\Uuid;

class GuardianController extends Controller
{
    public function getCreateGuardian(Request $request)
    {
        return view('guardian');
    }
        


    public function postCreateGuardian(Request $request)
    {
        //Validation
//        $guardian = new Guardian();
//        $uuid = Uuid::generate();
//        $guardian->guardianId = $uuid;
//        $guardian->guardianRole = 'contact';
//        $guardian->guardianRole = $request['role'];
//        $guardian->guardianFirstName = $request['firstname'];
//        $guardian->guardianSurName = $request['surname'];
//        $guardian->guardianTelephone = $request['telephone'];
//        $guardian->guardianEmail = $request['email'];

//        $request->patient()->guardian()->save($guardian);

//        return redirect()->route('dashboard');
    }


    /**
     * The task repository instance.
     *
     * @var GuardianRepository
     */
//     protected $guardians;

    /**
     * Create a new controller instance.
     *
     * @param  GuardianRepository $guardians
     */
//    public function __construct(GuardianRepository $guardians)
//    {
//        $this->middleware('auth');
//        $this->guardians = $guardians;
//    }

//    public function index(Request $request)
//    {
//        return view('tasks.index', [
//            'tasks' => $this->tasks->forUser($request->user()),
//        ]);
//    }
//    /**
//     * Create a new task.
//     *
//     * @param  Request  $request
//     * @return Response
//     */
//    public function store(Request $request)
//    {
//        $this->validate($request, [
//            'name' => 'required|max:255',
//        ]);
//        $request->user()->tasks()->create([
//            'name' => $request->name,
//        ]);
//        return redirect('/guardians');
//    }
//    /**
//     * Destroy the given task.
//     *
//     * @param  Request  $request
//     * @param  Task  $task
//     * @return Response
//     */
//    public function destroy(Request $request, Task $task)
//    {
//        $this->authorize('destroy', $task);
//        $task->delete();
//        return redirect('/tasks');
//    }
}
