<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use Redirect;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $work = Work::all();
        return view('admin/works/index',compact('work'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('admin/works/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // validation
        $request->validate([
            'name'=>'string|max:250|min:3',
            "desc"=>'string|min:10|max:250',
            'barber'=>'string|min:3|max:50',
            //'image'=>'file|mimes:jpg,jpeg,png,svg'
        ]);
       
        // dd($request->file('image'));
        $uploaded = $request->file('image');
        if($uploaded){
        $tmp_name = $request->file('image')->getClientOriginalExtension();
        
        $new_name = rand(100,999).time().'image.'.$tmp_name;
        //dd($new_name);

            
        $move = $uploaded->move(public_path('/images/uploaded-image'),$new_name);
        //dd($move);

        $baza_name = "images/uploaded-image/".$new_name;
        //dd($baza_name);
        if($move){
            $store = Work::create([
                'id'=>$request->id,
                'name'=>$request->name,
                'desc'=>$request->desc,
                'barber'=>$request->barber,
                'image'=>$baza_name
            ]);    
            //dd($store);
            if($store){
                return redirect()->route('admin.works.index');
            }
            return redirect()->back();
                 
        }
    }
    }
    


    public function edit($id)
    {
        $work = Work::all()->where('id',$id);
        return view('admin/works/edit',compact('work'));
    }
    

    public function update(Request $request,$id)
    {   
        // validation
        $request->validate([
            'name'=>'string|max:250|min:3',
            "desc"=>'string|min:10|max:250',
            'barber'=>'string|min:3|max:50',
            'image'=>'file|mimes:jpg,jpeg,png,svg'
        ]);
        // dd($request->file('image'));
        $uploaded = $request->file('image');
        if($uploaded){
        $tmp_name = $request->file('image')->getClientOriginalExtension();
        
        $new_name = rand(100,999).time().'image.'.$tmp_name;
        //dd($new_name);

            
        $move = $uploaded->move(public_path('/images/uploaded-image'),$new_name);
        //dd($move);

        $baza_name = "images/uploaded-image/".$new_name;
        //dd($baza_name);
            $update = Work::find($id);
            $update = $update->update([
                'id'=>$request->id,
                'name'=>$request->name,
                'desc'=>$request->desc,
                'barber'=>$request->barber,
                'image'=>$baza_name
            ]);
            if($update){
                return redirect()->route('admin.works.index');
            }
            return  redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $work = Work::findorFail($id);
        $work->delete();
        return redirect()->back();
    }
}
