<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Introduction;
use DataTables;

class IntroductionController extends Controller
{
    public function index()
    {
        return view('admin.about.introductions.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title'=>'required|max:40',
            'heading'=>'required|max:180',
            'paragraf'=>'required|max:350',
            'content'=>'required|max:250',
            'photo' => 'required|image|max:2048|mimes:jpg,png,jpeg',
        ],[
            'title.required' => 'Title Tidak Boleh Kosong',
            'heading.required' => 'Heading Tidak Boleh Kosong',
            'paragraf.required' => 'Paragraf Tidak Boleh Kosong',
            'content.required' => 'Content Tidak Boleh Kosong',
            'photo.required' => 'Foto Tidak Boleh Kosong',
            'mimes' => 'Foto Harus Berupa jpg, png, jpeg',
            'photo.image' => 'Foto Harus Berupa Gambar',
            'title.max' => 'Title Tidak Boleh Lebih Dari :max Karakter',
            'heading.max' => 'Heading Tidak Boleh Lebih Dari :max Karakter',
            'paragraf.max' => 'Paragraf Tidak Boleh Lebih Dari :max Karakter',
            'content.max' => 'Content Tidak Boleh Lebih Dari :max Karakter',
            'photo.max' => 'Foto Tidak Boleh Lebih Dari :max MB',
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
       }else{

        if ($request->photo) {

            $photo = $request->file('photo');
            $new_photo = base64_encode(file_get_contents($request->photo));

             $introduction = Introduction::create([
                'title' => $request->title,
                'heading' => $request->heading,
                'paragraf' => $request->paragraf,
                'content' => $request->content,
                'photo' => $new_photo,
            ]);
        }

           if($introduction){
               return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Introduction Berhasil Ditambahkan']);
            }else{
               return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Gagal Menambahkan Data Introduction']);
           }
       }
   
    }

    public function ajax(Request $request)
{
    if ($request->ajax()) {
        $tableIntroduction = Introduction::all();
        return DataTables::of($tableIntroduction)
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
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="editIntroductionBtn" style="font-size: 16px; cursor: pointer;" title="Edit Data Introduction"><i class="icon-note mr-2" style="color: #007bff;"></i>Edit</button>';
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="deleteIntroductionBtn" style="font-size: 16px; cursor: pointer;" title="Delete Introduction"><i class="icon-trash text-danger mr-2"></i>Hapus</button>';
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

public function editIntroduction(Request $request){
    $introduction_id = $request->introduction_id;
    $introductionEdit = Introduction::find($introduction_id);
    return response()->json(['details'=>$introductionEdit]);
}


public function updateIntroduction(Request $request)
{
    $introduction_id = $request->introduction_id;

    $validator = Validator::make($request->all(),[
        'title'=>'required|max:40',
        'heading'=>'required|max:180',
        'paragraf'=>'required|max:350',
        'content'=>'required|max:250',
        'photo' => 'sometimes|image|max:2048|mimes:jpg,png,jpeg',
    ],[
        'title.required' => 'Title Tidak Boleh Kosong',
        'heading.required' => 'Heading Tidak Boleh Kosong',
        'paragraf.required' => 'Paragraf Tidak Boleh Kosong',
        'content.required' => 'Content Tidak Boleh Kosong',
        'mimes' => 'Foto Harus Berupa jpg, png, jpeg',
        'photo.image' => 'Foto Harus Berupa Gambar',
        'title.max' => 'Title Tidak Boleh Lebih Dari :max Karakter',
        'heading.max' => 'Heading Tidak Boleh Lebih Dari :max Karakter',
        'paragraf.max' => 'Paragraf Tidak Boleh Lebih Dari :max Karakter',
        'content.max' => 'Content Tidak Boleh Lebih Dari :max Karakter',
        'photo.max' => 'Foto Tidak Boleh Lebih Dari :max MB',
    ]);

    if(!$validator->passes()){
        return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
   }else{

    if($request->file('photo') == "") {

        $introduction = Introduction::find($introduction_id)->update([
            'title' => $request->title,
            'heading' => $request->heading,
            'paragraf' => $request->paragraf,
            'content' => $request->content
        ]);

    } else {    

        if ($request->photo) {
            $new_photo = base64_encode(file_get_contents($request->photo));

            $introduction = Introduction::find($introduction_id)->update([
                'title' => $request->title,
                'heading' => $request->heading,
                'paragraf' => $request->paragraf,
                'content' => $request->content,
                'photo' => $new_photo
            ]);
        }

    }

       if($introduction){
           return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Introduction Berhasil Di Update']);
        }else{
           return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Introduction Gagal Di Update']);
       }
   }

}

public function deleteIntroduction(Request $request){
    $introduction_id = $request->introduction_id;
    $introduction = Introduction::find($introduction_id)->delete();

    if($introduction){
        return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Introduction Berhasil Dihapus']);
    }else{
        return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Introduction Gagal Dihapus']);
    }
}
}
