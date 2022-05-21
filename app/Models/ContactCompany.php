<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactCompany extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const TYPE_SELECT = [
        'supplier' => 'Fournisseur',
        'client' => 'Client',
        'both' => 'Tous les deux',
    ];

    public $table = 'contact_companies';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'company_name',
        'type',
        'company_address',
        'company_website',
        'company_email',
        'phone',
        'fax',
        'ice',
        'rib',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function clientProjects()
    {
        return $this->hasMany(Project::class, 'client_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
