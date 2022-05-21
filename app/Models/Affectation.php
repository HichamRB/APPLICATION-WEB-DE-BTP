<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    /**
     * Get the comments for the blog post.
     */
    public function employe()
    {
        return $this->belongsTo(Employe::class , 'employe_id');
    }
    public function chantier()
    {
        return $this->belongsTo(Site::class , 'chantier_id');
    }


    public $table ='afectations';

    protected $fillable = [
        'employe_id',
        'chantier_id',
        'created_at',
        'updated_at',

    ];
}
