<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Faq;
use DataTables;

class FaqController extends Controller
{
    public function index()
    {
        return view('admin.faq.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'pertanyaan'=>'required|min:35|max:100',
            'jawaban'=>'required|min:100|max:400',
        ],[
            'required' => ':attribute Tidak Boleh Kosong',
            'max' => ':attribute Tidak Boleh Lebih Dari :max',
            'min' =>  ':attribute Minimal :min Karakter'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
       }else{
             $faq = Faq::create([
                'pertanyaan' => $request->pertanyaan,
                'jawaban' => $request->jawaban,
            ]);

           if($faq){
               return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Faq Berhasil Ditambahkan']);
            }else{
               return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Gagal Menambahkan Data Faq']);
           }
       }
   
    }

    public function ajax(Request $request)
{
    if ($request->ajax()) {
        $tableFaq = Faq::all();
    return DataTables::of($tableFaq)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $table = '<center>';
                $table .=  '<div class="list-icons">';
                $table .=  '<div class="dropdown">';
                $table .='<a href="#" class="list-icons-item" data-toggle="dropdown" title="Menu Aksi">';
                $table .=    '<i class="fas fa-list-ul"></i>';
                $table .= '</a>';
                $table .=' <div class="dropdown-menu dropdown-menu-right">';
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2 pe-auto" id="editFaqBtn" style="font-size: 16px;" title="Edit Data Faq"><i class="fas fa-edit mr-2" style="color: #007bff;"></i>Edit</button>';
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2 pe-auto" id="deleteFaqBtn" style="font-size: 16px;" title="Delete Faq"><i class="fas fa-times-circle text-danger mr-2"></i>Hapus</button>';
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

public function editFaq(Request $request){
    $faq_id = $request->faq_id;
    $faqEdit = Faq::find($faq_id);
    return response()->json(['details'=>$faqEdit]);
}


public function updateFaq(Request $request)
{
    $faq_id = $request->faq_id;

    $validator = Validator::make($request->all(),[
        'pertanyaan'=>'required|min:35|max:100',
        'jawaban'=>'required|min:100|max:450',
    ],[
        'required' => ':attribute Tidak Boleh Kosong',
        'max' => ':attribute Tidak Boleh Lebih Dari :max',
        'min' =>  ':attribute Minimal :min Karakter'
    ]);

    if(!$validator->passes()){
        return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
   }else{
            $faq = Faq::find($faq_id)->update([                
                'pertanyaan' => $request->pertanyaan,
                'jawaban' => $request->jawaban,
            ]);
        }

       if($faq){
           return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Faq Berhasil Di Update']);
        }else{
           return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Faq Gagal Di Update']);
       }
   }

public function deleteFaq(Request $request){
    $faq_id = $request->faq_id;
    $faq = Faq::find($faq_id)->delete();

    if($faq){
        return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Faq Berhasil Dihapus']);
    }else{
        return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Faq Gagal Dihapus']);
    }
}
}
