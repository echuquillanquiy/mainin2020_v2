<?php

namespace App;

use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Collaborator extends Model
{
    protected $fillable = [

        'collaborators',
        'id',

        'user_id',
        'interviewer',

        'category',

        'amount',

        'area',

        'department_id',

        'province_id',

        'district_id',

        'ubigeo',


        'position',

        'company',

        'name',
        'document',
        'n_document',
        'date_of_birthday',
        'phone',
        'address',
        'date_medic_examen',
        'observations',
        'email',
        'respirator',
        'shoes',
        'size_shoe',
        'size_pant',
        'size_shirt',
        'height',
        'weight',
        'imc',
        'dx_nutrition',
        'sex',
        'blood_type',
        'civil_state',
        'n_sons',
        'emergency_phone',
        'contact',
        'home_time',
        'instruction',
        'especialty',
        'bancary_account',
        'bank',
        'medic_aptitud',
        'induction_date_start',
        'induction_date_end',
        'induction_place',
        'medic_center',
        'comments',
        'medium',
        'date_up_obs',
        'state',
        'photo'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class)->withDefault();
    }

    public function province()
    {
        return $this->belongsTo(Province::class)->withDefault();
    }

    public function district()
    {
        return $this->belongsTo(District::class)->withDefault();
    }

    public function ubigueo()
    {
        return $this->belongsTo(Ubigeo::class)->withDefault();
    }

    public static function setPhoto($photo, $actual = false)
    {
        if($photo)
        {
            if($actual)
            {
                Storage::disk('public')->delete("collaborators/photo/$actual");
            }
            $photoName = Str::random(20) . '.jpg';
            $image = Image::make($photo)->encode('jpg', 75);
            $image->resize(400, 300, function($constraint){
                $constraint->upsize();
            });
            Storage::disk('public')->put("collaborators/photo/$photoName", $image->stream());
            return $photoName;
        }else 
        {
            return false;
        }
    }
}
