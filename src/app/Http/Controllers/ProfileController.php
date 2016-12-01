<?php 

namespace Ken\SpiderAdmin\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function myAccount($id_user)
    {
        $active = [
            'ul' => '',
            'li' => 'account'
        ];
        $account = \App\Models\User::find(base64_decode($id_user));

        return view('spider::auth.profile', compact('active', 'account'));
    }

    public function Account(Request $request, $id_user)
    {
        $idProfile = base64_decode($id_user);

        $profile = $request->all();

        $validasi = Validator::make($profile, [
                'newusername'     => 'min : 5 | max : 20 | unique:users,name',
                'pass_lama' => 'required',
                'pass_baru' => 'required | min: 6 | max: 20 | alpha_num | same:confirm_pass',
                'confirm_pass' => 'required',
            ],$pesans =[
                'pass_lama' => 'Hanya terdiri dari huruf & angka, min 6 hruf, max 20 huruf.'
            ],$pass_lama_salah =[
                'pass_lama' => 'Konfimasi Password lama yang Anda masukan tidak cocok dengan system kami.'
            ]);
        if($validasi->fails()){

            return response()->json($pesans);

        }
        if($request->Input('newusername') !== ''){

            $newUsername = $request->Input('newusername');

            $passLama = \App\Models\User::find($idProfile);

            $pass = $passLama->password;

            $pass_baru = $request->Input('pass_lama');

            $new = $request->Input('pass_baru');

            if(Hash::check($pass_baru, $pass)){

                $update = [
                    'name' => $newUsername,
                    'password' => bcrypt($new)
                ];

                \App\Models\User::where('id', $idProfile)->update($update);

                return response()->json(['simpan' => 'true']);

                }else {

                    return response()->json($pass_lama_salah);
            }

        }else{

            $passLama = \App\Models\User::find($idProfile);

            $pass = $passLama->password;

            $pass_baru = $request->Input('pass_lama');

            $new = $request->Input('pass_baru');

            if(Hash::check($pass_baru, $pass)){

                $update = [
                    'password' => bcrypt($new),
                ];

                \App\Models\User::where('id', $idProfile)->update($update);

                return response()->json(['simpan' => 'trues']);

                }else {

                    return response()->json($pass_lama_salah);

            }
        }
    }
}