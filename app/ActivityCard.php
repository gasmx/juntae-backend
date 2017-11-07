<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityCard extends Model
{
    protected $guarded = ['id'];

    public function status()
    {
        return $this->belongsTo(ActivityCardStatus::class, 'cart_status_id');
    }

    public function toArray()
    {
        $data = parent::toArray();

        if ($this->status) {
            $data['activity_card_status_name'] = $this->status->name;
            $data['activity_card_status_color'] = $this->status->color;
        } else {
            $data['activity_card_status_name'] = null;
            $data['activity_card_status_color'] = null;
        }

        return $data;
    }
}
