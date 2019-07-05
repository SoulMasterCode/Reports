<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile, Request $request)
    {
        if ($request->user()->profile->id == $profile->id) {

            return view('Profile.edit',[
                'user'=>$profile->user,
                'profile'=>$profile
            ]);
        }
        
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $validatedData = $request->validate([
            'photo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'first_name'=>'required',
            'last_name'=>'required',
            'phone_number'=>'numeric|min:10'
        ]);

        $profile->first_name = $validatedData['first_name'];
        $profile->last_name = $validatedData['last_name'];
        $profile->phone_number = $validatedData['phone_number'];

        if($request->file('photo')  != null)
        {
            $imageName = time().'.'.$profile->id.$validatedData['photo']->getClientOriginalExtension();

            $profile->photo = $imageName;

            $validatedData['photo']->move(public_path('user/img'), $imageName);
        }
        

        $profile->save();

        return redirect()->back();
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
