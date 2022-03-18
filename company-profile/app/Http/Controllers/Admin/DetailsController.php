<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Detail;
use DataTables;

class DetailsController extends Controller
{
    public function index()
    {
        return view('admin.details.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'judul'=>'required|min:40|max:130',
            'subjudul'=>'required|min:40|max:320',
            'penjelasan1'=>'required|min:40|max:80 ',
            'penjelasan2'=>'required|min:40|max:80',
            'penjelasan3'=>'required|min:40|max:80',
            'penjelasan4'=>'required|min:40|max:80',
            'paragraf'=>'required|min:40|max:320',
            'image' => 'required|image|max:2048|mimes:jpg,png,jpeg',
        ],[
            'judul.required' => 'Judul Tidak Boleh Kosong',
            'subjudul.required' => 'Subjudul Tidak Boleh Kosong',
            'penjelasan1.required' => 'Penjelasan 1 Tidak Boleh Kosong',
            'penjelasan2.required' => 'Penjelasan 2 Tidak Boleh Kosong',
            'penjelasan3.required' => 'Penjelasan 3 Tidak Boleh Kosong',
            'penjelasan4.required' => 'Penjelasan 4 Tidak Boleh Kosong',
            'paragraf.required' => 'Paragraf Tidak Boleh Kosong',
            'image.required' => 'Foto Tidak Boleh Kosong',
            'image.mimes' => 'Foto Harus Berupa jpg, png, jpeg',
            'image.image' => 'Foto Harus Berupa Gambar',
            'judul.max' => 'Judul Tidak Boleh Lebih Dari :max Karakter',
            'subjudul.max' => 'Subjudul Tidak Boleh Lebih Dari :max Karakter',
            'penjelasan1.max' => 'Penjelasan 1 Tidak Boleh Lebih Dari :max Karakter',
            'penjelasan2.max' => 'Penjelasan 2 Tidak Boleh Lebih Dari :max Karakter',
            'penjelasan3.max' => 'Penjelasan 3 Tidak Boleh Lebih Dari :max Karakter',
            'penjelasan4.max' => 'Penjelasan 4 Tidak Boleh Lebih Dari :max Karakter',
            'paragraf.max' => 'Paragraf Tidak Boleh Lebih Dari :max Karakter',
            'image.max' => 'Foto Tidak Boleh Lebih Dari :max MB',
            'judul.min' =>  'Judul Minimal :min Karakter',
            'subjudul.min' =>  'Subjudul Minimal :min Karakter',
            'penjelasan1.min' =>  'Penjelasan 1 Minimal :min Karakter',
            'penjelasan2.min' =>  'Penjelasan 2 Minimal :min Karakter',
            'penjelasan3.min' =>  'Penjelasan 3 Minimal :min Karakter',
            'penjelasan4.min' =>  'Penjelasan 4 Minimal :min Karakter',
            'paragraf.min' =>  'Paragraf Minimal :min Karakter'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
       }else{

        if ($request->image) {

            $image = $request->file('image');
            $new_image= base64_encode(file_get_contents($request->image));

             $details = Detail::create([
                'judul' => $request->judul,
                'subjudul' => $request->subjudul,
                'penjelasan1' => $request->penjelasan1,
                'penjelasan2' => $request->penjelasan2,
                'penjelasan3' => $request->penjelasan3,
                'penjelasan4' => $request->penjelasan4,
                'paragraf' => $request->paragraf,
                'image' => $new_image,
            ]);
        }

           if($details){
               return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Details Berhasil Ditambahkan']);
            }else{
               return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Gagal Menambahkan Data Details']);
           }
       }
   
    }

