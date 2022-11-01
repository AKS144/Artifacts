<?php

namespace App\Http\Controllers\form_layouts;


use App\Models\Artifact;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ArtifactsController extends Controller
{
    public function index()
    {
        $artifacts = Artifact::all();
        return view('content.form-layout.artifactsindex',compact('artifacts'));

        // $category = Category::pluck('name','id');
        // return view('content.form-layout.artifacts',compact('category'));
        //return view('content.form-layout.artifacts');

    }

    public function create()
    {
        $category = Category::pluck('cat_name','id'); //dd($category);
        return view('content.form-layout.artifacts',compact('category'));
        // return view('content.form-layout.form-layouts-vertical');
    }

    public function store(Request $request)
    {
        $artifact                =   new Artifact();
        $artifact->name          =   $request->name;
        $artifact->donor         =   $request->donor;
        $artifact->description   =   $request->description;
        $artifact->category_id   =   $request->category_id;
        $artifact->artifacts_sno =   $request->artifacts_sno;
        $artifact->qrcode        =   'null';
        //$artifact->qrcode        =   QrCode::size(100)->generate($request->name);  
        //dd($artifact);
        $artifact->save();
    }

    public function show($id)
    {
        $artifacts = Artifact::find($id);
        return view('content.form-layout.artifactshow',compact('artifacts'));
    }


    public function edit($id)
    {
        $category = Category::pluck('cat_name','id'); //dd($category);
        $artifacts = Artifact::find($id);
        return view('content.form-layout.artifactsedit',compact('category','artifacts'));
    }


    public function update()
    {

    }


    public function destroy()
    {

    }

    public function selectlanguage(Request $request)
    {
        $artid = $request->artId;
        $language = $request->language;
        $des = Language::where('artifacts_id',$artid)
                        ->where('language',$language)
                        ->get();


        foreach($des as $des)
        {
            //echo "Description ".$des->description;            
            return  $des->description;    
        }
        
    }
    

    public function select()
    {
        return view('ccavenue');
    }

}
