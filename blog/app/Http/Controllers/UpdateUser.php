<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Validator;

class UpdateUser extends Controller
{
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|string|email|min:4|max:255',
            'tel' => 'required|min:10|max:12',
        ]);
        if ($validator->fails()) {
            return redirect('userSetting')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $id = Auth::user()->id;

            $user = User::find($id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->tel = $request->tel;

            $user->save();

            return redirect('home');
        }
    }
}
