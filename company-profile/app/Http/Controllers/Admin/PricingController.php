<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Pricing;
use DataTables;

class PricingController extends Controller
{
    public function index()
    {
        return view('admin.pricing.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'judul'=>'required|min:4|max:12',
            'harga'=>'required|min:4|max:16',
            'deskripsi'=>'required|min:15',
        ],[
            'required' => ':attribute Tidak Boleh Kosong',
            'max' => ':attribute Tidak Boleh Lebih Dari :max',
            'min' =>  ':attribute Minimal :min Karakter'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
       }else{
             $pricing = Pricing::create([
                'judul' => $request->judul,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
            ]);

           if($pricing){
               return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Pricing Berhasil Ditambahkan']);
            }else{
               return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Gagal Menambahkan Data Pricing']);
           }
       }
   
    }

    public function ajax(Request $request)
{
    if ($request->ajax()) {
        $tablePricing = Pricing::all();
    return DataTables::of($tablePricing)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $table = '<center>';
                $table .=  '<div class="list-icons">';
                $table .=  '<div class="dropdown">';
                $table .='<a href="#" class="list-icons-item" data-toggle="dropdown" title="Menu Aksi">';
                $table .=    '<i class="fas fa-list-ul"></i>';
                $table .= '</a>';
                $table .=' <div class="dropdown-menu dropdown-menu-right">';
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="editPricingBtn" style="font-size: 16px; cursor: pointer;" title="Edit Data Pricing"><i class="fas fa-edit mr-2" style="color: #007bff;"></i>Edit</button>';
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="deletePricingBtn" style="font-size: 16px; cursor: pointer;" title="Delete Pricing"><i class="fas fa-times-circle text-danger mr-2"></i>Hapus</button>';
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

public function editPricing(Request $request){
    $pricing_id = $request->pricing_id;
    $pricingEdit = Pricing::find($pricing_id);
    return response()->json(['details'=>$pricingEdit]);
}


public function updatePricing(Request $request)
{
    $pricing_id = $request->pricing_id;

    $validator = Validator::make($request->all(),[
        'judul'=>'required|min:4|max:12',
        'harga'=>'required|min:4|max:16',
        'deskripsi'=>'required|min:15',
    ],[
        'required' => ':attribute Tidak Boleh Kosong',
        'max' => ':attribute Tidak Boleh Lebih Dari :max',
        'min' =>  ':attribute Minimal :min Karakter'
    ]);

    if(!$validator->passes()){
        return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
   }else{
            $pricing = Pricing::find($pricing_id)->update([                
                'judul' => $request->judul,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
            ]);
        }

       if($pricing){
           return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Pricing Berhasil Di Update']);
        }else{
           return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Pricing Gagal Di Update']);
       }
   }

public function deletePricing(Request $request){
    $pricing_id = $request->pricing_id;
    $pricing = Pricing::find($pricing_id)->delete();

    if($pricing){
        return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Pricing Berhasil Dihapus']);
    }else{
        return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Pricing Gagal Dihapus']);
    }
}
}
