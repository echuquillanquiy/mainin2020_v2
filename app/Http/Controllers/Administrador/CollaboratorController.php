<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Collaborator;
use App\Department;
use App\Ubigeo;
use App\Category;
use App\Amount;
use App\Area;
use App\Position;
use App\Company;
use Illuminate\Support\Facades\Storage;

use Redirect,Response;

class CollaboratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collaborators = Collaborator::orderBy('name', 'asc')->paginate(25);
        return view('collaborators.index', compact('collaborators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $amounts = Amount::all();
        $areas = Area::all();
        $positions = Position::all();
        $companies = Company::all();
        $ubigeos = Ubigeo::select('ubigeo','distrito')->get();
        $departments = Department::all();
        return view('collaborators.create', compact('departments', 'ubigeos', 'categories', 'amounts', 'areas', 'positions', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($photo = Collaborator::setPhoto($request->photo_up))
            $request->request->add(['photo' => $photo]);
        $collaborator = Collaborator::create($request->all());
        $notification = 'El colaborador se ha registrado correctamente.';
        return redirect('/collaborators')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $collaborator = Collaborator::findOrFail($id);
        return view('collaborators.ver', compact('collaborator'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collaborators = Collaborator::findOrFail($id);
        $categories = Category::all();
        $amounts = Amount::all();
        $areas = Area::all();
        $positions = Position::all();
        $companies = Company::all();
        $ubigeos = Ubigeo::select('ubigeo','distrito')->get();
        $departments = Department::all();
        return view('collaborators.edit', compact('collaborators', 'departments', 'ubigeos', 'categories', 'amounts', 'areas', 'positions', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
