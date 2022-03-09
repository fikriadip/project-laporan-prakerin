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
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="editDetailsBtn" style="font-size: 16px; cursor: pointer;" title="Edit Data Details"><i class="fas fa-edit mr-2" style="color: #007bff;"></i>Edit</button>';
                $table .=   '<a href="../admin/show-details/'.$row->id.'" class="dropdown-item mr-2" style="font-size: 16px; cursor: pointer;" title="Detail Data Details"><i class="fas fa-eye text-dark mr-2"></i>Detail</a>';
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="deleteDetailsBtn" style="font-size: 16px; cursor: pointer;" title="Delete Details"><i class="fas fa-times-circle text-danger mr-2"></i>Hapus</button>';
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
        'paragraf'=>'required|min:40|max:320',
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
