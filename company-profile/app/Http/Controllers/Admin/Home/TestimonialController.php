<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use DataTables;

class TestimonialController extends Controller
{
    public function index()
    {
        return view('admin.home.testimonials.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'content' => 'required|max:300',
            'name' => 'required',
        ],[
            'content.required' => 'Content Tidak Boleh Kosong',
            'name.required' => 'Nama Tidak Boleh Kosong',
            'content.max' => 'Content Tidak Boleh Lebih Dari :max Karakter',
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
       }else{

        $testimonial = Testimonial::create($request->all());

           if($testimonial){
               return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Testimonial Berhasil Ditambahkan']);
            }else{
               return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Gagal Menambahkan Data Testimonial']);
           }
       }
   
    }

    public function ajax(Request $request)
{
    if ($request->ajax()) {
        $tableTestimonial = Testimonial::all();
        return DataTables::of($tableTestimonial)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $table = '<center>';
                $table .=  '<div class="list-icons">';
                $table .=  '<div class="dropdown">';
                $table .='<a href="#" class="list-icons-item" data-toggle="dropdown" title="Menu Aksi">';
                $table .=    '<i class="fas fa-list-ul"></i>';
                $table .= '</a>';
                $table .=' <div class="dropdown-menu dropdown-menu-right">';
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="editTestimonialBtn" style="font-size: 16px; cursor: pointer;" title="Edit Data Testimonial"><i class="icon-note mr-2" style="color: #007bff;"></i>Edit</button>';
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="deleteTestimonialBtn" style="font-size: 16px; cursor: pointer;" title="Delete Testimonial"><i class="icon-trash text-danger mr-2"></i>Hapus</button>';
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

public function editTestimonial(Request $request){
    $testimonial_id = $request->testimonial_id;
    $testimonialEdit = Testimonial::find($testimonial_id);
    return response()->json(['details'=>$testimonialEdit]);
}


public function updateTestimonial(Request $request)
{
    $testimonial_id = $request->testimonial_id;

    $validator = Validator::make($request->all(),[
        'content'=>'required|max:300',
        'name'=>'required',
    ],[
        'content.required' => 'Content Tidak Boleh Kosong',
        'name.required' => 'Nama Tidak Boleh Kosong',
        'content.max' => 'Content Tidak Boleh Lebih Dari :max Karakter',
    ]);

    if(!$validator->passes()){
        return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
   }else{

        $testimonial = Testimonial::find($testimonial_id)->update([
            'content' => $request->content,
            'name' => $request->name
        ]);

       if($testimonial){
           return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Testimonial Berhasil Di Update']);
        }else{
           return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Testimonial Gagal Di Update']);
       }
   }

}

public function deleteTestimonial(Request $request){
    $testimonial_id = $request->testimonial_id;
    $testimonial = Testimonial::find($testimonial_id)->delete();

    if($testimonial){
        return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Testimonial Berhasil Dihapus']);
    }else{
        return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Testimonial Gagal Dihapus']);
    }
}
}
