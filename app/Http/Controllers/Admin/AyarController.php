<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Ayar;
use Session;
use Illuminate\Http\Request;

class AyarController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $ayarlar=Ayar::where('id', '=', 1)->first();
        return view('admin.settings_index')->withAyarlar($ayarlar);
    }
    public function update(Request $request){
        $this->validate($request,array(
            'temalar' => 'required',
            'twitter' => 'required',
            'github' => 'required',
            'linkedin' => 'required',
        ));
        $ayar=Ayar::find(1);
        $ayar->tema=$request->temalar;
        $ayar->twitter=$request->twitter;
        $ayar->github=$request->github;
        $ayar->linkedin=$request->linkedin;
        $ayar->save();
        Session::flash('success','Tema Güncellendi');
        //return redirect()->route('settings');
        return view('admin.settings_index')->withAyarlar($ayar);
    }
}