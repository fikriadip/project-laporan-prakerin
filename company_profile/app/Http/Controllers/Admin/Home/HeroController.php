<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Hero;
use DataTables;

class HeroController extends Controller
{
    public function index()
    {
        return view('admin.home.heroes.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title'=>'required|max:50',
            'content'=>'required|max:200',
            'photo' => 'required|image|max:2048|mimes:jpg,png,jpeg',
            'photo_behind' => 'required|image|max:2048|mimes:jpg,png,jpeg',
        ],[
            'title.required' => 'Title Tidak Boleh Kosong',
            'content.required' => 'Content Tidak Boleh Kosong',
            'photo.required' => 'Foto Tidak Boleh Kosong',
            'photo_behind.required' => 'Foto Behind Tidak Boleh Kosong',
            'mimes' => 'Foto Harus Berupa jpg, png, jpeg',
            'photo.image' => 'Foto Harus Berupa Gambar',
            'photo_behind.image' => 'Foto Behind Harus Berupa Gambar',
            'title.max' => 'Title Tidak Boleh Lebih Dari :max Karakter',
            'content.max' => 'Content Tidak Boleh Lebih Dari :max Karakter',
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

             $hero = Hero::create([
                'title' => $request->title,
                'content' => $request->content,
                'photo_behind' => $new_photo_behind,
                'photo' => $new_photo,
            ]);
        }

           if($hero){
               return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Hero Berhasil Ditambahkan']);
            }else{
               return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Gagal Menambahkan Data Hero']);
           }
       }
   
    }

    public function ajax(Request $request)
{
    if ($request->ajax()) {
        $tableHero = Hero::all();
        return DataTables::of($tableHero)
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
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="editHeroBtn" style="font-size: 16px; cursor: pointer;" title="Edit Data Hero"><i class="icon-note mr-2" style="color: #007bff;"></i>Edit</button>';
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="deleteHeroBtn" style="font-size: 16px; cursor: pointer;" title="Delete Hero"><i class="icon-trash text-danger mr-2"></i>Hapus</button>';
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

public function editHero(Request $request){
    $hero_id = $request->hero_id;
    $heroEdit = Hero::find($hero_id);
    return response()->json(['details'=>$heroEdit]);
}


public function updateHero(Request $request)
{
    $hero_id = $request->hero_id;

    $validator = Validator::make($request->all(),[
        'title'=>'required|max:50',
        'content'=>'required|max:200',
        'photo' => 'sometimes|image|max:2048|mimes:jpg,png,jpeg',
        'photo_behind' => 'sometimes|image|max:2048|mimes:jpg,png,jpeg',
    ],[
        'title.required' => 'Title Tidak Boleh Kosong',
        'content.required' => 'Content Tidak Boleh Kosong',
        'mimes' => 'Foto Harus Berupa jpg, png, jpeg',
        'photo.image' => 'Foto Harus Berupa Gambar',
        'photo_behind.image' => 'Foto Behind Harus Berupa Gambar',
        'title.max' => 'Title Tidak Boleh Lebih Dari :max Karakter',
        'content.max' => 'Content Tidak Boleh Lebih Dari :max Karakter',
        'photo.max' => 'Foto Tidak Boleh Lebih Dari :max MB',
        'photo_behind.max' => 'Foto Behind Tidak Boleh Lebih Dari :max MB',
    ]);

    if(!$validator->passes()){
        return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
   }else{

    if($request->file('photo') == "" && $request->file('photo_behind') == "") {

        $hero = Hero::find($hero_id)->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

    } else {    

        if ($request->photo && $request->photo_behind) {

            $photo = $request->file('photo');
            $new_photo = base64_encode(file_get_contents($request->photo));
            
            $photo_behind = $request->file('photo_behind');
            $new_photo_behind = base64_encode(file_get_contents($request->photo_behind));

             $hero = Hero::find($hero_id)->update([
                'title' => $request->title,
                'content' => $request->content,
                'photo_behind' => $new_photo_behind,
                'photo' => $new_photo,
            ]);
        }

    }

       if($hero){
           return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Hero Berhasil Di Update']);
        }else{
           return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Hero Gagal Di Update']);
       }
   }

}

public function deleteHero(Request $request){
    $hero_id = $request->hero_id;
    $hero = Hero::find($hero_id)->delete();

    if($hero){
        return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Hero Berhasil Dihapus']);
    }else{
        return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Hero Gagal Dihapus']);
    }
}
}
