<?php

namespace App\Http\Controllers;

use App\Models\Landing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class LandingController
 * @package App\Http\Controllers
 */
class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $landings = Landing::paginate();

        return view('landing.index', compact('landings'))
            ->with('i', (request()->input('page', 1) - 1) * $landings->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $landing = new Landing();
        return view('landing.create', compact('landing'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Landing::$rules);

        $landing = Landing::create($request->all());

        if(Auth::check()){
            return redirect()->route('landings.index')
            ->with('success', 'Landing created successfully.');
        }
        else{
            return view('/landing');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $landing = Landing::find($id);

        return view('landing.show', compact('landing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $landing = Landing::find($id);

        return view('landing.edit', compact('landing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Landing $landing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Landing $landing)
    {
        request()->validate(Landing::$rules);

        $landing->update($request->all());

        return redirect()->route('landings.index')
            ->with('success', 'Landing updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $landing = Landing::find($id)->delete();

        return redirect()->route('landings.index')
            ->with('success', 'Landing deleted successfully');
    }
}
