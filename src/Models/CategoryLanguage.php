<?php

namespace PureIntento\InfinityCategory\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryLanguage extends Model
{
    use HasFactory;

    protected $fillable=[
        "language_id",
        "category_id",
        "name",
        "description",
        "keywords"
    ];
}
