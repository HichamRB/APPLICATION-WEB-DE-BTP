<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Employe extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const SALARY_TYPE_SELECT = [
        'monthly' => 'mensuelle',
        'daily' => 'quotidien',
    ];

    public const CONTRACT_TYPE_SELECT = [
        'cdd'   => 'CDD',
        'cdi'   => 'CDI',
        'stage' => 'Stage',
    ];

    public const BANK_SELECT = [
        'bcme' => 'bmce',
        'bq'   => 'Banque Populaire',
        'wafa' => 'Attijari WafaBank',
        'cih'  => 'CIH',
        'bmci' => 'bmci',
    ];

    public $table = 'employes';

    protected $appends = [
        'picture',
    ];

    protected $dates = [
        'birthday',
        'job_start',
        'job_end',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'mobile',
        'job_id',
        'birthday',
        'cin',
        'address',
        'rib',
        'bank',
        'salary_type',
        'salary',
        'job_start',
        'job_end',
        'contract_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getPictureAttribute()
    {
        $file = $this->getMedia('picture')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function getBirthdayAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBirthdayAttribute($value)
    {
        $this->attributes['birthday'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getJobStartAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setJobStartAttribute($value)
    {
        $this->attributes['job_start'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getJobEndAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setJobEndAttribute($value)
    {
        $this->attributes['job_end'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
