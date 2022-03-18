<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\About;
use DataTables;

class AboutController extends Controller
{
    public function index()
    {
        return view('admin.about.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'judul'=>'required|min:30|max:70',
            'subjudul'=>'required|min:100|max:400',
            'link_youtube'=>'required',
        ],[
            'judul.required' => 'Judul Tidak Boleh Kosong',
            'subjudul.required' => 'Subjudul Tidak Boleh Kosong',
            'link_youtube.required' => 'Link Youtube Tidak Boleh Kosong',
            'judul.max' => 'Judul Tidak Boleh Lebih Dari :max Karakter',
            'subjudul.max' => 'Subjudul Tidak Boleh Lebih Dari :max Karakter',
            'judul.min' =>  'Judul Minimal :min Karakter',
            'subjudul.min' =>  'Subjudul Minimal :min Karakter'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
       }else{
             $about = About::create([
                'judul' => $request->judul,
                'subjudul' => $request->subjudul,
                'link_youtube' => $request->link_youtube,
            ]);

           if($about){
               return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data About Berhasil Ditambahkan']);
            }else{
               return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Gagal Menambahkan Data About']);
           }
       }
   
    }

    public function ajax(Request $request)
{
    if ($request->ajax()) {
        $tableAbout = About::all();
    return DataTables::of($tableAbout)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $table = '<center>';
                $table .=  '<div class="list-icons">';
                $table .=  '<div class="dropdown">';
                $table .='<a href="#" class="list-icons-item" data-toggle="dropdown" title="Menu Aksi">';
                $table .=    '<i class="fas fa-list-ul"></i>';
                $table .= '</a>';
                $table .=' <div class="dropdown-menu dropdown-menu-right">';
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="editAboutBtn" style="font-size: 16px; cursor: pointer;" title="Edit Data About"><i class="icon-note mr-2" style="color: #007bff;"></i>Edit</button>';
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="deleteAboutBtn" style="font-size: 16px; cursor: pointer;" title="Delete About"><i class="icon-trash text-danger mr-2"></i>Hapus</button>';
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

public function editAbout(Request $request){
    $about_id = $request->about_id;
    $aboutEdit = About::find($about_id);
    return response()->json(['details'=>$aboutEdit]);
}


public function updateAbout(Request $request)
{
    $about_id = $request->about_id;

    $validator = Validator::make($request->all(),[
        'judul'=>'required|min:30|max:70',
        'subjudul'=>'required|min:100|max:400',
        'link_youtube'=>'required',
    ],[
        'judul.required' => 'Judul Tidak Boleh Kosong',
            'subjudul.required' => 'Subjudul Tidak Boleh Kosong',
            'link_youtube.required' => 'Link Youtube Tidak Boleh Kosong',
            'judul.max' => 'Judul Tidak Boleh Lebih Dari :max Karakter',
            'subjudul.max' => 'Subjudul Tidak Boleh Lebih Dari :max Karakter',
            'judul.min' =>  'Judul Minimal :min Karakter',
            'subjudul.min' =>  'Subjudul Minimal :min Karakter'
    ]);

    if(!$validator->passes()){
        return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
   }else{
            $about = About::find($about_id)->update([                
                'judul' => $request->judul,
                'subjudul' => $request->subjudul,
                'link_youtube' => $request->link_youtube,
            ]);
        }

       if($about){
           return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data About Berhasil Di Update']);
        }else{
           return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data About Gagal Di Update']);
       }
   }

public function deleteAbout(Request $request){
    $about_id = $request->about_id;
    $about = About::find($about_id)->delete();

    if($about){
        return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data About Berhasil Dihapus']);
    }else{
        return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data About Gagal Dihapus']);
    }
}
}
