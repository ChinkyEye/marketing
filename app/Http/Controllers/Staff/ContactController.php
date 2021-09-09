<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use Response;
use Auth;

class ContactController extends Controller
{
   
    public function index()
    {  
        $contact=Contact::where('created_by',Auth::user()->id)
                          ->get();
        return view('staff.contact.index',compact('contact'));
    }

    public function getContactList(Request $request)
    {
        $name_id = $request->c_name_id;
        $contact_list = Contact::where('id',$name_id)
                        ->where('is_active','1')
                        ->get();
        return Response::json($contact_list);
    }

   
    public function create()
    {
        return view('staff.contact.create');
    }

   
    public function store(Request $request)
    {
         $this->validate($request, [
        'fullname' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'email' => 'required',
        'post' => 'post',
        ]);

        $clients= Contact::create([
        'fullname' => $request['fullname'],
        'address' => $request['address'],
        'phone' => $request['phone'],
        'email' => $request['email'],
        'post' => $request['post'],
        'created_by' => Auth::user()->id,
        'created_at_np' => date("H:i:s"),
        ]);
        $pass = array(
          'message' => 'Data added successfully!',
          'alert-type' => 'success'
        );
        return redirect()->route('staff.contact.index')->with($pass);
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
