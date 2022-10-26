<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Team;
use DataTables;

class TeamController extends Controller
{
    public function index()
    {
        return view('admin.about.teams.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'position'=>'required',
            'photo' => 'required|image|max:2048|mimes:jpg,png,jpeg',
        ],[
            'name.required' => 'Nama Team Tidak Boleh Kosong',
            'position.required' => 'Jabatan Team Tidak Boleh Kosong',
            'photo.required' => 'Foto Tidak Boleh Kosong',
            'mimes' => 'Foto Harus Berupa jpg, png, jpeg',
            'photo.image' => 'Foto Harus Berupa Gambar',
            'photo.max' => 'Foto Tidak Boleh Lebih Dari :max MB',
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
       }else{

        if ($request->photo) {

            $photo = $request->file('photo');
            $new_photo = base64_encode(file_get_contents($request->photo));

            $team = Team::create([
                'name' => $request->name,
                'position' => $request->position,
                'photo' => $new_photo,
            ]);
        }

           if($team){
               return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Team Berhasil Ditambahkan']);
            }else{
               return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Gagal Menambahkan Data Team']);
           }
       }
   
    }

    public function ajax(Request $request)
{
    if ($request->ajax()) {
        $tableTeam = Team::all();
        return DataTables::of($tableTeam)
            ->addIndexColumn()
            ->addColumn('photo', function($row){
                $table = '<center>';
                $table .= '<img src='."data:image/" . $row->imageType . ";base64," . $row->photo.' width="190px" class="shadow-sm rounded m-2" loading="lazy">';
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
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="editTeamBtn" style="font-size: 16px; cursor: pointer;" title="Edit Data Team"><i class="icon-note mr-2" style="color: #007bff;"></i>Edit</button>';
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="deleteTeamBtn" style="font-size: 16px; cursor: pointer;" title="Delete Team"><i class="icon-trash text-danger mr-2"></i>Hapus</button>';
                $table .= '</div>';
                $table .= '</div>';
                $table .= '</div>';
                $table .= '</center>';

                return $table;
            })
            ->rawColumns(['photo','action'])
            ->make(true);   
}

}

public function editTeam(Request $request){
    $team_id = $request->team_id;
    $teamEdit = Team::find($team_id);
    return response()->json(['details'=>$teamEdit]);
}


public function updateTeam(Request $request)
{
    $team_id = $request->team_id;

    $validator = Validator::make($request->all(),[
        'name'=>'required',
        'position'=>'required',
        'photo' => 'sometimes|image|max:2048|mimes:jpg,png,jpeg',
    ],[
        'name.required' => 'Nama Team Tidak Boleh Kosong',
        'position.required' => 'Jabatan Team Tidak Boleh Kosong',
        'mimes' => 'Foto Harus Berupa jpg, png, jpeg',
        'photo.image' => 'Foto Harus Berupa Gambar',
        'photo.max' => 'Foto Tidak Boleh Lebih Dari :max MB',
    ]);

    if(!$validator->passes()){
        return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
   }else{

    if($request->file('photo') == "") {

        $team = Team::find($team_id)->update([
            'name' => $request->name,
            'position' => $request->position
        ]);

    } else {    

        if ($request->photo) {
            $new_photo = base64_encode(file_get_contents($request->photo));

            $team = Team::find($team_id)->update([
                'name' => $request->name,
                'position' => $request->position,
                'photo' => $new_photo
            ]);
        }

    }

       if($team){
           return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Team Berhasil Di Update']);
        }else{
           return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Team Gagal Di Update']);
       }
   }

}

public function deleteTeam(Request $request){
    $team_id = $request->team_id;
    $team = Team::find($team_id)->delete();

    if($team){
        return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Team Berhasil Dihapus']);
    }else{
        return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Team Gagal Dihapus']);
    }
}
}
