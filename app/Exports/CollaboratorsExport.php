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
            'instruction',
            'phone',
            'address',
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
            $collaborator->instruction,
            $collaborator->phone,
            $collaborator->address,
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
            'interviewer',
            'document',
            'n_document',
            'name',
            'instruction',
            'phone',
            'address',
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
        ];
    }
}
