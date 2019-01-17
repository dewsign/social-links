<?php

namespace Dewsign\SocialLinks;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    public function sociable()
    {
        return $this->morphTo();
    }
}
