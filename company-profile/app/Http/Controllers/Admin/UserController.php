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
        $admin = User::where('id', '!=', auth()->id())->latest()->get();
        return view('admin.user.index', compact('admin'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|max:50|email|unique:users',
            'password' => 'required|min:8|string|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required|min:8',
            'foto' => 'sometimes|image|max:2048|mimes:jpg,png,jpeg',
        ],[
            'name.required' =>  'Nama Admin Tidak Boleh Kosong',
            'email.required' =>  'Email Admin Tidak Boleh Kosong',
            'password.required' =>  'Password Tidak Boleh Kosong',
            'confirm_password.required' => 'Konfirmasi Password Tidak Boleh Kosong',
            'same' =>  'Konfirmasi Password Harus Sama',
            'mimes' => 'Foto Harus Berupa jpg, png, jpeg',
            'password.min' =>  'Password Minimal :min Karakter',
            'confirm_password.min' =>  'Konfirmasi Password Minimal :min Karakter',
            'email.max' =>  'Email Maksimal :max Karakter',
            'foto.max' =>  'Foto Maksimal :max MB',
            'foto.image' => 'Foto Harus Berupa Gambar',
            'email.unique' => 'Alamat Email Sudah Digunakan'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
       }else{

        if ($request->foto) {

            $foto = $request->file('foto');
            $new_foto = base64_encode(file_get_contents($request->foto));

             $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'foto' => $new_foto
            ]);
        } else{
            $foto = 'avatar_default.png';
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'foto' => $foto
            ]);
        }
           if($user){
               return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Admin Berhasil Ditambahkan']);
            }else{
               return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Gagal Menambahkan Data Admin']);
           }
       }
   
    }

    public function ajax(Request $request)
{
    if ($request->ajax()) {
        $tableAdmin = User::all();
    return DataTables::of($tableAdmin)
            ->addIndexColumn()
            ->addColumn('foto', function($row){
                $table = '<center>';
                if ($row->foto == 'avatar_default.png') {
                    $table .= '<img src="/images/avatar_default.png" width="140px" class="shadow-sm rounded m-2 rounded-circle" loading="lazy">';
                } else {
                    $table .= '<img src='."data:image/" . $row->imageType . ";base64," . $row->foto.' width="190px" class="shadow-sm rounded m-2" loading="lazy">';
                }
                $table .= '</center>';

                return $table;
              })
            ->addColumn('action', function($row){
                $table = '<center>';
                $table .=  '<div class="list-icons">';
                $table .=  '<div class="dropdown">';
                $table .='<a href="#" class="list-icons-item" data-toggle="dropdown" title="Menu Aksi">';
                $table .=    '<i class="fas fa-list-ul"></i>';
                $table .= '</a>';
                $table .=' <div class="dropdown-menu dropdown-menu-right">';
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="editUserBtn" style="font-size: 16px; cursor: pointer;" title="Edit Data Admin"><i class="icon-note mr-2" style="color: #007bff;"></i>Edit</button>';
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="deleteUserBtn" style="font-size: 16px; cursor: pointer;" title="Delete Admin"><i class="icon-trash text-danger mr-2"></i>Hapus</button>';
                $table .= '</div>';
                $table .= '</div>';
                $table .= '</div>';
                $table .= '</center>';

                return $table;
            })
            ->rawColumns(['foto','action'])
            ->make(true);   
}

}

public function editUser(Request $request){
    $user_id = $request->user_id;
    $userEdit = User::find($user_id);
    return response()->json(['details'=>$userEdit]);
}


public function updateUser(Request $request)
{
    $user_id = $request->user_id;

    $validator = Validator::make($request->all(),[
        'name' => 'required|string',
        'email' => 'required|max:50|unique:users,email,'.$user_id,
        'foto' => 'sometimes|image|max:2048|mimes:jpg,png,jpeg'
    ],[
        'name.required' =>  'Nama Admin Tidak Boleh Kosong',
        'email.required' =>  'Email Admin Tidak Boleh Kosong',
        'mimes' => 'Foto Harus Berupa jpg, png, jpeg',
        'email.max' =>  'Email Maksimal :max Karakter',
        'foto.max' =>  'Foto Maksimal :max MB',
        'foto.image' => 'Foto Harus Berupa Gambar',
        'email.unique' => 'Alamat Email Sudah Digunakan'
    ]);

    if(!$validator->passes()){
        return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
   }else{

    if($request->file('foto') == "") {

        $user = User::find($user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

    } else {    

        if ($request->foto) {
            $new_foto= base64_encode(file_get_contents($request->foto));

            $user = User::find($user_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'foto' => $new_foto
            ]);
        }

    }

       if($user){
           return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Admin Berhasil Di Update']);
        }else{
           return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Admin Gagal Di Update']);
       }
   }

}

public function deleteUser(Request $request){
    $user_id = $request->user_id;
    $user = User::find($user_id)->delete();

    if($user){
        return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Admin Berhasil Dihapus']);
    }else{
        return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Admin Gagal Dihapus']);
    }
}

    
}
