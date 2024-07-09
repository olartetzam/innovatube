<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use App\Models\Favorito;

class Home extends Controller
{
    public function index(){
        $user = auth()->user();
        return view('dashboard')->with('user',$user);
    }

    public function favoritos(){
        return view('favoritos');
    }

    public function todos_favoritos(Request $request){
        $favoritos = Favorito::where('user_id',2)->get();
        Log::info($favoritos);
        return $favoritos;
    }

    public function add_favorito(Request $request){
        // $user = auth()->user()->id;
        $user = Auth::user()->id;
        // dd($request);
        try {
            DB::beginTransaction();
            $favorito = new Favorito;
            $favorito->user_id = $user;
            $favorito->video_id = $request->video;
            $favorito->save();
            DB::commit();
            return $request;
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e);
        }
    }

    public function delete_favorito(Request $request){
        $user = Auth::user()->id;
        $favorito = Favorito::where('user_id',$user)->where('video_id',$request->video)->first();
        if ($favorito) {
            try {
                DB::beginTransaction();
                $favorito->delete();
                DB::commit();
                return $request;
            } catch (Exception $e) {
                DB::rollBack();
                Log::info($e);
            }
        }
    }
}
