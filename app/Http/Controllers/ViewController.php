<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
/**
 * Class PageController
 *
 * @package App\Http\Controllers
 */
class ViewController extends Controller
{
    public function ShowHalaman(Request $request )
    {
        if ($request->ajax()) {
            return view('view', ['desa' => $request])->render();
        }

        return view('view');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tgl'    => 'required',
            'telp' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'jk' => 'required',
        ]);

        $nama = $request->input('nama');
        $tgl = $request->input('tgl');
        $telp = $request->input('telp');
        $email = $request->input('email');
        $alamat = $request->input('alamat');
        $jk = $request->input('jk');

        $namaFile = $nama."-".date("YmdHis");

        $fp = fopen("D:\\".$namaFile.".txt","a");
        $data = $nama.','.$email.','.$tgl.','.$telp.','.$jk.','.$alamat. "\r\n";
        fwrite($fp, $data);
        fclose($fp);
        echo "Terima Kasih  Telah Mengisi Form";
    }

    public function detail($namaFile)
    {
        $content = file_get_contents("D:\\".$namaFile.".txt");
        $str_arr = explode (",", $content);
        
        //print_r($str_arr);
        return view('view', ['nama' => $str_arr[0], 'email' => $str_arr[1], 'tgl' => $str_arr[2], 'telp' => $str_arr[3],  'jk' => $str_arr[4], 'alamat' => $str_arr[5]]);
    }
}