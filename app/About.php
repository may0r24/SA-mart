<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = ['id', 'about_line', 'facebook_link', 'instagram_link', 'twitter_link', 'linkedin_link', 'phone_line_1', 'phone_line_2', 'phone_line_3'];
}
