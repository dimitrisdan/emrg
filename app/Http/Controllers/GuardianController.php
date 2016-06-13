<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Guardian;


class GuardianController extends Controller
{
    public function getCreateGuardian(Request $request)
    {
        return view('guardian');
    }

    public function getDeleteGuardian($guardian_id)
    {
        $guardian = Guardian::where('guardian_id', $guardian_id)->first();
        $guardian->delete();
        return redirect()->route('guardian.delete')->with([
            'title' => 'success',
            'message' => 'Successfully deleted guardian'
        ]);
    }


    public function postUpdateGuardian(Request $request)
    {
        //Validation
        $guardian = Guardian::find($request['id']);
        $guardian->guardian_role = $request['guardian_role'];
        $guardian->guardian_firstname= $request['guardian_firstname'];
        $guardian->guardian_lastname = $request['guardian_lastname'];
        $guardian->guardian_telephone = $request['guardian_telephone'];
        $guardian->guardian_email = $request['guardian_email'];
        $guardian->update();

        return redirect()->route('dashboard')->with([
            'msg-status' => 1,
            'msg-message' => 'Guardian updated.'
        ]);
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
