<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('home',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate
        $request-> validate([ 
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role' => 'required',
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
        $profilePhotoPath = null;
        if ($request->hasFile('avatar')) {
            $profilePhotoPath = $request->file('avatar')->store('avatars', 'public');
        }

        //create
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=> $request->role,
            'profile_photo_path' => $profilePhotoPath,
        ]);

        //redirect
        return redirect()->route('home')->with('success', 'Utilisateur créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        //validate
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|confirmed|min:6',
            'role' => 'required',
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::findOrFail($id);

        $profilePhotoPath = $user->profile_photo_path;
        if ($request->hasFile('avatar')) {
            $profilePhotoPath = $request->file('avatar')->store('avatars', 'public');
        }

        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'profile_photo_path' => $profilePhotoPath,
        ];

        if(!empty($request->password)){
            $updateData['password'] = Hash::make($request->password);
        }


        //update
        $user->update($updateData);

        //redirect
        return redirect()->route('home')->with('success', 'Utilisateur mis à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès!');
    }
}
