<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index()
    {
        if(Auth::user()->id){
        $id = Auth::user()->id;
        $user = User::where('id', $id)->get();
        // dd($user);
        return view('font.show.profile', ['user'=> $user , 'id'=>$id]);
    }
    }

    /**
     * Update the user's profile information.
     */
    public function edit(string  $id)
    {
        if(Auth::user()->id){
        $id = Auth::user()->id;
        $user = User::where('id', $id)->get();
        return view('font.show.profileupdate', ['user'=> $user , 'id'=>$id]);
    }
}
    public function update(ProfileUpdateRequest $request ,  User $user)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password =  Hash::make($request->password);
        $fullname = $request->input('fullname');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $role_id = $request->input('role_id');
        (Auth::user())->fill([
            'name' => $name,
            'email' => $email,
            'password' =>$password,
            'role_id' => $role_id,
            'fullname' => $fullname,
            'phone' => $phone,
            'address'=>$address
        ])->save();    
        return redirect()->route('profile.index')
        ->with('success', 'Tai Khoan update successfully');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}