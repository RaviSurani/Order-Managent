<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itemMaster extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "code",
        "category_id",
        "project_id",
        "gross_weight",
        "image",
    ];


    public function Project()
    {
        return $this->belongsTo(ProjectMaster::class, 'project_id', 'id');
    }

    public function Category()
    {
        return $this->belongsTo(CategoryMaster::class, 'category_id', 'id');
    }
}
