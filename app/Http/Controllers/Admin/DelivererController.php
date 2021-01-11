<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreDeliverRequest;
use App\Http\Requests\UpdateDeliverRequest;

class DelivererController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role', 2)->get();
        return view('admin.deliverers.deliverer', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.deliverers.deliverer_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeliverRequest $request)
    {
       $deliverer = new User();
       $deliverer->name = $request->name;
       $deliverer->email = $request->email;
       $deliverer->phone = $request->phone;
       $imageName = date('YmdHis'). "." . $request->user_image->getClientOriginalExtension();
       $request->user_image->move(public_path('images'), $imageName);

       $deliverer->image = $imageName;

       $deliverer->password = Hash::make($request->password);
       $deliverer->role = 2;

       $deliverer->save();
       
       return redirect()->route('deliverer')->with('message', 'created');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $deliverer)
    {
       return view('admin.deliverers.deliverer_edit', compact('deliverer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeliverRequest $request, User $deliverer)
    {
        $deliverer->name = $request->name;
        $deliverer->email = $request->email;
        $deliverer->phone = $request->phone;

        if($request->user_image) {
            $imageName = date('YmdHis'). "." . $request->user_image->getClientOriginalExtension();
            $request->user_image->move(public_path('images'), $imageName);
            $deliverer->image = $imageName;
        }

        if($request->password) {
            $deliverer->password = Hash::make($request->password);
        }

        $deliverer->save();

        return redirect()->route('deliverer')->with('message', 'updated');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $deliverer)
    {
        $deliverer->delete();
        return redirect()->route('deliverer')->with('message', 'deleted');

    }
}
