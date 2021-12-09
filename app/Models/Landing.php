<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Landing
 *
 * @property $id
 * @property $nombre
 * @property $correo
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Landing extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'correo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','correo'];



}
