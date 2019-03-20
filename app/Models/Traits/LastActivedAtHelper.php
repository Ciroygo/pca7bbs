<?php

namespace App\Models\Traits;

use Carbon\Carbon;
use Redis;

trait LastActivedAtHelper
{
    protected $hash_prefix = 'pca7bbs_last_actived_at_';
    protected $field_prefix = 'user_';

    public function recordLastActivedAt()
    {
        $date = Carbon::now()->toDateString();

        $hash = $this->hash_prefix . $date;

        $field = $this->field_prefix . $this->id;

        $now = Carbon::now()->toDateTimeString();

        Redis::hSet($hash, $field, $now);
    }

    public function syncUserActivedAt()
    {
        $yesterday_date = Carbon::yesterday()->toDateString();

        $hash = $this->hash_prefix . $yesterday_date;

        $dates = Redis::hGetAll($hash);

        foreach ($dates as $user_id => $actived_at) {
            $user_id = str_replace($this->field_prefix, '', $user_id);

            if ($user = $this->find($user_id)) {
                $user->last_actived_at = $actived_at;
                $user->save();
            }
        }

        Redis::del($hash);
    }

    public function getLastActivedAtAttribute($value)
    {
        $date = Carbon::now()->toDateString();

        $hash = $this->hash_prefix . $date;

        $field = $this->field_prefix . $this->id;

        $datetime = Redis::hGet($hash, $field) ?: $value;

        if ($datetime) {
            return new Carbon($datetime);
        } else {
            return $this->created_at;
        }
    }
}
