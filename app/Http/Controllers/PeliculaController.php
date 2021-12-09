<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class PeliculaController
 * @package App\Http\Controllers
 */
class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas = Pelicula::paginate(6);

        return view('pelicula.index', compact('peliculas'))
            ->with('i', (request()->input('page', 1) - 1) * $peliculas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelicula = new Pelicula();
        $categoria = Categoria::pluck('nombre', 'id');
        return view('pelicula.create', compact('pelicula','categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = request()->validate(Pelicula::$rules);
        if ($request->hasFile('imagen')){
            $datos['imagen']=$request->file('imagen')->store('uploads','public');
        }
        $pelicula = Pelicula::create($datos);

        return redirect()->route('peliculas.index')
            ->with('success', 'Pelicula Creada con Exito!.');
        /*
        request()->validate(Pelicula::$rules);

        $pelicula = Pelicula::create($request->all());

        return redirect()->route('peliculas.index')
            ->with('success', 'Pelicula created successfully.');
            */
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelicula = Pelicula::find($id);

        return view('pelicula.show', compact('pelicula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelicula = Pelicula::find($id);
        $categoria = Categoria::pluck('nombre', 'id');
        return view('pelicula.edit', compact('pelicula','categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pelicula $pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = request()->validate(Pelicula::$rules);

        if ($request->hasFile('imagen')){

            $ima = Pelicula::findOrFail($id);

            Storage::delete('public/'.$ima->imagen);

            $datos['imagen']=$request->file('imagen')->store('uploads','public');
        }

        Pelicula::where('id','=',$id)->update($datos);

        return redirect()->route('peliculas.index')
            ->with('success', 'Pelicula se Actualizo con Exito!');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ima = Pelicula::findOrFail($id);
        Storage::delete('public/'.$ima->imagen);
        $pelicula = Pelicula::find($id)->delete();
        
        return redirect()->route('peliculas.index')
            ->with('success', 'Pelicula se Elimino con Exito!');
    }
}
