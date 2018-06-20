<?php

namespace App\Models;

use App\Utils;
use App\Traits\Eloquent\OrderableTrait;
use App\Traits\Eloquent\SearchLikeTrait;
use App\Traits\Models\FillableFields;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CardClass extends Authenticatable
{
    use Notifiable, FillableFields, OrderableTrait, SearchLikeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * @return string
     */
    public function getLogoPath()
    {
        return Utils::logoPath($this->logo_number);
    }

    /**
     * @return mixed
     */
    public function getRecordTitle()
    {
        return $this->name;
    }

    public function card()
    {
        return $this->belongsTo('App\Models\Card');
    }
}
