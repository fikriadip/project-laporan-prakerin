<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Contact;
use DataTables;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin.contact.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'deskripsi_lokasi'=>'required|max:70',
            'alamat_email' => 'required|max:30',
            'no_telepon' => 'required|digits:12|max:18',
        ],[
            'required' => ':attribute Tidak Boleh Kosong',
            'max' => ':attribute Tidak Boleh Lebih Dari :max',
            'min' =>  ':attribute Minimal :min Karakter',
            'digits' =>  ':attribute Minimal :digits Digit'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
       }else{
             $contact = Contact::create([
                'deskripsi_lokasi' => $request->deskripsi_lokasi,
                'alamat_email' => $request->alamat_email,
                'no_telepon' => $request->no_telepon,
            ]);

           if($contact){
               return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Contact Berhasil Ditambahkan']);
            }else{
               return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Gagal Menambahkan Data Contact']);
           }
       }
   
    }

    public function ajax(Request $request)
{
    if ($request->ajax()) {
        $tableContact = Contact::all();
    return DataTables::of($tableContact)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $table = '<center>';
                $table .=  '<div class="list-icons">';
                $table .=  '<div class="dropdown">';
                $table .='<a href="#" class="list-icons-item" data-toggle="dropdown" title="Menu Aksi">';
                $table .=    '<i class="fas fa-list-ul"></i>';
                $table .= '</a>';
                $table .=' <div class="dropdown-menu dropdown-menu-right">';
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="editContactBtn" style="font-size: 16px; cursor: pointer;" title="Edit Data Contact"><i class="fas fa-edit mr-2" style="color: #007bff;"></i>Edit</button>';
                $table .=   '<button data-id="'.$row->id.'" class="dropdown-item mr-2" id="deleteContactBtn" style="font-size: 16px; cursor: pointer;" title="Delete Contact"><i class="fas fa-times-circle text-danger mr-2"></i>Hapus</button>';
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

public function editContact(Request $request){
    $contact_id = $request->contact_id;
    $contactEdit = Contact::find($contact_id);
    return response()->json(['details'=>$contactEdit]);
}


public function updateContact(Request $request)
{
    $contact_id = $request->contact_id;

    $validator = Validator::make($request->all(),[
        'deskripsi_lokasi'=>'required|max:70',
        'alamat_email' => 'required|max:30',
        'no_telepon' => 'required|digits:12|max:18',
    ],[
        'required' => ':attribute Tidak Boleh Kosong',
        'max' => ':attribute Tidak Boleh Lebih Dari :max',
        'min' =>  ':attribute Minimal :min Karakter',
        'digits' =>  ':attribute Minimal :digits Digit'
    ]);

    if(!$validator->passes()){
        return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
   }else{  
            $contact = Contact::find($contact_id)->update([
                'deskripsi_lokasi' => $request->deskripsi_lokasi,
                'alamat_email' => $request->alamat_email,
                'no_telepon' => $request->no_telepon,
            ]);
        

    

       if($contact){
           return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Contact Berhasil Di Update']);
        }else{
           return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Contact Gagal Di Update']);
       }
   }

}

public function deleteContact(Request $request){
    $contact_id = $request->contact_id;
    $contact = Contact::find($contact_id)->delete();

    if($contact){
        return response()->json(['code'=>1, 'status' => 'BERHASIL', 'message' => 'Data Contact Berhasil Dihapus']);
    }else{
        return response()->json(['code'=>0, 'status' => 'GAGAL', 'message' => 'Data Contact Gagal Dihapus']);
    }
}
}
