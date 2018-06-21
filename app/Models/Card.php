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
    const DISPLAY_TYPE_MEDICINE = 1;
    const DISPLAY_TYPE_DRUG = 2;

    const CARD_TYPE_DISPLAY = 1;
    const CARD_TYPE_INPUT = 2;
    const CARD_TYPE_USED_ADDED = 3;

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
        return implode(",", $labels);
    }
    public function getTags()
    {
        $tags = [];
        foreach($this->tags as $tag) {
            $tags[] = $tag->name;
        }
        return implode(",", $tags);
    }
    public function getCardType()
    {
        $cardType = null;
		switch($this->card_type) {
			case self::CARD_TYPE_DISPLAY:
				$cardType = 'Display';
			break;
			case self::CARD_TYPE_INPUT:
				$cardType = 'Input';
			break;
		}
		
        return $cardType;
    }
    public function getDisplayType()
    {
        $displayType = null;
		switch($this->display_type) {
			case self::DISPLAY_TYPE_MEDICINE:
				$displayType = 'Medicine';
			break;
			case self::DISPLAY_TYPE_DRUG:
				$displayType = 'Drug';
			break;
		}
		
        return $displayType;
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
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'card_tags', 'card_id', 'tag_id');
    }
}
