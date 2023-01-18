<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-side.dashboard.user.index', [
            "title" => "User Management",
            'user' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-side.dashboard.user.create', [
            "title" => "Add User",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {

        $dataNewUser = $request->all();

        if ($request->file('picture')) {
            $name_picture_path = $request->file('picture')->store('user-picture', 'public');
            $dataNewUser['picture'] = $name_picture_path;
        }

        $dataNewUser['password'] = Hash::make($dataNewUser['password']);
        User::create($dataNewUser);

        return redirect('/dashboard/user')->with('toast_success', 'Data User successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin-side.dashboard.user.edit', [
            'title' => 'Edit User',
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $UpdateUser = $request->all();
        // dd($UpdateUser);
        if ($request->file('picture')) {
            if ($request->oldPicture) {
                // dd($request->oldPicture);
                File::delete('storage/' . $request->oldPicture);
            }
            $name_picture_path = $request->file('picture')->store('User-picture', 'public');
            $UpdateUser['picture'] = $name_picture_path;
        } else {
            $UpdateUser['picture'] = $request->oldPicture;
        }
        // dd($UpdateUser);
        $findUser = User::find($id);
        $findUser->name = $UpdateUser['name'];
        $findUser->email = $UpdateUser['email'];
        $findUser->level = $UpdateUser['level'];
        $findUser->picture = $UpdateUser['picture'];
        $findUser->password = Hash::make($UpdateUser['password']);
        $findUser->save();

        $request->session();

        return redirect('/dashboard/user')->with('toast_success', 'Data User successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->picture) {
            File::delete('storage/' . $user->picture);
        }

        $user->delete();
        return redirect('dashboard/User')->with('toast_success', 'Data User successfully deleted');
    }
}
