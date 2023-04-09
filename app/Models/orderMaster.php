<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderMaster extends Model
{
    use HasFactory;
    protected $fillable =
    [
        "name",
        "remarks",
        "qnt",
        "category_id",
        "project_id",
        "item_id"
    ];
    public function Project()
    {
        return $this->belongsTo(ProjectMaster::class, 'project_id', 'id');
    }

    public function Category()
    {
        return $this->belongsTo(CategoryMaster::class, 'category_id', 'id');
    }
    public function Item()
    {
        return $this->belongsTo(itemMaster::class, 'item_id', 'id');
    }
}
