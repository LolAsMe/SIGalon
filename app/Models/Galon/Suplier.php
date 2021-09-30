<?php

namespace App\Models\Galon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Galon\Suplier
 *
 * @property int $id
 * @property string $nama
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Galon\Piutang[] $piutang
 * @property-read int|null $piutang_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Galon\Utang[] $utang
 * @property-read int|null $utang_count
 * @method static \Illuminate\Database\Eloquent\Builder|Suplier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Suplier newQuery()
 * @method static \Illuminate\Database\Query\Builder|Suplier onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Suplier query()
 * @method static \Illuminate\Database\Eloquent\Builder|Suplier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Suplier whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Suplier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Suplier whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Suplier whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Suplier withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Suplier withoutTrashed()
 * @mixin \Eloquent
 */
class Suplier extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'suplier';
    protected $guarded = [];
    protected $appends = [];

    public function utang()
    {
        return $this->morphMany(Utang::class, 'payer');
    }
    public function piutang()
    {
        return $this->morphMany(Piutang::class, 'payer');
    }
}
