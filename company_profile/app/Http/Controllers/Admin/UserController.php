<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required|min:8',
            'photo' => 'sometimes|image|max:2048|mimes:jpg,png,jpeg',
        ],[
            'name.required' => 'Nama User Tidak Boleh Kosong',
            'email.required' => 'Email User Tidak Boleh Kosong',
            'password.required' => 'Password Tidak Boleh Kosong',
            'confirm_password.required' => 'Konfirmasi Password Tidak Boleh Kosong',
            'same' => 'Konfirmasi Password Harus Sama',
            'mimes' => 'Foto Harus Berupa jpg, png, jpeg',
            'password.min' => 'Password Minimal :min Karakter',
            'confirm_password.min' => 'Konfirmasi Password Minimal :min Karakter',
            'photo.max' => 'Foto Maksimal :max MB',
            'photo.image' => 'Foto Harus Berupa Gambar',
            'email.unique' => 'Alamat Email Sudah Digunakan'
        ]);

        if(!$validator->passes()){
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            if ($request->photo) {

                $photo = $request->file('photo');
                $new_photo = base64_encode(file_get_contents($request->photo));

                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'photo' => $new_photo
                ]);

            } else {
                
                $photo = 'avatar_default.png';
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'photo' => $photo
                ]);
            }
            
            if($user){
                return response()->json(['code' => 1, 'status' => 'BERHASIL', 'message' => 'Data User Berhasil Ditambahkan']);
            } else {
                return response()->json(['code' => 0, 'status' => 'GAGAL', 'message' => 'Gagal Menambahkan Data User']);
            }
        }
    }

    public function ajax(Request $request)
    {
        if ($request->ajax()) {
            $tableUser = User::where('id', '!=', auth()->id())->latest()->get();
            return DataTables::of($tableUser)
            ->addIndexColumn()
            ->addColumn('photo', function($row){
                $table = '<center>';
                if ($row->photo == 'avatar_default.png') {
                    $table .= '<img src="/images/avatar_default.png" width="140px" class="shadow-sm m-2 rounded-circle" loading="lazy">';
                } else {
                    $table .= '<img src='."data:image/" . $row->imageType . ";base64," . $row->photo.' width="190px" class="shadow-sm rounded m-2" loading="lazy">';
                }
                $table .= '</center>';

                return $table;
            })
            ->addColumn('action', function($row){
                $table = '<center>';
                $table .=   '<div class="list-icons">';
                $table .=       '<div class="dropdown">';
                $table .=           '<a href="#" class="list-icons-item" data-toggle="dropdown" title="Menu Aksi">';
                $table .=               '<i class="fas fa-list-ul"></i>';
                $table .=           '</a>';
                $table .=           '<div class="dropdown-menu dropdown-menu-right">';
                $table .=               '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="editUserBtn" style="font-size: 16px; cursor: pointer;" title="Edit Data User"><i class="icon-note mr-2" style="color: #007bff;"></i>Edit</button>';
                $table .=               '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="deleteUserBtn" style="font-size: 16px; cursor: pointer;" title="Delete User"><i class="icon-trash text-danger mr-2"></i>Hapus</button>';
                $table .=           '</div>';
                $table .=       '</div>';
                $table .=   '</div>';
                $table .= '</center>';

                return $table;
            })
            ->rawColumns(['photo','action'])
            ->make(true);   
        }
    }

    public function editUser(Request $request)
    {
        $user_id = $request->user_id;
        $userEdit = User::find($user_id);
        return response()->json(['details'=>$userEdit]);
    }


    public function updateUser(Request $request)
    {
        $user_id = $request->user_id;

        $validator = Validator::make($request->all(),[
            'username' => 'required|max:128',
            // 'password' => 'required|min:5|max:8',
            // 'createtime' => 'required|date_format:d-m-Y'
        ],[
            'username.required' => 'Username Tidak Boleh Kosong',
            'username.max' => 'Username Tidak Boleh Lebih Dari :max Karakter',
        ]);

        if(!$validator->passes()){
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

                $user = User::find($user_id)->update([
                    'username' => $request->username,
                ]);

            if($user){
                return response()->json(['code' => 1, 'status' => 'BERHASIL', 'message' => 'Data User Berhasil Di Update']);
            } else {
                return response()->json(['code' => 0, 'status' => 'GAGAL', 'message' => 'Data User Gagal Di Update']);
            }
        }
    }

    public function deleteUser(Request $request){
        $user_id = $request->user_id;
        $user = User::find($user_id)->delete();

        if($user){
            return response()->json(['code' => 1, 'status' => 'BERHASIL', 'message' => 'Data User Berhasil Dihapus']);
        } else {
            return response()->json(['code' => 0, 'status' => 'GAGAL', 'message' => 'Data User Gagal Dihapus']);
        }
    } 
}
