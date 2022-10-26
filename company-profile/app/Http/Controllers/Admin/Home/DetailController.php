<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Detail;
use DataTables;

class DetailController extends Controller
{
    public function index()
    {
        return view('admin.home.details.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title'=>'required|max:50',
            'photo' => 'required|image|max:2048|mimes:jpg,png,jpeg',
            'photo_behind' => 'required|image|max:2048|mimes:jpg,png,jpeg',
        ],[
            'title.required' => 'Title Tidak Boleh Kosong',
            'photo.required' => 'Foto Tidak Boleh Kosong',
            'photo_behind.required' => 'Foto Behind Tidak Boleh Kosong',
            'mimes' => 'Foto Harus Berupa jpg, png, jpeg',
            'photo.image' => 'Foto Harus Berupa Gambar',
            'photo_behind.image' => 'Foto Behind Harus Berupa Gambar',
            'title.max' => 'Title Tidak Boleh Lebih Dari :max Karakter',
            'photo.max' => 'Foto Tidak Boleh Lebih Dari :max MB',
            'photo_behind.max' => 'Foto Behind Tidak Boleh Lebih Dari :max MB',
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
       }else{

        if ($request->photo && $request->photo_behind) {

            $photo = $request->file('photo');
            $new_photo = base64_encode(file_get_contents($request->photo));
            
            $photo_behind = $request->file('photo_behind');
            $new_photo_behind = base64_encode(file_get_contents($request->photo_behind));

             $detail = Detail::create([
                'photo_behind' => $new_photo_behind,
                'title' => $request->title,
                'photo' => $new_photo,
            ]);
        }

           if($detail){
               return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Detail Berhasil Ditambahkan']);
            }else{
               return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Gagal Menambahkan Data Detail']);
           }
       }
   
    }

    public function ajax(Request $request)
{
    if ($request->ajax()) {
        $tableDetail = Detail::all();
        return DataTables::of($tableDetail)
            ->addIndexColumn()
            ->addColumn('photo_behind', function($row){
                $table = '<center>';
                $table .= '<img src='."data:image/" . $row->imageType . ";base64," . $row->photo_behind.' width="190px" class="shadow-sm rounded m-2" loading="lazy">';
                $table .= '</center>';
                return $table;
              })
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
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="editDetailBtn" style="font-size: 16px; cursor: pointer;" title="Edit Data Detail"><i class="icon-note mr-2" style="color: #007bff;"></i>Edit</button>';
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="deleteDetailBtn" style="font-size: 16px; cursor: pointer;" title="Delete Detail"><i class="icon-trash text-danger mr-2"></i>Hapus</button>';
                $table .= '</div>';
                $table .= '</div>';
                $table .= '</div>';
                $table .= '</center>';

                return $table;
            })
            ->rawColumns(['photo','photo_behind','action'])
            ->make(true);   
}

}

public function editDetail(Request $request){
    $detail_id = $request->detail_id;
    $detailEdit = Detail::find($detail_id);
    return response()->json(['details'=>$detailEdit]);
}


public function updateDetail(Request $request)
{
    $detail_id = $request->detail_id;

    $validator = Validator::make($request->all(),[
        'title'=>'required|max:50',
        'photo' => 'sometimes|image|max:2048|mimes:jpg,png,jpeg',
        'photo_behind' => 'sometimes|image|max:2048|mimes:jpg,png,jpeg',
    ],[
        'title.required' => 'Title Tidak Boleh Kosong',
        'mimes' => 'Foto Harus Berupa jpg, png, jpeg',
        'photo.image' => 'Foto Harus Berupa Gambar',
        'photo_behind.image' => 'Foto Behind Harus Berupa Gambar',
        'title.max' => 'Title Tidak Boleh Lebih Dari :max Karakter',
        'photo.max' => 'Foto Tidak Boleh Lebih Dari :max MB',
        'photo_behind.max' => 'Foto Behind Tidak Boleh Lebih Dari :max MB',
    ]);

    if(!$validator->passes()){
        return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
   }else{

    if($request->file('photo') == "" && $request->file('photo_behind') == "") {

        $detail = Detail::find($detail_id)->update([
            'title' => $request->title,
        ]);

    } else {    

        if ($request->photo && $request->photo_behind) {

            $photo = $request->file('photo');
            $new_photo = base64_encode(file_get_contents($request->photo));
            
            $photo_behind = $request->file('photo_behind');
            $new_photo_behind = base64_encode(file_get_contents($request->photo_behind));

             $detail = Detail::find($detail_id)->update([
                'photo_behind' => $new_photo_behind,
                'title' => $request->title,
                'photo' => $new_photo,
            ]);
        }

    }

       if($detail){
           return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Detail Berhasil Di Update']);
        }else{
           return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Detail Gagal Di Update']);
       }
   }

}

public function deleteDetail(Request $request){
    $detail_id = $request->detail_id;
    $detail = Detail::find($detail_id)->delete();

    if($detail){
        return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Detail Berhasil Dihapus']);
    }else{
        return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Detail Gagal Dihapus']);
    }
}
}
