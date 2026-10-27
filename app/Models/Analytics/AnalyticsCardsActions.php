<?php

namespace App\Models\Analytics;

use Illuminate\Database\Eloquent\Model;
use App\Models\Analytics\Traits\ActionTrait;

class AnalyticsCardsActions extends Model
{
    use ActionTrait;
    protected $table = 'analytics_cards_actions';
}
