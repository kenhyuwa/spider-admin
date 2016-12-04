<?php

namespace Ken\SpiderAdmin\App\Http\Controllers;

use File;
use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function usersAll()
    {
        
        return view('spider::users.view');
    }

    public function create()
    {
        
        return view('spider::users.create');
    }

    public function store(Request $request)
    {
        if($request->ajax()) {
            $data = $request->all();
            $validate = Validator::make($data, [
                    "name"     => "required | max: 100",
                    "gender"   => "required | max: 100",
                    "address"  => "required | max: 100",
                    "phone"    => "required | max: 100",
                    "roles"    => "required | max: 100",
                    "user_img" => "mimes:jpg,jpeg,png,gif | max: 2000"
                ]);
            if($validate->fails()) {
                return response()->json($validate);
            }
            // set username
                $users  = $request->Input('name');
                $jumlah = 1;
                $username  = implode(' ', array_slice(explode(' ', $users), 0, $jumlah));

                $check_username = \App\Models\User::where('name', $username)->get();
                if(count($check_username)) {
                    $username = $username.str_random($lenght = 2);
                }
                    $username = $username;

                // set destinasi
                $images = $request->file('user_img');
                if($images) {
                    $upload = 'vendor/upload/images/originals';
                    $nama = $request->Input('name');
                    $filename = strtolower(str_replace(' ','-',$nama));
                    $fullname = $filename.'-'.str_random($lenght = 16).'.'.$images->getClientOriginalExtension();
                    $success = $images->move($upload, $fullname);
                    Image::make($success)->resize('128','128')->save('vendor/upload/images/thumbnails/'.$fullname);

                if($success) {
                    $profile = new \App\Models\Profile;
                        $profile->name           = $request->Input('name');
                        $profile->gender         = $request->Input('gender');
                        $profile->address        = $request->Input('address');
                        $profile->phone          = $request->Input('phone');
                        $profile->roles          = $request->Input('roles');
                        $profile->images_profile = $fullname;

                    $simpan = $profile->save();
                    if($simpan) {

                        $user = new \App\Models\User;
                            $user->name       = $username;
                            $user->password   = bcrypt($username);
                            $user->email      = strtolower(str_replace(' ','.', $request->Input('name'))).'@diaddemi.web.id';
                            $user->profile_id = $profile->id;
                        $user->save();
                    
                    // return redirect()->to(config('spider.route_prefix').'/users/'.base64_encode($profile->id).'/detail');
                        return response()->json(['success' => 'true'], 200);
                    }
                }
            }
                $profile = new \App\Models\Profile;
                    $profile->name           = $request->Input('name');
                    $profile->gender         = $request->Input('gender');
                    $profile->address        = $request->Input('address');
                    $profile->phone          = $request->Input('phone');
                    $profile->roles          = $request->Input('roles');
                    $profile->images_profile = 'user2-160x160.jpg';

                $simpan = $profile->save();
                if($simpan) {

                    $user = new \App\Models\User;
                        $user->name       = $username;
                        $user->password   = bcrypt($username);
                        $user->email      = strtolower(str_replace(' ','.', $request->Input('name'))).'@gmail.com';
                        $user->profile_id = $profile->id;
                    $user->save();
                
                // return redirect()->to(config('spider.route_prefix').'/users/'.base64_encode($profile->id).'/detail');
                    return response()->json(['success' => 'true'], 200);
                }
        }
    }

    public function user()
    {
        $users = \App\Models\Profile::all();
        
        return view('spider::users.list_user', compact('users'));
    }

    public function userDetail($id)
    {
        $detail = \App\Models\Profile::find(base64_decode($id));
        
        return view('spider::users.detail', compact('detail'));
    }

    public function update(Request $request, $id)
    {
        if($request->ajax()) {
            $exist = \App\Models\Profile::find(base64_decode($id));
            $data = $request->all();
            $validate = Validator::make($data,[
                    "name"     => "required | max: 100",
                    "gender"   => "required | max: 100",
                    "address"  => "required | max: 100",
                    "phone"    => "required | max: 100",
                    "roles"    => "required | max: 100",
                    "user_img" => "mimes:jpg,jpeg,png,gif | max: 2000"
                ]);
            if($validate->fails())
            {
                return response()->json($validate);
            }

            $images = $request->file('user_img');
            if($images){
                if($exist->images_profile != 'user2-160x160.jpg') {
                File::delete('vendor/upload/images/originals/'.$exist->images_profile);
                File::delete('vendor/upload/images/thumbnails/'.$exist->images_profile);
                }
            
                $upload = 'vendor/upload/images/originals';
                if(count($fullname = $exist->images_profile)){
                    $fullname = $exist->images_profile;
                }
                $nama = $request->Input('name');
                $filename = strtolower(str_replace(' ','-',$nama));
                $fullname = $filename.'-'.str_random($lenght = 16).'.'.$images->getClientOriginalExtension();
                $success = $images->move($upload, $fullname);
                Image::make($success)->resize('128','128')->save('vendor/upload/images/thumbnails/'.$fullname);
                if($success){
                    $profile = [
                        'name'           => $request->Input('name'),
                        'gender'         => $request->Input('gender'),
                        'address'        => $request->Input('address'),
                        'phone'          => $request->Input('phone'),
                        'roles'          => $request->Input('roles'),
                        'images_profile' => $fullname
                    ];

                    \App\Models\Profile::where('id', base64_decode($id))->update($profile);

                    // return redirect()->back();
                    return response()->json(['success' => 'true'], 200);
                }
            }else{
                $profile = [
                        'name'           => $request->Input('name'),
                        'gender'         => $request->Input('gender'),
                        'address'        => $request->Input('address'),
                        'phone'          => $request->Input('phone'),
                        'roles'          => $request->Input('roles')
                    ];

                    \App\Models\Profile::where('id', base64_decode($id))->update($profile);

                    // return redirect()->back();
                    return response()->json(['success' => 'true'], 200);
            }
        }
    }

    public function getDetail($id)
    {
        $detail = \App\Models\Profile::find(base64_decode($id));
        
        return response()->json($detail, 200);
    }

    public function delete(Request $request, $id)
    {
        if($request->ajax()) {
            $destroy = \App\Models\Profile::find(base64_decode($id));

            $auth = $destroy->getUser->id;
            
            if($auth != auth()->user()->id){
                if($destroy->images_profile != 'user2-160x160.jpg') {
                File::delete('vendor/upload/images/originals/'.$destroy->images_profile);

                File::delete('vendor/upload/images/thumbnails/'.$destroy->images_profile);
                }   

                $destroy->delete();

                 return response()->json(['success' => 'true']);
            }
                return response()->json(['success' => 'false']);
        }
    }
}
