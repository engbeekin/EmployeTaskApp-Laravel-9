<?php

namespace App\Http\Controllers;

use App\Events\UserEvent;
use App\Models\User;
use App\Models\Depatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::latest()->get();
        return view('employes.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments=Depatment::all('id','dep_name');
        return view('employes.create',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'password' => ['required',  'min:6'],
        ]);

            $file=$request->file('photo');
            $fileName=time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('/public/employePhoto',$fileName);

        $user= User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'status'=>$request->status,
            'role'=>$request->role,
            'password'=>Hash::make($request->password),
            'department_id'=>$request->department_id,
            'photo'=>$fileName
        ]);
        UserEvent::dispatch($user);
        return to_route('employe.index')->with('success','Created Employe Successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOrFail($id);
        $departments=Depatment::all('id','dep_name');
        return view('employes.edit',compact('user','departments'));
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

        // find the user by id
        $user=User::findOrFail($id);
        //image updating and uploading to Db
        $file=$request->file('photo');
       $fileName=time().'.'.$file->getClientOriginalExtension();
       // deleting old image
        Storage::delete('public/employePhoto/'.$user->photo);
        // storing the new image to Db
       $file->storeAs('/public/employePhoto',$fileName);
        // updating all columns of User to Db
            $user->update([
                'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'status'=>$request->status,
            'role'=>$request->role,
            'department_id'=>$request->department_id,
            'password'=>Hash::make($request->password),
            'photo'=>$fileName
        ]);

        return to_route('employe.index')->with('success','Updated Employe Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);
        // deleting the old image of the user
        Storage::delete('public/employePhoto/'.$user->photo);
        $user->delete();
        return back()->with('delete','Deleted Employee Successfully');
    }

    /**
     * suspended a employe to use the web
     * we must update his status
     * by default emp status is active or 1 so we must change to 0 to make it suspended emp.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function suspendedEmploye($id,$status)
    {
        // updating the employe status to inactiv or 0 to suspended him
        $user=User::whereId($id)->update([
            'status'=>$status,
        ]);


        return back()->with('success','suspended Employee Successfully');
    }


}
