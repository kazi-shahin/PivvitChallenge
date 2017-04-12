<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offering extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'offering';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Set the primary property
     */
    protected $primaryKey = 'id';
}