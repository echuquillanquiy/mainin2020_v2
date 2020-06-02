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
use App\Exports\CollaboratorsExport;
use App\Imports\CollaboratorsImport;
use Maatwebsite\Excel\Facades\Excel;
use Redirect,Response;

class CollaboratorController extends Controller
{
    public function importData()
    {
        return view('collaborators.importardata');
    }

    public function import(Request $request) 
    {
        $file = $request->file('file');
        Excel::import(new CollaboratorsImport, $file);        
        $notification = 'Los datos se subieron correctamente.';
        return redirect('/collaborators')->with(compact('notification'));
    }

    public function export() 
    {
        return Excel::download(new CollaboratorsExport, 'colaborador.xlsx');
    }

    public function index(Request $request)
    {
        $name = $request->get('name');
        $lastname = $request->get('lastname');
        $ndocument = $request->get('ndocument');

        $collaborators = Collaborator::orderBy('created_at', 'asc')
        ->name($name)
        ->lastname($lastname)
        ->ndocument($ndocument)
        ->paginate(25);
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
        $ubigeos = Ubigeo::all();
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
        $ubigeos = Ubigeo::all();
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
        $collaborator = Collaborator::findOrFail($id); 
        if($photo = Collaborator::setPhoto($request->photo_up, $collaborator->photo))
            $request->request->add(['photo' => $photo]);
        $data = $request->all();

        $collaborator->fill($data);
        $collaborator->save();
        $notification = 'El colaborador se ha registrado correctamente.';
        return redirect('/collaborators')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collaborator $collaborator)
    {
        $collaboratorName = $collaborator->name;
        $collaborator->delete();
        Storage::disk('public')->delete("collaborators/photo/$collaborator->photo");


        $notification = "El colaborador $collaboratorName se ha eliminado correctamente.";
        return redirect('/collaborators')->with(compact('notification'));
    }
}
