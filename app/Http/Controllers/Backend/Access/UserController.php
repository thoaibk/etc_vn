<?php

namespace App\Http\Controllers\Backend\Access;

use App\Http\Controllers\Backend\BackendController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UserController extends BackendController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $users = User::query()->paginate(15);

        return view('backend.access.user.index')
            ->with('users', $users);

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        $user = User::find($id);
        if(!$user)
            abort(404);

        $roles = Role::all();

        return view('backend.access.user.edit')
            ->with('roles', $roles)
            ->with('user', $user);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request){
        $user = User::find($id);
        if(!$user)
            abort(404);

        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => [
                'email',
                Rule::unique('users')->ignore($user->id)
            ]
        ]);


        if($validator->passes()){
            $user->update([
                'name' => $request->get('name'),
                'email' => $request->get('email')
            ]);

            $update_roles = $request->get('roles');

            $syncRoles =   Role::wherein('id', $update_roles)->get();
            if(count($syncRoles) > 0){
                $user->syncRoles($syncRoles);
            }

            return redirect(route('access_manager.user.index'))->withFlashSuccess('Cập nhật user thành công');
        }
        else {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }
    }
}
