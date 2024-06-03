<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatedroleRequest;
use App\Http\Requests\RefreshClientRequest;
use App\Http\Requests\AuthClientRequest;
use App\Http\Requests\DeleteroleRequest;
use App\Http\Requests\UpdateRequest;
use App\Http\Requests\createduserRequest;
use App\Http\Requests\DeleteuserRequest;
use App\Http\Requests\LogOutClientRequest;
use App\Http\Requests\updateuserRequest;
use App\Http\Requests\loginRequest;
use App\Models\course;
use App\Models\calendar_course;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Passport\TokenRepository;
use Laravel\Passport\RefreshTokenRepository;

class UserController extends Controller
{
    public function role_user()
    {
        $count_course = count(course::all());
        $count_class = count(calendar_course::all());
        $count_users = count(User::all());
        $count_student = User::where('id_roles',  2)->count();
        $dataroles = Role::all();
        return view('role_user')
            ->with('datastudent', $count_student)->with('dataroles', $dataroles)->with('count_course', $count_course)->with('count_class', $count_class)->with('count_users', $count_users);
            
    }

    public function addRole(CreatedroleRequest $request)
    {
        Role::create(['name' => $request->rolename]);
        return response()->json(['check' => true, 'msg' => 'Thêm thành công']);
    }

    public function deleteRole(DeleteroleRequest $request)
    {
        Role::where('id',  $request->id)
            ->delete();
        return response()->json(['check' => true, 'msg' => 'Xóa loại tài khoản thành công']);
    }

    public function UpdateRole(UpdateRequest $request)
    {
        Role::where('id',  $request->id)
            ->update(['name' => $request->rolename]);
        return response()->json(['check' => true, 'msg' => 'Update loại tài khoản thành công']);
    }

    public function createduserview()
    {

        $user = DB::table('users')
            ->join('roles', 'users.id_roles', '=', 'roles.id')
            ->select('users.*', 'roles.name as rolename')
            ->get();
        // if ($request->get("export_excel") && $request->get("export_excel") == 1) {
        //     $valueUser = $user;
        //     $timestamp = now()->format('Y_m_d_H_i_s_');
        //     $name = 'User_Excel_' . $timestamp . '_' . rand() . '.xlsx';
        //     ob_end_clean();
        //     return Excel::download(new UsersExport, $name);
        // }
        return view('created_user')
            ->with('data_users', $user);
    }

    /**
     * A function to select roles.
     */
    public function select_roles()
    {
        $datausers = Role::all();
        $user = User::find(1);

        $a = array();
        $id = array();
        $role = $user->id_roles;
        for ($i = 0; $i < count($datausers); $i++) {
            if ($datausers[$i]->id != $role) {
                array_push($a, $datausers[$i]->name);
            }
        }
        for ($i = 0; $i < count($datausers); $i++) {
            if ($datausers[$i]->id != $role) {
                array_push($id, $datausers[$i]->id);
            }
        }
        return response()->json(['data' => $a, 'id' => $id]);
    }


    public function insert_users(createduserRequest $request)
    {

        if (!preg_match("/^[a-zA-Z0-9._%+-]+@gmail\.com$/", $request->email)) {
            return response()->json(['check' => false, 'msg' => 'Vui lòng nhập đúng email']);
        }
        if (!preg_match("/^\d{10,11}$/", $request->phone)) {
            return response()->json(['check' => false, 'msg' => 'Vui lòng nhập đúng số điện thoại']);
        }
        
        User::create([
            'name' => $request->name, 
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'id_roles' => $request->id_roles,
            'status' => $request->status
        ]);
        return response()->json(['check' => true, 'msg' => 'Đã thêm tài khoản thành công']);
    }

    public function Updateusers(updateuserRequest $request)
    {
        if (!preg_match("/^[a-zA-Z0-9._%+-]+@gmail\.com$/", $request->email)) {
            return response()->json(['check' => false, 'msg' => 'Vui lòng nhập đúng email']);
        }
        if (!preg_match("/^\d{10,11}$/", $request->phone)) {
            return response()->json(['check' => false, 'msg' => 'Vui lòng nhập đúng số điện thoại']);
        }

        User::where('name',  $request->name)
            ->update(['name' => $request->name, 'email' => $request->email, 'phone' => $request->phone, 'id_roles' => $request->id_roles, 'status' => $request->status]);
        return response()->json(['check' => true, 'msg' => 'Update tài khoản thành công']);
    }

    public function deleteuser(DeleteuserRequest $request)
    {
        User::where('id',  $request->id)
            ->delete();
        return response()->json(['check' => true, 'msg' => 'Xóa tài khoản thành công']);
    }

    public function view_login_user()
    {
        return view('login');
    }

    public function login_user(loginRequest $request)
    {
        if (Auth::attempt(array('email' => $request->email, 'password' => $request->password), true)) {
            $user = auth()->user();
            $rememberToken = $user->remember_token;
            $response = response()->json(['check' => true, 'token' => $rememberToken]);
            $response->withCookie(cookie('token', $rememberToken, 1440));
            return $response;
        } else {
            return response()->json(['check' => false, "msg1" => "sai mật khẩu vui lòng nhập lại"]);
        }
    }

    public function logout_user()
    {
        Auth::logout();
        $response = response()->json(['check' => true, 'token' => "Đăng xuất thành công"]);
        $response->withoutCookie('token');
        return $response;
    }



    public function login_client(AuthClientRequest $request)
    {
        $request = Request::create('oauth/token', 'POST', [
            'grant_type' => 'password',
            'client_id' => env("CLIENT_ID"),
            'client_secret' => env("CLIENT_SECRET"),
            'username' => $request->email,
            'password' => $request->password,
            'scope' => '',
        ]);
        
        $result = app()->handle($request);
        $response = json_decode($result->getContent(), true); 
        return response()->json($response, 200);
    }

    public function refresh_token(RefreshClientRequest $request)
    {
        $request = Request::create('oauth/token', 'POST', [
            'grant_type' => 'refresh_token',
            'refresh_token' => $request->refresh_token,
            'client_id' => env("CLIENT_ID"),
            'client_secret' => env("CLIENT_SECRET"),
            'scope' => '',
        ]);
        
        $result = app()->handle($request);
        $response = json_decode($result->getContent(), true); 
        return response()->json($response, 200);
    }

    public function logout_client(LogOutClientRequest $request)
    {
        $tokenRepository = app(TokenRepository::class);
        $refreshTokenRepository = app(RefreshTokenRepository::class);
        $tokenRepository->revokeAccessToken($request->token);
 
        // Revoke all of the token's refresh tokens...
        $refreshTokenRepository->revokeRefreshTokensByAccessTokenId($request->refresh_token);
        $response=response()->json(['check' => true, 'msg' => 'Bạn đã logout thành công']);
        return $response;
    }
}
