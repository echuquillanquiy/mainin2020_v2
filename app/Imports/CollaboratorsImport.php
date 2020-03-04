<?php

namespace App\Imports;
use App\Collaborator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class CollaboratorsImport implements ToModel, WithHeadingRow
{
    /**
    * param array $row
    *
    * return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Collaborator ([
            'interviewer'       => $row['entrevistador'],
            'document'          => $row['tipo_doc'],
            'n_document'        => $row['n_documento'],
            'name'              => $row['nombres_apellidos'],
            'instruction'       => $row['grado_instruccion'],
            'phone'             => $row['n_celular'],
            'address'           => $row['direccion'],
            'email'             => $row['correo_electronico'],
            'sex'               => $row['sexo'],
            'civil_state'       => $row['estado_civil'],
            'blood_type'        => $row['tipo_sangre'],
            'n_sons'            => $row['n_hijos'],
            'contact'           => $row['nombre_contacto'],
            'emergency_phone'   => $row['celular_contacto'],
            'home_time'         => $row['tiempo_vivienda'],
            'bank'              => $row['banco'],
            'bancary_account'   => $row['n_cuenta'],
            'category'          => $row['categoria'],
            'amount'            => $row['monto'],
            'area'              => $row['area'],
            'position'          => $row['puesto'],
            'company'           => $row['empresa'],
            'respirator'        => $row['respirador'],
            'shoes'             => $row['zapatos'],
            'size_shoe'         => $row['talla_zapato'],
            'size_pant'         => $row['talla_pantalon'],
            'size_shirt'        => $row['talla_camisa'],
            'height'            => $row['talla'],
            'weight'            => $row['peso'],
            'imc'               => $row['imc'],
            'dx_nutrition'      => $row['dx_nutricion'],
            'especialty'        => $row['especialidad'],
            'induction_place'   => $row['lugar_induccion'],
            'medic_center'      => $row['centro_medico'],
            'medic_aptitud'     => $row['aptitud_medica'],
            'medium'            => $row['medio_entrevista'],
            'observations'      => $row['observaciones'],
            'comments'          => $row['comentarios'],
            'state'             => $row['estado'],
        ]);
    }
}
