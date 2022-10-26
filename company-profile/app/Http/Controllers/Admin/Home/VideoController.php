<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Video;
use DataTables;

class VideoController extends Controller
{
    public function index()
    {
        return view('admin.home.videos.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|max:90',
            'link_video' => 'required',
            'photo' => 'required|image|max:2048|mimes:jpg,png,jpeg',
        ],[
            'title.required' => 'Title Tidak Boleh Kosong',
            'link_video.required' => 'Link Video Tidak Boleh Kosong',
            'photo.required' => 'Foto Tidak Boleh Kosong',
            'mimes' => 'Foto Harus Berupa jpg, png, jpeg',
            'photo.image' => 'Foto Harus Berupa Gambar',
            'title.max' => 'Title Tidak Boleh Lebih Dari :max Karakter',
            'photo.max' => 'Foto Tidak Boleh Lebih Dari :max MB',
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
       }else{

        if ($request->photo) {

            $photo = $request->file('photo');
            $new_photo = base64_encode(file_get_contents($request->photo));

             $video = Video::create([
                'title' => $request->title,
                'link_video' => $request->link_video,
                'photo' => $new_photo,
            ]);
        }

           if($video){
               return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Video Berhasil Ditambahkan']);
            }else{
               return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Gagal Menambahkan Data Video']);
           }
       }
   
    }

    public function ajax(Request $request)
{
    if ($request->ajax()) {
        $tableVideo = Video::all();
        return DataTables::of($tableVideo)
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
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="editVideoBtn" style="font-size: 16px; cursor: pointer;" title="Edit Data Video"><i class="icon-note mr-2" style="color: #007bff;"></i>Edit</button>';
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="deleteVideoBtn" style="font-size: 16px; cursor: pointer;" title="Delete Video"><i class="icon-trash text-danger mr-2"></i>Hapus</button>';
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

public function editVideo(Request $request){
    $video_id = $request->video_id;
    $videoEdit = Video::find($video_id);
    return response()->json(['details'=>$videoEdit]);
}


public function updateVideo(Request $request)
{
    $video_id = $request->video_id;

    $validator = Validator::make($request->all(),[
        'title'=>'required|max:90',
        'link_video'=>'required',
        'photo' => 'sometimes|image|max:2048|mimes:jpg,png,jpeg',
    ],[
        'title.required' => 'Title Tidak Boleh Kosong',
        'link_video.required' => 'Link Video Tidak Boleh Kosong',
        'mimes' => 'Foto Harus Berupa jpg, png, jpeg',
        'photo.image' => 'Foto Harus Berupa Gambar',
        'title.max' => 'Title Tidak Boleh Lebih Dari :max Karakter',
        'photo.max' => 'Foto Tidak Boleh Lebih Dari :max MB',
    ]);

    if(!$validator->passes()){
        return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
   }else{

    if($request->file('photo') == "") {

        $video = Video::find($video_id)->update([
            'title' => $request->title,
            'link_video' => $request->link_video
        ]);

    } else {    

        if ($request->photo) {
            $new_photo = base64_encode(file_get_contents($request->photo));

            $video = Video::find($video_id)->update([
                'photo' => $new_photo,
                'title' => $request->title,
                'link_video' => $request->link_video
            ]);
        }

    }

       if($video){
           return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Video Berhasil Di Update']);
        }else{
           return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Video Gagal Di Update']);
       }
   }

}

public function deleteVideo(Request $request){
    $video_id = $request->video_id;
    $video = Video::find($video_id)->delete();

    if($video){
        return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Video Berhasil Dihapus']);
    }else{
        return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Video Gagal Dihapus']);
    }
}
}
