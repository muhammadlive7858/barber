<?php

namespace App\Http\Controllers;

use App\Models\Stil;
use Illuminate\Http\Request;

class StilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $still = Stil::all();
        return view('admin/stills/index',compact('still'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/stills/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'string|max:250|min:3',
            "desc"=>'string|min:10|max:250',
            'barber'=>'string|min:3|max:50',
            'price'=>'string|max:20',
            'image'=>'file|mimes:jpg,jpeg,png,svg'
        ]);
       
        // dd($request->file('image'));
        $uploaded = $request->file('image');
        if($uploaded){
            $uploaded = $request->file('image');
            if($uploaded){
            $tmp_name = $request->file('image')->getClientOriginalExtension();
            
            $new_name = rand(100,999).time().'image.'.$tmp_name;
            //dd($new_name);
    
                
            $move = $uploaded->move(public_path('images/uploaded-image/'),$new_name);
            //dd($move);
    
            $baza_name = "images/uploaded-image/".$new_name;
            //dd($baza_name);
        if($move){
            $store = Stil::create([
                'id'=>$request->id,
                'name'=>$request->name,
                'desc'=>$request->desc,
                'price'=>$request->price,
                'image'=>$baza_name
            ]);    
            //dd($store);
            if($store){
                return redirect()->route('admin.stills.index');
            }
            return redirect()->back();
                 
            }
        }
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stil  $stil
     * @return \Illuminate\Http\Response
     */
    public function show(Stil $stil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stil  $stil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $still = Stil::all()->where('id',$id);
        return view('admin/stills/edit',compact('still'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stil  $stil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // validation
        $request->validate([
            'name'=>'string|max:250|min:3',
            "desc"=>'string|min:10|max:250',
            'price'=>'string|max:20',
            'image'=>'file|mimes:jpg,jpeg,png,svg'
        ]);
        $uploaded = $request->file('image');
        if($uploaded){
            $uploaded = $request->file('image');
            if($uploaded){
            $tmp_name = $request->file('image')->getClientOriginalExtension();
            
            $new_name = rand(100,999).time().'image.'.$tmp_name;
            //dd($new_name);
    
                
            $move = $uploaded->move(public_path('images/uploaded-image/'),$new_name);
            //dd($move);
    
            $baza_name = "images/uploaded-image/".$new_name;
        $update = Stil::find($id);
        $update = $update->update(request([
            'id'=>$request->id,
            'name'=>$request->name,
            'desc'=>$request->desc,
            'price'=>$request->price,
            'image'=>$baza_name
        ]));
        if($update){
            return redirect()->route('admin.stills.index');
        }
        return  redirect()->back();
        }
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stil  $stil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $still = Stil::findorFail($id);
        $still->delete();
        return redirect()->back();
    }
}
