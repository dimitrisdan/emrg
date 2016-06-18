<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Guardian;
use Illuminate\Support\Facades\Crypt;


/**
 * Class GuardianController
 * @package App\Http\Controllers
 */
class GuardianController extends Controller
{
    /**
     * @param Guardian $guardian
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function deleteGuardian(Guardian $guardian) {

        $guardian->delete();

        return redirect()->route('dashboard')->with([
            'msg-status' => 1,
            'msg-message' => 'Guardian deleted'
        ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCreateGuardian(Request $request)
    {
        return view('guardian');
    }

    /**
     * @param $guardian_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDeleteGuardian($guardian_id)
    {
        $guardian = Guardian::where('guardian_id', $guardian_id)->first();
        $guardian->delete();
        return redirect()->route('guardian.delete')->with([
            'title' => 'success',
            'message' => 'Successfully deleted guardian'
        ]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postUpdateGuardian(Request $request)
    {
        //Validation
        $guardian = Guardian::find($request['id']);
        $guardian->guardian_role = $request['guardian_role'];
        $guardian->guardian_firstname = Crypt::encrypt($request['guardian_firstname']);
        $guardian->guardian_lastname = Crypt::encrypt($request['guardian_lastname']);
        $guardian->guardian_telephone = Crypt::encrypt($request['guardian_telephone']);
        $guardian->guardian_email = Crypt::encrypt($request['guardian_email']);
        $guardian->update();

        return redirect()->route('dashboard')->with([
            'msg-status' => 1,
            'msg-message' => 'Guardian updated.'
        ]);
    }

}