    public function ajax(Request $request)
{
    if ($request->ajax()) {
        $tableDetails = Detail::all();
    return DataTables::of($tableDetails)
            ->addIndexColumn()
            ->addColumn('image', function($row){
                $table = '<center>';
                return '<img src='."data:image/" . $row->imageType . ";base64," . $row->image.' width="190px" class="text-center shadow-sm rounded m-2" loading="lazy">';
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
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="editDetailsBtn" style="font-size: 16px; cursor: pointer;" title="Edit Data Details"><i class="icon-note mr-2" style="color: #007bff;"></i>Edit</button>';
                $table .=   '<a href="../admin/show-details/'.$row->id.'" class="dropdown-item mr-2" style="font-size: 16px; cursor: pointer;" title="Detail Data Details"><i class="icon-eye text-dark mr-2"></i>Detail</a>';
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="deleteDetailsBtn" style="font-size: 16px; cursor: pointer;" title="Delete Details"><i class="icon-trash text-danger mr-2"></i>Hapus</button>';
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

public function showDetail($id)
{
    $showDetails = Detail::find($id);
    // dd($showPengaduan);
    return view('admin.details.show',compact('showDetails'));
}

public function editDetails(Request $request){
    $details_id = $request->details_id;
    $detailsEdit = Detail::find($details_id);
    return response()->json(['details'=>$detailsEdit]);
}


public function updateDetails(Request $request)
{
    $details_id = $request->details_id;

    $validator = Validator::make($request->all(),[
        'judul'=>'required|min:40|max:130',
        'subjudul'=>'required|min:40|max:320',
        'penjelasan1'=>'required|min:40|max:80 ',
        'penjelasan2'=>'required|min:40|max:80',
        'penjelasan3'=>'required|min:40|max:80',
        'penjelasan4'=>'required|min:40|max:80',
        'paragraf'=>'required|min:40|max:800',
        'image' => 'sometimes|image|max:2048|mimes:jpg,png,jpeg',
    ],[
        'judul.required' => 'Judul Tidak Boleh Kosong',
            'subjudul.required' => 'Subjudul Tidak Boleh Kosong',
            'penjelasan1.required' => 'Penjelasan 1 Tidak Boleh Kosong',
            'penjelasan2.required' => 'Penjelasan 2 Tidak Boleh Kosong',
            'penjelasan3.required' => 'Penjelasan 3 Tidak Boleh Kosong',
            'penjelasan4.required' => 'Penjelasan 4 Tidak Boleh Kosong',
            'paragraf.required' => 'Paragraf Tidak Boleh Kosong',
            'image.mimes' => 'Foto Harus Berupa jpg, png, jpeg',
            'image.image' => 'Foto Harus Berupa Gambar',
            'judul.max' => 'Judul Tidak Boleh Lebih Dari :max Karakter',
            'subjudul.max' => 'Subjudul Tidak Boleh Lebih Dari :max Karakter',
            'penjelasan1.max' => 'Penjelasan 1 Tidak Boleh Lebih Dari :max Karakter',
            'penjelasan2.max' => 'Penjelasan 2 Tidak Boleh Lebih Dari :max Karakter',
            'penjelasan3.max' => 'Penjelasan 3 Tidak Boleh Lebih Dari :max Karakter',
            'penjelasan4.max' => 'Penjelasan 4 Tidak Boleh Lebih Dari :max Karakter',
            'paragraf.max' => 'Paragraf Tidak Boleh Lebih Dari :max Karakter',
            'image.max' => 'Foto Tidak Boleh Lebih Dari :max MB',
            'judul.min' =>  'Judul Minimal :min Karakter',
            'subjudul.min' =>  'Subjudul Minimal :min Karakter',
            'penjelasan1.min' =>  'Penjelasan 1 Minimal :min Karakter',
            'penjelasan2.min' =>  'Penjelasan 2 Minimal :min Karakter',
            'penjelasan3.min' =>  'Penjelasan 3 Minimal :min Karakter',
            'penjelasan4.min' =>  'Penjelasan 4 Minimal :min Karakter',
            'paragraf.min' =>  'Paragraf Minimal :min Karakter'
    ]);

    if(!$validator->passes()){
        return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
   }else{

    if($request->file('image') == "") {

        $details = Detail::find($details_id)->update([
            'judul' => $request->judul,
                'subjudul' => $request->subjudul,
                'penjelasan1' => $request->penjelasan1,
                'penjelasan2' => $request->penjelasan2,
                'penjelasan3' => $request->penjelasan3,
                'penjelasan4' => $request->penjelasan4,
                'paragraf' => $request->paragraf,
        ]);

    } else {    

        if ($request->image) {
            $new_image= base64_encode(file_get_contents($request->image));

            $details = Detail::find($details_id)->update([
                'judul' => $request->judul,
                'subjudul' => $request->subjudul,
                'penjelasan1' => $request->penjelasan1,
                'penjelasan2' => $request->penjelasan2,
                'penjelasan3' => $request->penjelasan3,
                'penjelasan4' => $request->penjelasan4,
                'paragraf' => $request->paragraf,
                'image' => $new_image,
            ]);
        }

    }

       if($details){
           return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Details Berhasil Di Update']);
        }else{
           return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Details Gagal Di Update']);
       }
   }

}

public function deleteDetails(Request $request){
    $details_id = $request->details_id;
    $details = Detail::find($details_id)->delete();

    if($details){
        return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Details Berhasil Dihapus']);
    }else{
        return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Details Gagal Dihapus']);
    }
}
}
