<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;


class UserController extends Controller
{

    public $successStatus = 200;

    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
     public function login(Request $request){

        //Validator To check valid or not
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:3|max:12'
        ]);

        // Data Validate Or Not
        if (! $validator->fails()) {

            // Data Collect For Generate Token
            $data = [
                'grant_type' => 'password',
                'client_id' => env('CLIENT_ID', ''),
                'client_secret' => env('CLIENT_SECRET', ''),
                'username' => request('email'),
                'password' => request('password'),
            ];

            // Fire request to gerate tocken or get message if not authorised
            $request = Request::create('/oauth/token', 'POST', $data);

            // send json Response
            return app()->handle($request);

        }else{

            // If validation vaild then response
            return response()->json(['error' => $validator->errors()], 500);
        }

    }

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        // Check Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        // IF validation pass
        if (! $validator->fails()) {

            // For generate token
            $password = $request->password;

            // Password encript for store in database
            $request->merge(['password' => bcrypt($request->password)]);

            // Create User
            $user = User::create($request->all());

            // Data Colect for generate Token
            $data = [
                'grant_type' => 'password',
                'client_id' => env('CLIENT_ID', ''),
                'client_secret' => env('CLIENT_SECRET', ''),
                'username' => $request->email,
                'password' => $password,
            ];

            // REquest in passport genereate tocken
            $response = Request::create('/oauth/token', 'POST', $data);

            // Response tocken or invalid credential
            return app()->handle($response);
        }else{
            // Validation Fail
            return response()->json(['error'=>$validator->errors()], 500);
        }

    }
    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        // Get User Detail Who is login
        $user = auth("api")->user();
        return response()->json(['success' => $user], $this-> successStatus);
    }



    public function index(Request $request)
    {

        $input = $request->all();
        $search = trim($request->search['value']);
        $length = array_key_exists('length',$input) ? $input['length'] : 10;

        // Resource get
        $qry = User::select('*');

        // For search in database
        if ($search != "") {
            $qry->orWhere(function($query) use ($search){
                $query->orWhere('name', 'LIKE', '%' .$search . '%');
                $query->orWhere('email', 'LIKE', '%' .$search . '%');
            });
        }

        // Find Total No of User
        $total = count($qry->get());
        $rec = $qry->offset(array_key_exists('start', $input) ? $input['start'] : 0)->limit($length)->get();

        if($rec){
            $data['data'] = $rec;
            $data['recordsTotal'] = $total;
            $data['recordsFiltered'] = $total;
        }

        //  Return json Response with data table data
        return response($data,200);

    }

    public function show($id)
    {
        // Find Resource
        $user = User::where('id',$id)->first();

        // If Resource Find
        if($user){
            return response($user , 200);
        }else{
            // If Resource not Find
            return response('Record Not Found !!!' , 500);
        }
    }

    public function update(Request $request)
    {
        // Check Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,"'.+$request->id,
            'c_password' => 'same:password',
        ]);


        // If validator pass
        if (! $validator->fails()) {


            // For Passwor encription
            $request->merge(['password' => bcrypt($request->password)]);

            // find resource
            $user = User::where('id',$request->id)->first();

            // if Resource find
            if($user){

                $user->name = $request->name;
                $user->email = $request->email;

                if(isset($request->password)){
                    $user->password = $request->password;
                }

                // Resource successfully updata
                if($user->save()){
                    return response("Success" , 200);
                }else{
                    // recource not update
                    return response("Fail To save Resource" , 500);
                }
            }else {
                // if resource not found
                return response("Resource Not Found !!!" , 500);
            }
        }else{
            // if valedation not pass
            return response()->json(['error'=>$validator->errors()], 500);
        }



    }

    // Destroy Resource
    public function destroy(Request $request)
    {
        // If destroye resource
        if(User::where('id',$request->id)->delete()){
            return response("Success To Delete User" , 200);

        }else{
            // If resource not found
            return response("Something Went Wrong" , 500);

        }

    }
}
