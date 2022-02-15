<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Team;
use DataTables;

class TeamController extends Controller
{
    public function index()
    {
        return view('admin.teams.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama'=>'required|min:5|max:40',
            'jabatan'=>'required|min:4|max:30',
            'foto' => 'required|image|max:2048|mimes:jpg,png,jpeg,svg',
        ],[
            'required' => ':attribute Tidak Boleh Kosong',
            'mimes' => ':attribute Harus Berupa jpg, png, jpeg, svg',
            'max' => ':attribute Tidak Boleh Lebih Dari :max',
            'min' =>  ':attribute Minimal :min Karakter'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
       }else{

        if ($request->foto) {

            $foto = $request->file('foto');
            $new_foto= base64_encode(file_get_contents($request->foto));

             $teams = Team::create([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'foto' => $new_foto,
            ]);
        }

           if($teams){
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
            ->addColumn('foto', function($row){
                return '<img src='."data:image/" . $row->imageType . ";base64," . $row->foto.' width="190px" class="shadow-sm rounded m-2" loading="lazy">';
              })
            ->addColumn('action', function($row){
                $table = '<center>';
                $table .=  '<div class="list-icons">';
                $table .=  '<div class="dropdown">';
                $table .='<a href="#" class="list-icons-item" data-toggle="dropdown" title="Menu Aksi">';
                $table .=    '<i class="fas fa-list-ul"></i>';
                $table .= '</a>';
                $table .=' <div class="dropdown-menu dropdown-menu-right">';
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2 pe-auto" id="editTeamBtn" style="font-size: 16px;" title="Edit Data Teams"><i class="fas fa-edit mr-2" style="color: #007bff;"></i>Edit</button>';
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2 pe-auto" id="deleteTeamBtn" style="font-size: 16px;" title="Delete Teams"><i class="fas fa-times-circle text-danger mr-2"></i>Hapus</button>';
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

public function editTeam(Request $request){
    $team_id = $request->team_id;
    $teamEdit = Team::find($team_id);
    return response()->json(['details'=>$teamEdit]);
}


public function updateTeam(Request $request)
{
    $team_id = $request->team_id;

    $validator = Validator::make($request->all(),[
        'nama'=>'required|min:5|max:40',
        'jabatan'=>'required|min:4|max:30',
    ],[
        'required' => ':attribute Tidak Boleh Kosong',
        'mimes' => ':attribute Harus Berupa jpg, png, jpeg, svg',
        'max' => ':attribute Tidak Boleh Lebih Dari :max',
        'min' =>  ':attribute Minimal :min Karakter'
    ]);

    if(!$validator->passes()){
        return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
   }else{

    if($request->file('foto') == "") {

        $team = Team::find($team_id)->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
        ]);

    } else {    

        if ($request->foto) {
            $new_foto= base64_encode(file_get_contents($request->foto));

            $team = Team::find($team_id)->update([
                'foto' => $new_foto,
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
            ]);
        }

    }

       if($team){
           return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Teams Berhasil Di Update']);
        }else{
           return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Teams Gagal Di Update']);
       }
   }

}

public function deleteTeam(Request $request){
    $team_id = $request->team_id;
    $team = Team::find($team_id)->delete();

    if($team){
        return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Teams Berhasil Dihapus']);
    }else{
        return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Teams Gagal Dihapus']);
    }
}
}
