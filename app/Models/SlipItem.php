<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SlipItem extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'slip_items';

    protected $fillable = [
        'reference_item',
        'description',
        'unit',
        'unit_price',
        'qte_min',
        'slip_id',
        'qte_max',
        'total_price_min',
        'total_price_max',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public const UNIT_SELECT = [
        'm'    => 'm',
        'l'    => 'L',
        'kg'   => 'KG',
        'pc'   => 'Piece',
        'm2'   => 'm²',
        'pack' => 'Pack',
    ];
    public function slip()
    {
        return $this->belongsTo(Slip::class, 'slip_id');
    }
}
