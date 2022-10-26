<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\DeskDetail;
use DataTables;

class DeskDetailController extends Controller
{
    public function index()
    {
        return view('admin.home.deskripsi_details.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|max:40',
            'content' => 'required',
        ],[
            'title.required' => 'Title Tidak Boleh Kosong',
            'content.required' => 'Content Tidak Boleh Kosong',
            'title.max' => 'Title Tidak Boleh Lebih Dari :max Karakter',
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
       }else{

        $desk_detail = DeskDetail::create($request->all());


           if($desk_detail){
               return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Deskripsi Berhasil Ditambahkan']);
            }else{
               return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Gagal Menambahkan Data Deskripsi']);
           }
       }
   
    }

    public function ajax(Request $request)
{
    if ($request->ajax()) {
        $tableDeskDetail = DeskDetail::all();
        return DataTables::of($tableDeskDetail)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $table = '<center>';
                $table .=  '<div class="list-icons">';
                $table .=  '<div class="dropdown">';
                $table .='<a href="#" class="list-icons-item" data-toggle="dropdown" title="Menu Aksi">';
                $table .=    '<i class="fas fa-list-ul"></i>';
                $table .= '</a>';
                $table .=' <div class="dropdown-menu dropdown-menu-right">';
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="editDeskDetailBtn" style="font-size: 16px; cursor: pointer;" title="Edit Data Desk"><i class="icon-note mr-2" style="color: #007bff;"></i>Edit</button>';
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="deleteDeskDetailBtn" style="font-size: 16px; cursor: pointer;" title="Delete Desk"><i class="icon-trash text-danger mr-2"></i>Hapus</button>';
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

public function editDeskDetail(Request $request){
    $deskripsi_id = $request->deskripsi_id;
    $deskEdit = DeskDetail::find($deskripsi_id);
    return response()->json(['details'=>$deskEdit]);
}


public function updateDeskDetail(Request $request)
{
    $deskripsi_id = $request->deskripsi_id;

    $validator = Validator::make($request->all(),[
        'title' => 'required|max:40',
        'content' => 'required',
    ],[
        'title.required' => 'Title Tidak Boleh Kosong',
        'content.required' => 'Content Tidak Boleh Kosong',
        'title.max' => 'Title Tidak Boleh Lebih Dari :max Karakter',
    ]);

    if(!$validator->passes()){
        return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
   }else{

        $desk_detail = DeskDetail::find($deskripsi_id)->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

       if($desk_detail){
           return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Deskripsi Berhasil Di Update']);
        }else{
           return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Deskripsi Gagal Di Update']);
       }
   }

}

public function deleteDeskDetail(Request $request){
    $deskripsi_id = $request->deskripsi_id;
    $desk_detail = DeskDetail::find($deskripsi_id)->delete();

    if($desk_detail){
        return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Deskripsi Berhasil Dihapus']);
    }else{
        return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Deskripsi Gagal Dihapus']);
    }
}
}
