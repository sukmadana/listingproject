<?php

namespace App\Http\Controllers;

use App\Model\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        return view('admin.sales.list',['sales' => Sales::with('sales_category')->paginate(10)]);
    }

    public function show($id)
    {
        $sales = Sales::with('sales_category')->first();
        return response()->json($sales);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'id_sales_category' => 'required',
            'nik'               => 'required|max:20',
            'no_kk'             => 'required|max:20',
            'nama'              => 'required|max:150',
            'tempat_lahir'      => 'required|max:190',
            'tgl_lahir'         => 'required',
            'genre'             => 'required|max:20',
            'alamat'            => 'required|max:400',
            'alamat_tinggal'    => 'required|max:500',
            'rt_rw'             => 'required|max:50',
            'kel_desa'          => 'required|max:50',
            'kecamatan'         => 'required|max:100',
            'kabupaten'         => 'required|max:100',
            'propinsi'          => 'required|max:100',
            'negara'            => 'required|max:100',
            'agama'             => 'required|max:190',
            'pekerjaan'         => 'required|max:190',
            'phone'             => 'required|max:15',
            'alt_phone'         => 'max:15',
            'file_ktp'          => 'required',
        ]);
        
        $data = $request->all();
        if($request->hasFile('file_ktp')){
            $file = $request->file('file_ktp');
            $fileName = time().'-'.$file->getClientOriginalName();
            $file->move('uploads/sales',$fileName);
            $sales = Sales::create([
                'id_sales_category' => $data['id_sales_category'],
                'id_sales'          => $this->acak(6),
                'nik'               => $data['nik'],
                'no_kk'             => $data['no_kk'],
                'nama'              => $data['nama'],
                'tempat_lahir'      => $data['tempat_lahir'],
                'tgl_lahir'         => $data['tgl_lahir'],
                'genre'             => $data['genre'],
                'alamat'            => $data['alamat'],
                'alamat_tinggal'    => $data['alamat_tinggal'],
                'rt_rw'             => $data['rt_rw'],
                'kel_desa'          => $data['kel_desa'],
                'kecamatan'         => $data['kecamatan'],
                'kabupaten'         => $data['kabupaten'],
                'propinsi'          => $data['propinsi'],
                'negara'            => $data['negara'],
                'agama'             => $data['agama'],
                'pekerjaan'         => $data['pekerjaan'],
                'phone'             => $data['phone'],
                'alt_phone'         => $data['alt_phone'],
                'file_ktp'          => $fileName,
                'status'            => 'aktive',
            ]);
    
            return response()->json([
                'message' => 'New sales created succesfully',
                'sales' => $sales
            ]);
        }else{
            return response()->json('ERROR CREATE DATA!!');
        }

        
    }

    public function edit($id)
    {
        $sales = Sales::find($id);
        return response()->json($sales);
    }

    public function update(Request $request, $id)
    {
        
        $this->validate($request,[
            'id_sales_category' => 'required',
            'nik'               => 'required|max:20',
            'no_kk'             => 'required|max:20',
            'nama'              => 'required|max:150',
            'tempat_lahir'      => 'required|max:190',
            'tgl_lahir'         => 'required',
            'genre'             => 'required|max:20',
            'alamat'            => 'required|max:400',
            'alamat_tinggal'    => 'required|max:500',
            'rt_rw'             => 'required|max:50',
            'kel_desa'          => 'required|max:50',
            'kecamatan'         => 'required|max:100',
            'kabupaten'         => 'required|max:100',
            'propinsi'          => 'required|max:100',
            'negara'            => 'required|max:100',
            'agama'             => 'required|max:190',
            'pekerjaan'         => 'required|max:190',
            'phone'             => 'required|max:15',
            'alt_phone'         => 'max:15',
        ]);
        $sales = Sales::find($id);
        $data = $request->all();
        if($request->hasFile('file_ktp')){
            $file = $request->file('file_ktp');
            $fileName = time().'-'.$file->getClientOriginalName();
            $file->move('uploads/sales',$fileName);
            //$data['file_ktp'] = $fileName;
            $sales->update([
                'id_sales_category' => $data['id_sales_category'],
                    'nik'               => $data['nik'],
                    'no_kk'             => $data['no_kk'],
                    'nama'              => $data['nama'],
                    'tempat_lahir'      => $data['tempat_lahir'],
                    'tgl_lahir'         => $data['tgl_lahir'],
                    'genre'             => $data['genre'],
                    'alamat'            => $data['alamat'],
                    'alamat_tinggal'    => $data['alamat_tinggal'],
                    'rt_rw'             => $data['rt_rw'],
                    'kel_desa'          => $data['kel_desa'],
                    'kecamatan'         => $data['kecamatan'],
                    'kabupaten'         => $data['kabupaten'],
                    'propinsi'          => $data['propinsi'],
                    'negara'            => $data['negara'],
                    'agama'             => $data['agama'],
                    'pekerjaan'         => $data['pekerjaan'],
                    'phone'             => $data['phone'],
                    'alt_phone'         => $data['alt_phone'],
                    'file_ktp'          => $fileName,
                    
            ]);
        }else{
            $sales->update([
                'id_sales_category' => $data['id_sales_category'],
                    'nik'               => $data['nik'],
                    'no_kk'             => $data['no_kk'],
                    'nama'              => $data['nama'],
                    'tempat_lahir'      => $data['tempat_lahir'],
                    'tgl_lahir'         => $data['tgl_lahir'],
                    'genre'             => $data['genre'],
                    'alamat'            => $data['alamat'],
                    'alamat_tinggal'    => $data['alamat_tinggal'],
                    'rt_rw'             => $data['rt_rw'],
                    'kel_desa'          => $data['kel_desa'],
                    'kecamatan'         => $data['kecamatan'],
                    'kabupaten'         => $data['kabupaten'],
                    'propinsi'          => $data['propinsi'],
                    'negara'            => $data['negara'],
                    'agama'             => $data['agama'],
                    'pekerjaan'         => $data['pekerjaan'],
                    'phone'             => $data['phone'],
                    'alt_phone'         => $data['alt_phone'],
                    
            ]);
        }

        
        
        return response()->json([
            'message' => 'Data will be updated succesfully',
            'sales' => $sales
        ]);
    }

    public function destroy($id)
    {
        $sales = Sales::find($id);      
        $sales->delete();
        return response()->json([
            'message' => 'Data will be deleted succesfully.'
        ]);
    }

    private function acak($panjang)
    {
        $karakter= '0123456789';
        $string = '';
        for ($i = 0; $i < $panjang; $i++) {
      $pos = rand(0, strlen($karakter)-1);
      $string .= $karakter{$pos};
        }
        return $string;
    }
}
