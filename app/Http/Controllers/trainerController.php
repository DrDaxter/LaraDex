<?php

namespace LaraDex\Http\Controllers;

use LaraDex\trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use LaraDex\Http\Requests\TrainerRequest;

class trainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->AuthorizeRoles('admin');
        $trainers = trainer::all();

        return view('trainers.index',compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trainers.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrainerRequest $request)
    {
        $trainers = new trainer();//una instancia al modelo

        //verificamos que el input file no este vacio
        $avatar_name;
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');//lo guardamos en una variable
            // guardamos su nombre y le concatenamos la fecha actual para que  no se den problemas de nombres repetidos
            $avatar_name = time().$file->getClientOriginalName();
            //creamos una carpeta y guardamos nuestro avatar
            $file->move(public_path().'/images/',$avatar_name);
        }
        
        //guaradmos el nombre en una variable
        $trainers->name = $request->input('name');
        $trainers->last_name = $request->input('last_name');
        $trainers->description = $request->input('description');
        //asignamos el avatar a nuestro trainer
        $trainers->avatar = $avatar_name;
        //generamos el slug automaticamente
        $trainers->slug = Str::slug($request->input('name').time()); 
        $trainers->save();//guardamos
        return redirect()->route('trainer.index')->with('status','Character saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(trainer $trainer)
    {
        //$trainer = trainer::where('slug','=',$slug)->firstOrFail();
        return view('trainers.show', compact('trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(trainer $trainer)
    {
        return view('trainers.edit', compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, trainer $trainer)
    {
        $trainer->fill($request->except('avatar'));
        //verificamos que el input file no este vacio
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');//lo guardamos en una variable
            // guardamos su nombre y le concatenamos la fecha actual para que  no se den problemas de nombres repetidos
            $avatar_name = time().$file->getClientOriginalName();
            $trainer->avatar = $avatar_name;
            //creamos una carpeta y guardamos nuestro avatar
            $file->move(public_path().'/images/',$avatar_name);
        }
        $trainer->save();
        return redirect()->route('trainer.index',[$trainer])->with('status','Changes completed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(trainer $trainer)
    {
        $avatar_location = public_path().'/images/'.$trainer->avatar;
        \File::delete($avatar_location);
        $trainer->delete();
        return redirect()->route('trainer.index')->with('status','Character deleted successfully!');
    }
}
