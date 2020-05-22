<?php

namespace App\Exports;

use App\Collaborator;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CollaboratorsExport implements FromQuery, WithMapping, WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Collaborator::select(
            'interviewer',
            'document',
            'n_document',
            'name',
            'last_name',
            'instruction',
            'phone',
            'address',
            'department_id',
            'province_id',
            'district_id',
            'departamento',
            'provincia',
            'distrito',
            'ubigeo_cod',
            'email',
            'sex',
            'civil_state',
            'blood_type',
            'n_sons',
            'contact',
            'emergency_phone',
            'home_time',
            'bank',
            'bancary_account',
            'category',
            'amount',
            'area',
            'position',
            'company',
            'respirator',
            'shoes',
            'size_shoe',
            'size_pant',
            'size_shirt',
            'height',
            'weight',
            'imc',
            'dx_nutrition',
            'especialty',
            'induction_place',
            'medic_center',
            'medic_aptitud',
            'medium',
            'observations',
            'comments',
            'state'
        );
    }

    public function map($collaborator): array
    {
        return [
            $collaborator->interviewer,
            $collaborator->document,
            $collaborator->n_document,
            $collaborator->name,
            $collaborator->last_name,
            $collaborator->instruction,
            $collaborator->phone,
            $collaborator->address,
            $collaborator->department->name,
            $collaborator->province->name,
            $collaborator->district->name,
            $collaborator->departamento,
            $collaborator->provincia,
            $collaborator->distrito,
            $collaborator->ubigeo_cod,
            $collaborator->email,
            $collaborator->sex,
            $collaborator->civil_state,
            $collaborator->blood_type,
            $collaborator->n_sons,
            $collaborator->contact,
            $collaborator->emergency_phone,
            $collaborator->home_time,
            $collaborator->bank,
            $collaborator->bancary_account,
            $collaborator->category,
            $collaborator->amount,
            $collaborator->area,
            $collaborator->position,
            $collaborator->company,
            $collaborator->respirator,
            $collaborator->shoes,
            $collaborator->size_shoe,
            $collaborator->size_pant,
            $collaborator->size_shirt,
            $collaborator->height,
            $collaborator->weight,
            $collaborator->imc,
            $collaborator->dx_nutrition,
            $collaborator->especialty,
            $collaborator->induction_place,
            $collaborator->medic_center,
            $collaborator->medic_aptitud,
            $collaborator->medium,
            $collaborator->observations,
            $collaborator->comments,
            $collaborator->state
        ];
    }

    public function headings(): array
    {
        return [
            'ENTREVISTADOR',
            'TIPO DE DOCUMENTO',
            'N° DE DOCUMENTO',
            'NOMBRES',
            'APELLIDOS',
            'GRADO DE INSTRUCCION',
            'TELEFONO / CELULAR',
            'DIRECCIÓN',
            'DEPARTAMENTO',
            'PROVINCIA',
            'DISTRITO',
            'DEPARTAMENTO INICIAL',
            'PROVINCIA INICIAL',
            'DISTRITO INICIAL',
            'UBIGEO',
            'CORREO ELECTRONICO',
            'SEXO',
            'ESTADO CIVIL',
            'TIPO DE SANGRE',
            'N° DE HIJOS',
            'NOMBRE CONTACTO EMERGENCIA',
            'TELEFONO DE EMERGENCIA',
            'TIEMPO EN CASA',
            'BANCO',
            'N° CUENTA BANCARIA',
            'CATEGORIA',
            'MONTO',
            'AREA',
            'PUESTO',
            'EMPRESA',
            'RESPIRADOR',
            'ZAPATOS',
            'TALLA DE ZAPATO',
            'TALLA DE PANTALON',
            'TALLA DE CAMISA',
            'TALLA',
            'PESO',
            'IMC',
            'DX NUTRICION',
            'ESPECIALIDAD',
            'LUGAR DE INDUCCION',
            'CENTRO MEDICO',
            'APTITUD MEDICA',
            'DONDE SE ENTERO DE LA ENTREVISTA',
            'OBSERVACIONES',
            'COMENTARIOS',
            'ESTADO'
        ];
    }
}
