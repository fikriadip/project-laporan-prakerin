<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Faq;
use DataTables;

class FaqController extends Controller
{
    public function index()
    {
        return view('admin.home.faq.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'question' => 'required|max:255',
            'answer' => 'required|max:1300',
        ],[
            'question.required' => 'Pertanyaan Tidak Boleh Kosong',
            'answer.required' => 'Jawaban Tidak Boleh Kosong',
            'question.max' => 'Pertanyaan Tidak Boleh Lebih Dari :max Karakter',
            'answer.max' => 'Jawaban Tidak Boleh Lebih Dari :max Karakter',
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
       }else{

            $faq = Faq::create($request->all());

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
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="editFaqBtn" style="font-size: 16px; cursor: pointer;" title="Edit Data Faq"><i class="icon-note mr-2" style="color: #007bff;"></i>Edit</button>';
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="deleteFaqBtn" style="font-size: 16px; cursor: pointer;" title="Delete Faq"><i class="icon-trash text-danger mr-2"></i>Hapus</button>';
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
        'question' => 'required|max:255',
        'answer' => 'required|max:1300',
    ],[
        'question.required' => 'Pertanyaan Tidak Boleh Kosong',
        'answer.required' => 'Jawaban Tidak Boleh Kosong',
        'question.max' => 'Pertanyaan Tidak Boleh Lebih Dari :max Karakter',
        'answer.max' => 'Jawaban Tidak Boleh Lebih Dari :max Karakter',
    ]);

    if(!$validator->passes()){
        return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
   }else{

        $faq = Faq::find($faq_id)->update([
            'question' => $request->question,
            'answer' => $request->answer
        ]);
        
       if($faq){
           return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Faq Berhasil Di Update']);
        }else{
           return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Faq Gagal Di Update']);
       }
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
