<?php

namespace Dewsign\SocialLinks\Traits;

use Dewsign\SocialLinks\SocialLink;

trait HasSocialLinks
{
    public function socialLinks()
    {
        return $this->morphMany(SocialLink::class, 'sociable');
    }
}
