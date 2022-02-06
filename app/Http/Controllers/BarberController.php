<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use Illuminate\Http\Request;

class BarberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barbers = Barber::all();
        return view('admin/barbers/index',compact('barbers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/barbers/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name'=>'string|max:250|min:3',
        //     "desc"=>'string|min:10|max:250',
        //     'image'=>'file|mimes:jpg,jpeg,png,svg'
        // ]);
       
        // dd($request->file('image'));
        $uploaded = $request->file('image');
        if($uploaded){
        $tmp_name = $request->file('image')->getClientOriginalExtension();
        
        $new_name = rand(100,999).time().'_image.'.$tmp_name;
        //dd($new_name);

            
        $move = $uploaded->move(public_path('images\uploaded-image'),$new_name);
        //dd($move);

        $baza_name ="images/uploaded-image/".$new_name;
        // dd($baza_name);
        if($move){
            $store = Barber::create([
                'id'=>$request->id,
                'name'=>$request->name,
                'desc'=>$request->desc,
                'image'=>$baza_name
            ]);    
            //dd($store);
            if($store){
                return redirect()->route('admin.barbers.index');
            }
            return redirect()->back();
                 
        }
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barber  $barber
     * @return \Illuminate\Http\Response
     */
    public function show(Barber $barber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barber  $barber
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barbers = Barber::all()->where('id',$id);
        // dd($barbers);
        return view('admin/barbers/edit',compact('barbers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barber  $barber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // validation
        $request->validate([
            'name'=>'string|max:250|min:3',
            "desc"=>'string|min:10|max:250',
            'image'=>'file|mimes:jpg,jpeg,png,svg'
        ]);
        $uploaded = $request->file('image');
        if($uploaded){
        $tmp_name = $request->file('image')->getClientOriginalExtension();
        
        $new_name = rand(100,999).time().'image.'.$tmp_name;
        //dd($new_name);

            
        $move = $uploaded->move(public_path('images\uploaded-image'),$new_name);
        //dd($move);
        if($move){
            $baza_name ="images/uploaded-image/".$new_name;
            $update = Barber::find($id);
            $update = $update->update([
                'name'=>$request->name,
                'desc'=>$request->desc,
                'image'=>$baza_name
            ]);
        if($update){
            return redirect()->route('admin.barbers.index');
        }
        return  redirect()->back();
        }
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barber  $barber
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $work = Barber::findorFail($id);
        $work->delete();
        return redirect()->back();
    }
}
