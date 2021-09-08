<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use App\Information;
use App\Mediator;
use App\Schedule;
use App\Contact;
use Auth;
use Response;

class ClientController extends Controller
{
   
    public function index()
    {
        $clients = Client::where('created_by',Auth::user()->id)
                            ->get();
        return view('staff.client.index', compact('clients'));
    }

  
    public function create()
    {
        return view('staff.client.create');
    }

   
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

    
    public function show($id)
    {
        $clients = Client::findorFail($id);
        $mediators = Mediator::get();
        $conclusions = Schedule::where('created_by', Auth::user()->id)
                                ->get();
        return view('staff.client.show',compact(['clients','mediators','conclusions']));
    }

   
    public function edit($id)
    {
        //
    }

   
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

    public function addinformation(Request $request,$id)
    {
        $clients = Client::findorFail($id);
        $mediators = Mediator::get();
        $contacts = Contact::get();
        return view('staff.client.addinformation',compact(['clients','request','mediators','contacts']));
    }

    public function storeinformation(Request $request)
    {
        $this->validate($request, [
            'mediator_name' => 'required',
            'mediator_phone' => 'required',
        ]);
        $subs= Information::create([
            'client_id' => $request['client_id'],
            'contact_id' => $request['contact_name'],
            'mediator_id' => $request['mediator_name'],
            'first_meeting' => $request['first_meeting'],
            'next_meeting' => $request['first_meeting'],
            'spend_time' => $request['spend_time'],
            'time' => $request['time'],
            'priority' =>$request['checkbox'],
            'description' => $request['description'],
            'created_by' => Auth::user()->id,
            'created_at_np' => date("H:i:s"),
        ]);
        if($subs->save()){
            $pass = array(
              'message' => 'Data added successfully!',
              'alert-type' => 'success'
          );
        }
        return redirect()->route('staff.client.index')->with($pass);
    }
}
