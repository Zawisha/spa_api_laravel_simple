<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    public function __construct()
    {
       // $this->middleware(['web','auth:api']);

       // $this->middleware('web');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::latest() -> paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this ->validate($request,[
            'name' => 'required|string|max:191',
            'email' =>'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6'
        ]);

      return User::create([
         'name' => $request['name'],
         'email' => $request['email'],
         'password' => Hash::make($request['password']),
         'bio' => $request['bio'],
//          'photo' => $request['photo']
      ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return $user;
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
    User::where('id', $request['id'])
     ->update(['name' => $request['name'], 'email' => $request['email'], 'bio' => $request['bio']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
    }

    public function edit($id)
    {
       return $user = User::find($id);

    }

    public function profile()
    {
        return $user = User::find('81');
//        return auth('api') -> user();
       // dd('weeer');
      //  return "yes";
    }


    //image controller
    public function updateProfile(Request $request)
    {
        $user = User::find('81');
//        $this->validate($request,[
//            'name' => 'required|string|max:191',
//            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
//            'password' => 'sometimes|required|min:6'
//        ]);


        // $user =  auth('api') -> user();
      if($request->photo)
      {
              $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];

          $img = Image::make($request->photo)->save(public_path('img/profile/').$name);

          $request->merge(['photo' => $name]);

               // return $img;
      }

//        $user->update($request->all());
$up_user=$user->update(['photo' => $name]);
    }


}
