<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use UxWeb\SweetAlert\SweetAlert;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies= Company::orderBy('id', 'asc')->paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function performValidationStore(Request $request)
    {
        $rules = [
            'name' => 'required|min:8',
            'address' => 'nullable|min:8',
            'ruc' => 'unique:companies|nullable|min:11',
            'contact_name' => 'nullable|min:5',
            'contact_phone' => 'nullable|min:9',
            'contact_email' => 'nullable|min:5|email',
            'contact_name2' => 'nullable|min:5',
            'contact_phone2' => 'nullable|min:9',
            'contact_email2' => 'nullable|min:5|email'
        ];

        $messages = [
            'name.required' => 'La razón social de la empresa es requerida.',
            'name.min' => 'La razón social de la empresa debe de tener mínimo 8 carácteres.',
            'address.min' => 'La dirección de la empresa debe de tener mínimo 8 carácteres.',
            'ruc.min' => 'El RUC debe tener minimo 11 carácteres',
            'ruc.unique' => 'Ya se tiene una empresa registrada con este ruc.',
            'contact_name.min' => 'El nombre del contacto debe tener mínimo 5 carácteres',
            'contact_phone.min' => 'El telefóno del contacto debe tener mínimo 9 carácteres',
            'contact_email.min' => 'El correo del contacto debe tener mínimo 5 carácteres',
            'contact_email.email' => 'Por favor sigue el formato de correo: example@empresa.com',
            'contact_name2.min' => 'El nombre del segundo contacto debe tener mínimo 5 carácteres',
            'contact_phone2.min' => 'El telefóno del segundo contacto debe tener mínimo 9 carácteres',
            'contact_email2.min' => 'El correo del segundo contacto debe tener mínimo 5 carácteres',
            'contact_email2.email' => 'Por favor sigue el formato de correo: example@empresa.com'
        ];

        $this->validate($request, $rules, $messages);
    }

    public function store(Request $request)
    {
        $this->performValidationStore($request);
        $companies = Company::create($request->all());

        $notification = 'La empresa fue creada correctamente.';
        return redirect('/companies/')->with(compact('notification')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Company::findOrFail($id);
        return view('companies.edit', compact('companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function performValidationEdit(Request $request)
    {
        $rules = [
            'name' => 'required|min:8',
            'address' => 'nullable|min:8',
            'ruc' => 'nullable|min:11',
            'contact_name' => 'nullable|min:5',
            'contact_phone' => 'nullable|min:9',
            'contact_email' => 'nullable|min:5|email',
            'contact_name2' => 'nullable|min:5',
            'contact_phone2' => 'nullable|min:9',
            'contact_email2' => 'nullable|min:5|email'
        ];

        $messages = [
            'name.required' => 'La razón social de la empresa es requerida.',
            'name.min' => 'La razón social de la empresa debe de tener mínimo 8 carácteres.',
            'address.min' => 'La dirección de la empresa debe de tener mínimo 8 carácteres.',
            'ruc.min' => 'El RUC debe tener minimo 11 carácteres',
            'ruc.unique' => 'Ya se tiene una empresa registrada con este ruc.',
            'contact_name.min' => 'El nombre del contacto debe tener mínimo 5 carácteres',
            'contact_phone.min' => 'El telefóno del contacto debe tener mínimo 9 carácteres',
            'contact_email.min' => 'El correo del contacto debe tener mínimo 5 carácteres',
            'contact_email.email' => 'Por favor sigue el formato de correo: example@empresa.com',
            'contact_name2.min' => 'El nombre del segundo contacto debe tener mínimo 5 carácteres',
            'contact_phone2.min' => 'El telefóno del segundo contacto debe tener mínimo 9 carácteres',
            'contact_email2.min' => 'El correo del segundo contacto debe tener mínimo 5 carácteres',
            'contact_email2.email' => 'Por favor sigue el formato de correo: example@empresa.com'
        ];

        $this->validate($request, $rules, $messages);
    }

    public function update(Request $request, $id)
    {
        $this->performValidationEdit($request);
        $company = Company::findOrFail($id);
        $data = $request->all();

        $company->fill($data);
        $company->save();

        $notification = 'La empresa se ha actualizado correctamente.';
        return redirect('/companies')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $companyName = $company->name;
        $company->delete();
        
        $notification = "La empresa $companyName se ha eliminado correctamente.";
        return redirect('/companies')->with(compact('notification'));
    }
}
