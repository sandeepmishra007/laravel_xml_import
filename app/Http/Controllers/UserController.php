<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use DB;
use Illuminate\Support\Facades\Storage;
use Response;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\addUserRequest;
use App\Http\Requests\editUserRequest;
use App\Models\User;

class UserController extends Controller {

    public function index() {
        $userList = User::all();
        return view('user/index')->with('userList', $userList);
    }

    public function add() {
        return view('user/add');
    }

    public function addSubmit(addUserRequest $request) {

        $data = [
            'name' => $request->name,
            'lastName' => $request->lastName,
            'phone' => $request->phone,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $id = User::create($data)->id;

        return redirect("/")->with('success_message', 'Successfully Added.');
    }

    public function edit(Request $request) {
        if ($request->id) {
            $userDetails = User::find($request->id);
            if (!empty($userDetails)) {
                return view('user/edit')->with('userDetails', $userDetails);
            }
        }
        return redirect('/');
    }

    public function editSubmit(editUserRequest $request) {


        $userDetails = User::find($request->id);
        if (!empty($userDetails)) {
            User::where('id', $request->id)->update([
                'name' => $request->name,
                'lastName' => $request->lastName,
                'phone' => $request->phone
            ]);
            return redirect("/")->with('success_message', 'Successfully updated.');
        }

        return redirect('/')->with('error_message', 'Something went wrong!!!');
    }

    public function delete(Request $request) {
        //echo "<pre>"; print_r($request->id);die;
        if ($request->id) {
            User::where(array('id' => $request->id))->delete();
            return redirect('/')->with('success_message', 'Successfully deleted.');
        }
        return redirect('/');
    }

    public function xmlUpload(Request $req) {
        if ($req->isMethod("POST")) {

            if (!empty($req->file('user_file'))) {
                $xmlDataString = file_get_contents($req->file('user_file'));
                $xmlObject = simplexml_load_string($xmlDataString);

                $json = json_encode($xmlObject);
                $phpDataArray = json_decode($json, true);

                if (count($phpDataArray['contact']) > 0) {

                    $dataArray = array();

                    foreach ($phpDataArray['contact'] as $index => $data) {
                        // check duplicate phone 
                        $userDetails = User::where(array('phone' => $data['phone']))->first();
                        if (empty($userDetails)) {
                            $dataArray[] = [
                                "name" => $data['name'],
                                "lastName" => $data['lastName'],
                                "phone" => $data['phone']
                            ];
                        }
                    }
                    User::insert($dataArray);
                    return back()->with('success_message', 'Data saved successfully and duplicate data has been ignored!');
                }
            }
        }

        //    return view("xml-data");
    }

}
