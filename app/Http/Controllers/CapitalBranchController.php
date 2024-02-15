<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CapitalBranch;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CapitalBranchController extends Controller
{
    public function add_branch(Request $request){
        $rules = [
            'name' => 'required',
            'code' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $branch = new CapitalBranch();
        $branch->name = $request->name;
        $branch->code = $request->code;

        $branch->save();

        return redirect()->back();
    }
    
    public function edit_branch(Request $request){
        $branch = CapitalBranch::find($request->id);
        $branch->name = $request->name != null ? $request->name : $branch->name;
        $branch->code = $request->code != null ? $request->code : $branch->code;

        $branch->save();

        return redirect()->back();
    }

    public function delete_branch($id){
        $branch = CapitalBranch::find($id);
        $branch->delete();

        return redirect()->back();
    }
}