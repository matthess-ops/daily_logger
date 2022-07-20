<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Client;
use App\Http\Middleware\checkIsAdmin;
use App\Http\Middleware\checkIsClient;
use App\Http\Middleware\checkIsMentor;
use App\User;

use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    //function = admin gets all client +user data, user data contains the all important email.
    public function index(){
        //Get all clients with user data
        $clients = Client::with('user')->paginate(15);
        //Return the client view with clients plus user data compacted
        return view('admin.clients',compact('clients'));

    }

    //function = admin search of the clients
    //$request->input(search) = the search query
    public function search(Request $request){
   // Get the search value from the request
   $search = $request->input('search-client');

   // Search in the firstname and lastname columns of the client table
   $clients = Client::with('user')
       ->where('firstname', 'LIKE', "%{$search}%")
       ->orWhere('lastname', 'LIKE', "%{$search}%")
       ->paginate(15);

   // Return the search view with the results compacted
   return view('admin.clients',compact('clients'))->with('searchQuery', $search);
}

//function = admin gets client plus user data of interest
//$id =  the id of the user
public function adminShow($id){
    // get client plus user data
    $client = Client::with('user')->find($id);
    // Return the view with client data
    return view('admin.client', compact('client'));

}

    //function =   client gets their account data
    public function account(){
        //Get user user data
        $user = auth::user();
        //Get user client data
        $client = $user->client;
        //Return the account view with client and user data compated
        return view('client.account',compact('client','user'));
    }
    // //save the user inputted client data
    // public function save(Request $request){
    //     $user = auth::user();
    //     $client = $user->client;

    //     $validatedData = $request->validate([
    //         'firstname' => 'required',
    //         'lastname' => 'required',
    //         'email' => [
    //             'required',
    //             'email',
    //             Rule::unique('users')->ignore($user->id, 'id')
    //         ],            'street' => 'required',
    //         'street_nr' => 'required',
    //         'postcode'=>'required',
    //         'phone_number'=>'required',
    //         'city'=>'required',
    //     ]);
    //     $client->firstname= $request->input('firstname');
    //     $client->lastname= $request->input('lastname');
    //     $client->save();
    //     return redirect()->back();
    // }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // check if input id is the same as the auth id, because the client should only be possible to see its own data
        // admin and mentor should also be able to see the data
        $user = User::find(Auth::id());

        if($user->isAdmin() Or $user->isMentor()){
            $client = $user->client;
            return view('client.account.personal-information',compact('user'));
        }elseif(Auth::id() == $id){
            $client = $user->client;
            return view('client.account.personal-information',compact('user'));
        }else{
            return redirect()->back();
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // only user can edit his own data
    public function edit($id)
    {
        if(Auth::id() == $id){
            $user = User::find(Auth::id());
            $client = $user->client;
            return view('client.account.edit-personal-information',compact('user'));
        }else{
            return redirect()->back();

        }
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
        if(Auth::id() == $id){
            $user = User::find(Auth::id());
            $client = $user->client;
            $validatedData = $request->validate([
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users')->ignore($user->id, 'id')
                ],            'street' => 'required',
                'street_nr' => 'required',
                'street' => 'required',

                'postcode'=>'required',
                'phone_number'=>'required',
                'city'=>'required',
            ]);

            $client->firstname= $request->input('firstname');
            $client->lastname= $request->input('lastname');
            $client->street= $request->input('street');
            $client->street_nr= $request->input('street_nr');
            $client->city= $request->input('city');
            $client->postcode= $request->input('postcode');
            $client->phone_number= $request->input('phone_number');

            $client->save();

            $user->email= $request->input('email');

            $user->save();



            return redirect()->back();

        }else{
            return redirect()->back();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
