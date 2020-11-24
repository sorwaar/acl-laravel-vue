<?php

namespace App\Http\Controllers\User;

use App\Model\ACL\AclRole;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        return AclRole::orderBy('role_id','desc')->paginate($request->perPage);
    }

    public function create()
    {
        return view('user.role.manage-role');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'role_name'=>'required|unique:acl_role',
        ]);

        try{
            AclRole::insert($request->all());
            return response()->json(['status'=>'success','message'=>'Role successfully saved !']);
        } catch(\Exception $e){
            return response()->json(['status'=>'error','message'=>'Something Error Found !, Please try again']);
        }
    }

    public function edit($id)
    {
        try {
            $data = AclRole::findOrFail($id);
            return response()->json(['status'=>'success','data'=>$data]);
        } catch(\Exception $e){
            return response()->json(['status'=>'error','data'=>[]]);
        }
    }

    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'role_name'  => 'required|unique:acl_role,role_name,'.$id.',role_id'
        ]);

        try{
            $data = AclRole::FindOrFail($id);
            $data->update($request->all());
            return response()->json(['status'=>'success','message'=>'Role successfully updated !']);
        } catch(\Exception $e){
            return response()->json(['status'=>'error','message'=>'Something Error Found !, Please try again']);
        }
    }

    public function destroy($id)
    {
        try{
            $role = AclRole::FindOrFail($id);
            $role->delete();
            return response()->json(['status'=>'success','message'=>'Role successfully deleted !']);
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
            if ($bug == 1451) {
                return response()->json(['status'=>'error','message'=>'This data is used another table,can not delete data']);
            } else {
                return response()->json(['status'=>'error','message'=>'Something Error Found !, Please try again']);
            }
        }
    }
}
