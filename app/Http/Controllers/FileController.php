<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FileController extends Controller
{
    function fileView(){
        return view('file');
    }

    function store(Request $request)
    {

        // dd($request->all());
        // $request->validate([
        //     'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        // ]);
      

        $fileName = time().'.'.$request->file->extension();  
        $request->file->move(public_path('uploads'), $fileName);

        
        // return view('result');
        return back()
            ->with('success','You have successfully upload file.')
            ->with('file', $fileName);
   
    }
    function api(){
        // GET METHOD
        // $response = Http::get('https://fakestoreapi.com/products/1');
        // $data = $response->object();
        // dd($data);

        // POST METHOD
        $response = Http::post('https://fakestoreapi.com/products', [
            'title' => 'test product',
            "price"=> "13.5",
            "description"=> "lorem ipsum set",
            "image"=> "https://i.pravatar.cc",
            "category"=> "electronic"
        ]);

        $data = $response->object();
        dd($data);
    }


    function xmlToArray($xmlString)
    {
        $xmlObject = simplexml_load_string($xmlString, 'SimpleXMLElement', LIBXML_NOCDATA);
        $jsonString = json_encode($xmlObject, JSON_PRETTY_PRINT);

        if ($jsonString === false) {
            // Handle JSON encoding error
            throw new \RuntimeException('Error converting XML to JSON: ' . json_last_error_msg());
        }

        return $jsonString;
    }


    function test(){
        // xml file path 
        $path = base_path('public/uploads/test.xml');
        // dd($path);

        // $path = "/uploads/test.xml"; 
        
        // Read entire file into string 
        $xmlfile = file_get_contents($path); 
        
        // Convert xml string into an object 
        $new = simplexml_load_string($xmlfile); 
        
        // Convert into json 
        $con = json_encode($new); 
        // print_r($con);
        
        // Convert into associative array 
        $newArr = json_decode($con, true);
        dd($newArr); 
        // $employess = $newArr['Companies']['Company']['Employees']['Employee'][0]['Enrollments']['Enrollment'];
        dd($employess);  
    }
}
