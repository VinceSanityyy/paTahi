<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   

        $users = User::where('id','!=',\Auth::user()->id)->get();

        if($request->ajax()){
            $users = User::where('id', '!=', \Auth::user()->id)->get();
            return Datatables::of($users)
            ->addIndexColumn()
            ->addColumn('created_at', function ($row) {
                return Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->format('M d, Y');
            })
            ->addColumn('isAdmin', function ($row) {
                if($row->userType == 1){
                    return '<h6><span class="badge badge-success">Client</span></h6>';
                }else{
                    return '<h6><span class="badge badge-danger">Taylor</span></h6>';
                }
            })
            ->addColumn('isActivated', function ($row) {
                if($row->isActivated == 1){
                    return '<h6><span class="badge badge-success">Approved</span></h6>';
                }else if ($row->isActivated == 2){
                    return '<h6><span class="badge badge-danger">Denied</span></h6>';
                }else{
                    return '<h6><span class="badge badge-warning">Pending</span></h6>';
                }
            })
            ->addColumn('buttons', function ($row) {
                return '<button class="btn btn-primary" onclick="approveUser('.$row->id.')">Approve</button> &nbsp; <button onclick="denyUser('.$row->id.')" class="btn btn-danger">Deny</button>';
            })
            ->rawColumns(['buttons','isAdmin','isActivated'])
            ->make(true);
        }
        // dd($users);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
    public function edit($id)
    {
        //
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
        //
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

    public function approveUser($id){
        $user = User::find($id);
        // dd($user);
        $user->isActivated = 1;
        $user->save();

        return response()->json('Approved');
    }

    public function denyUser($id){
        $user = User::find($id);
        // dd($user);
        $user->isActivated = 2;
        $user->save();

        return response()->json('Approved');
    }
}
