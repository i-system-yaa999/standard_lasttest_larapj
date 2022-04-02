<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $guarded = ['id'];

    protected $fillable = [
        'fullname',
        'gender',
        'email',
        'postcode',
        'address',
        'building_name',
        'opinion',
    ];
    // public static $rules = array(
    //     'fullname' => 'required',
    //     'gender' => 'required|digits_between:1,2',
    //     'email' => 'required|email',
    //     'postcode' => ['required', new PostCodeRule()],
    //     'address' => 'required',
    //     'building_name' => 'present',
    //     'opinion' => 'required|max:120',
    // );
}
