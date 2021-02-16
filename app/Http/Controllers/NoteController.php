<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Driver\Selector;

class NoteController extends Controller
{
    public function index(){
        return view('mostrar');
    }
    
    public function read(){
        $notas = DB::select('Select * from notes');       
        return response()->json($notas, 200);   
    }

    public function crear(Request $request){
        $datos=$request->except('_token', 'Crear');
        //return $datos['nombre'];
        DB::table('notes')->insertGetId(['title'=>$datos['title'],'description'=>$datos['description']]);
        // $listaNotas = DB::table('notes')->get();
        return response()->json(array('resultado'=>'OK'), 200);
    }

    public function eliminar(Request $request){
        try{
            $id=$request->input('id');
            // DB::delete('DELETE FROM tbl_restaurantes WHERE id=?',[$request->input('id')]);
            DB::table('notes')->where('id','=',$id)->delete();
            return response()->json(array('resultado'=>'OK'),200);
        }catch(\Throwable $th){
            return response()->json(array('resultado'=>'NOK'.$th->getMessage()),200);
        } 
    }

    public function updateNota(Request $request){
        try {
            DB::update('update notes set title=?, description=? where id=?',[$request->input('title'),$request->input('description'),$request->input('id')]);
            return response()->json(array('resultado'=>'OK'), 200);
        } catch (\Throwable $th) {
            return response()->json(array('resultado'=>'NOK'.$th->getMessage()), 200);
        }
    }
}
