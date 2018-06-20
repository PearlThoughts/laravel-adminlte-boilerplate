<?php

namespace App\Models;

use App\Utils;
use App\Traits\Eloquent\OrderableTrait;
use App\Traits\Eloquent\SearchLikeTrait;
use App\Traits\Models\FillableFields;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Card extends Authenticatable
{
    use Notifiable, FillableFields, OrderableTrait, SearchLikeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
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
    public function getLabels()
    {
        $labels = [];
        foreach($this->labels as $label) {
            $labels[] = $label->name;
        }
        $names = [];
        return implode(",", $labels);
    }
    public function brand()
    {
        return $this->hasOne('App\Models\CardBrand');
    }
    public function class()
    {
        return $this->hasOne('App\Models\CardClass');
    }
    public function answer()
    {
        return $this->hasOne('App\Models\CardAnswer');
    }
    public function labels()
    {
        return $this->belongsToMany('App\Models\Label', 'card_labels', 'card_id', 'label_id');
    }
}
