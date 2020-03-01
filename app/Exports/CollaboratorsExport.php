<?php

namespace App\Exports;

use App\Collaborator;
use Maatwebsite\Excel\Concerns\FromCollection;

class CollaboratorsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Collaborator::all();
    }
}
