<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const TYPE_SELECT = [
        'cadred' => 'Cadré',
        'specified' => 'Spécifié',
    ];

    public const STATUS_SELECT = [
        'started'     => 'A débuté',
        'indificulty' => 'En difficulté',
        'archived'    => 'Archivé',
        'inprogress'  => 'Encours',
    ];

    public $table = 'projects';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'reference',
        'order_date',
        'deadline_date',
        'client_id',
        'type',
        'project_chef_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function client()
    {
        return $this->belongsTo(ContactCompany::class, 'client_id');
    }

    public function project_chef()
    {
        return $this->belongsTo(Employe::class, 'project_chef_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
