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
            'name' => 'required|string|max:120',
            'email' => 'required|min:4|max:50|email|unique:users',
            'password' => 'required|min:8|string|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required|min:8',
            'foto' => 'sometimes|image|max:2048|mimes:jpg,png,jpeg,svg',
        ],[
            'required' =>  ':attribute Tidak Boleh Kosong',
            'same' =>  'Konfirmasi Password Harus Sama',
            'mimes' => ':attribute Harus Berupa jpg, png, jpeg, svg',
            'min' =>  ':attribute Minimal :min Karakter',
            'max' =>  ':attribute Maksimal :max Karakter',
            'unique' => ':attribute Sudah Digunakan'
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
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2 pe-auto" id="editUserBtn" style="font-size: 16px;" title="Edit Data Teams"><i class="fas fa-edit mr-2" style="color: #007bff;"></i>Edit</button>';
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2 pe-auto" id="deleteUserBtn" style="font-size: 16px;" title="Delete Teams"><i class="fas fa-times-circle text-danger mr-2"></i>Hapus</button>';
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
        'name' => 'required|string|max:120',
        'email' => 'required|min:4|max:50|unique:users,email,'.$user_id
    ],[
        'required' =>  ':attribute Tidak Boleh Kosong',
        'mimes' => ':attribute Harus Berupa jpg, png, jpeg, svg',
        'min' =>  ':attribute Minimal :min Karakter',
        'max' =>  ':attribute Maksimal :max Karakter',
        'unique' => ':attribute Sudah Digunakan'
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
           return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Home Berhasil Di Update']);
        }else{
           return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Home Gagal Di Update']);
       }
   }

}

public function deleteUser(Request $request){
    $user_id = $request->user_id;
    $user = User::find($user_id)->delete();

    if($user){
        return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Teams Berhasil Dihapus']);
    }else{
        return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Teams Gagal Dihapus']);
    }
}

    
}
