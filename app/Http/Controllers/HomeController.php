<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Record;
use App\Http\Requests\RecordRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $logged_user = auth()->user();
        $records = Record::where('user_id',$logged_user->id)->latest()->get();
        $cali = 0;
        $buenDiaInp = 0;
        $buenDiaInpN = 0;
        $buenDiaVal = "";
    
        $felizInp = 0;
        $felizInpN = 0;
        $felizVal = "";
    
        
        foreach($records as $record){
            $cali += $record->calificacion;
            
            $buenDiaVal = substr($record->preguntas, -1, 1);
            echo "<script>console.log('Debug Objects: " . $buenDiaVal . "' );</script>";
            if(strval($buenDiaVal) == "1"){
                $buenDiaInp+=1;
                
            }
            else if(strval($buenDiaVal) == "0"){
                $buenDiaInpN+=1;
                
            }
            $felizVal = substr($record->preguntas, -3, 1);
            echo "<script>console.log('Debug Objects: " . $felizVal . "' );</script>";
            if(strval($felizVal) == "1"){
                $felizInp+=1;
                
            }
            else if(strval($felizVal) == "0"){
                $felizInpN+=1;
                
            }
        }
        $buenDia = "[". $buenDiaInp . "," . $buenDiaInpN . "]";
        $feliz = "[". $felizInp . "," . $felizInpN . "]";
        $cali/= count($records);
        $cali*=10;
        return view('home', compact('records','cali','buenDia','feliz'));
    }
}
