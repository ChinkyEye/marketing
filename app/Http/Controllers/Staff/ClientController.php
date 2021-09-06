<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use App\Information;
use Auth;
use Response;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::get();
        return view('staff.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'fullname' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'email' => 'required',
        ]);

        $clients= Client::create([
        'fullname' => $request['fullname'],
        'phone' => $request['phone'],
        'email' => $request['email'],
        'address' => $request['address'],
        'created_by' => Auth::user()->id,
        'created_at_np' => date("H:i:s"),
        ]);
        $pass = array(
          'message' => 'Data added successfully!',
          'alert-type' => 'success'
        );
        return redirect()->route('staff.client.index')->with($pass);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        // dd($id);
        if($client->delete()){
            $notification = array(
              'message' => $client->fullname.' is deleted successfully!',
              'status' => 'success'
          );
        }else{
            $notification = array(
              'message' => $client->fullname.' could not be deleted!',
              'status' => 'error'
          );
        }
        return back()->with($notification)->withInput();  
        // return Response::json($notification);
    }
    public function isActive(Request $request,$id){
      $get_is_active = Client::where('id',$id)->value('is_active');
        $isactive = Client::find($id);
        if($get_is_active == 0){
        $isactive->is_active = 1;
        $notification = array(
          'message' => $isactive->fullname.' is Active!',
          'alert-type' => 'success'
        );
        }
        else {
        $isactive->is_active = 0;
        $notification = array(
          'message' => $isactive->fullname.' is inactive!',
          'alert-type' => 'error'
        );
        }
        if(!($isactive->update())){
        $notification = array(
          'message' => $isactive->fullname.' could not be changed!',
          'alert-type' => 'error'
        );
        }
        return back()->with($notification)->withInput();  
    }

    public function addinformation(Request $request,$id){
        $clients = Client::findorFail($id);
        return view('staff.client.addinformation',compact(['clients','request']));
    }

    public function storeinformation(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'mediator_name' => 'required',
            'mediator_phone' => 'required',
        ]);
        $subs= Information::create([
            'client_id' => $request['client_id'],
            'mediator_name' => $request['mediator_name'],
            'mediator_phone' => $request['mediator_phone'],
            'first_meeting' => $request['first_meeting'],
            'next_meeting' => $request['first_meeting'],
            'c_name' => $request['c_name'],
            'c_phone' => $request['c_phone'],
            'c_email' => $request['c_email'],
            'c_post' => $request['c_post'],
            'description' => $request['description'],
            'created_by' => Auth::user()->id,
            'created_at_np' => date("H:i:s"),
        ]);
        $pass = array(
          'message' => 'Data added successfully!',
          'alert-type' => 'success'
        );
        return redirect()->back()->with($pass);
    }
}
