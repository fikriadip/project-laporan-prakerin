<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\DeskripsiAbout;
use Illuminate\Http\Request;
use DataTables;

class DeskAboutController extends Controller
{
    public function index()
    {
        return view('admin.deskripsi_about.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'judul'=>'required|min:14|max:60',
            'deskripsi'=>'required|min:50|max:300',
        ],[
            'judul.required' => 'Judul Tidak Boleh Kosong',
            'deskripsi.required' => 'Deskripsi Tidak Boleh Kosong',
            'judul.max' => 'Judul Tidak Boleh Lebih Dari :max Karakter',
            'deskripsi.max' => 'Deskripsi Tidak Boleh Lebih Dari :max Karakter',
            'judul.min' =>  'Judul Minimal :min Karakter',
            'deskripsi.min' =>  'Deskripsi Minimal :min Karakter'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
       }else{
             $desk_about = DeskripsiAbout::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);

           if($desk_about){
               return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Deskripsi About Berhasil Ditambahkan']);
            }else{
               return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Gagal Menambahkan Data Deskripsi About']);
           }
       }
   
    }

    public function ajax(Request $request)
{
    if ($request->ajax()) {
        $tableDeskAbout = DeskripsiAbout::all();
    return DataTables::of($tableDeskAbout)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $table = '<center>';
                $table .=  '<div class="list-icons">';
                $table .=  '<div class="dropdown">';
                $table .='<a href="#" class="list-icons-item" data-toggle="dropdown" title="Menu Aksi">';
                $table .=    '<i class="fas fa-list-ul"></i>';
                $table .= '</a>';
                $table .=' <div class="dropdown-menu dropdown-menu-right">';
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="editDeskAboutBtn" style="font-size: 16px; cursor: pointer;" title="Edit Data Desk About"><i class="icon-note mr-2" style="color: #007bff;"></i>Edit</button>';
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="deleteDeskAboutBtn" style="font-size: 16px; cursor: pointer;" title="Delete Desk About"><i class="icon-trash text-danger mr-2"></i>Hapus</button>';
                $table .= '</div>';
                $table .= '</div>';
                $table .= '</div>';
                $table .= '</center>';

                return $table;
            })
            ->rawColumns(['action'])
            ->make(true);   
}

}

public function editDeskAbout(Request $request){
    $desk_about_id = $request->desk_about_id;
    $desk_aboutEdit = DeskripsiAbout::find($desk_about_id);
    return response()->json(['details'=>$desk_aboutEdit]);
}


public function updateDeskAbout(Request $request)
{
    $desk_about_id = $request->desk_about_id;

    $validator = Validator::make($request->all(),[
        'judul'=>'required|min:14|max:60',
        'deskripsi'=>'required|min:50|max:300',
    ],[
        'judul.required' => 'Judul Tidak Boleh Kosong',
            'deskripsi.required' => 'Deskripsi Tidak Boleh Kosong',
            'judul.max' => 'Judul Tidak Boleh Lebih Dari :max Karakter',
            'deskripsi.max' => 'Deskripsi Tidak Boleh Lebih Dari :max Karakter',
            'judul.min' =>  'Judul Minimal :min Karakter',
            'deskripsi.min' =>  'Deskripsi Minimal :min Karakter'
    ]);

    if(!$validator->passes()){
        return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
   }else{
            $desk_about = DeskripsiAbout::find($desk_about_id)->update([                
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);
        }

       if($desk_about){
           return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Deskripsi About Berhasil Di Update']);
        }else{
           return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Deskripsi About Gagal Di Update']);
       }
   }

public function deleteDeskAbout(Request $request){
    $desk_about_id = $request->desk_about_id;
    $desk_about = DeskripsiAbout::find($desk_about_id)->delete();

    if($desk_about){
        return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Deskripsi About Berhasil Dihapus']);
    }else{
        return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Deskripsi About Gagal Dihapus']);
    }
}
}
