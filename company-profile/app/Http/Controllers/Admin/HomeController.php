<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Home;
use DataTables;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'judul'=>'required|min:20|max:40',
            'subjudul'=>'required|min:8|max:16',
            'deskripsi'=>'required|min:20',
            'image' => 'required|image|max:2048|mimes:jpg,png,jpeg,svg',
        ],[
            'required' => ':attribute Tidak Boleh Kosong',
            'mimes' => ':attribute Harus Berupa jpg, png, jpeg, svg',
            'max' => ':attribute Tidak Boleh Lebih Dari :max',
            'min' =>  ':attribute Minimal :min Karakter'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
       }else{

        if ($request->image) {

            $image = $request->file('image');
            $new_image= base64_encode(file_get_contents($request->image));

             $home = Home::create([
                'judul' => $request->judul,
                'subjudul' => $request->subjudul,
                'deskripsi' => $request->deskripsi,
                'image' => $new_image,
            ]);
        }

           if($home){
               return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Home Berhasil Ditambahkan']);
            }else{
               return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Gagal Menambahkan Data Home']);
           }
       }
   
    }

    public function ajax(Request $request)
{
    if ($request->ajax()) {
        $tableHome = Home::all();
    return DataTables::of($tableHome)
            ->addIndexColumn()
            ->addColumn('image', function($row){
                $table = '<center>';
                return '<img src='."data:image/" . $row->imageType . ";base64," . $row->image.' width="190px" class="shadow-sm rounded m-2" loading="lazy">';
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
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="editHomeBtn" style="font-size: 16px; cursor: pointer;" title="Edit Data Home"><i class="fas fa-edit mr-2" style="color: #007bff;"></i>Edit</button>';
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="deleteHomeBtn" style="font-size: 16px; cursor: pointer;" title="Delete Home"><i class="fas fa-times-circle text-danger mr-2"></i>Hapus</button>';
                $table .= '</div>';
                $table .= '</div>';
                $table .= '</div>';
                $table .= '</center>';

                return $table;
            })
            ->rawColumns(['image','action'])
            ->make(true);   
}

}

public function editHome(Request $request){
    $home_id = $request->home_id;
    $homeEdit = Home::find($home_id);
    return response()->json(['details'=>$homeEdit]);
}


public function updateHome(Request $request)
{
    $home_id = $request->home_id;

    $validator = Validator::make($request->all(),[
        'judul'=>'required|min:20|max:40',
        'subjudul'=>'required|min:8|max:16',
        'deskripsi'=>'required|min:20',
    ],[
        'required' => ':attribute Tidak Boleh Kosong',
        'mimes' => ':attribute Harus Berupa jpg, png, jpeg, svg',
        'max' => ':attribute Tidak Boleh Lebih Dari :max',
        'min' =>  ':attribute Minimal :min Karakter'
    ]);

    if(!$validator->passes()){
        return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
   }else{

    if($request->file('image') == "") {

        $home = Home::find($home_id)->update([
            'judul' => $request->judul,
            'subjudul' => $request->subjudul,
            'deskripsi' => $request->deskripsi,
        ]);

    } else {    

        if ($request->image) {
            $new_image= base64_encode(file_get_contents($request->image));

            $home = Home::find($home_id)->update([
                'image' => $new_image,
                'judul' => $request->judul,
                'subjudul' => $request->subjudul,
                'deskripsi' => $request->deskripsi,
            ]);
        }

    }

       if($home){
           return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Home Berhasil Di Update']);
        }else{
           return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Home Gagal Di Update']);
       }
   }

}

public function deleteHome(Request $request){
    $home_id = $request->home_id;
    $home = Home::find($home_id)->delete();

    if($home){
        return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Home Berhasil Dihapus']);
    }else{
        return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Home Gagal Dihapus']);
    }
}
}
