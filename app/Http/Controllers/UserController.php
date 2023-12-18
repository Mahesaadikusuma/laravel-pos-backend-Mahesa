<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserRequestUpdate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        
        $query = $request->search;
        // $users = User::paginate(10);
        $users = DB::table('users')
        ->where('name', 'like', '%' . $query . '%')
        ->orWhere('email', 'like', '%' . $query . '%')
        ->orderBy('id', 'desc')
        ->paginate(10);

        return view('pages.user.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('pages.user.create');
    }


    public function store(UserRequest $request) 
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        User::create($data);

        return redirect()->route('user.index')->with('Success', 'User created');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.user.edit',[
            'user' => $user,
        ]);
    }

    public function update(UserRequestUpdate $request,$id) 
    {
        $data = $request->all();
        $item = User::findOrFail($id);

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }else {
            unset($data['password']);
        }

       
        $item->update($data);

        return redirect()->route('user.index')->with('Success', 'User Edit Success');
    }


    public function destroy(Request $request, $id)
    {
        $item = User::findOrFail($id);
        $item->delete();

        return redirect()->route('user.index')->with('Success', 'User Delete Success');
    }

}
