<?php

namespace App\Models\Galon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Galon\Distributor
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
 * @method static \Illuminate\Database\Eloquent\Builder|Distributor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Distributor newQuery()
 * @method static \Illuminate\Database\Query\Builder|Distributor onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Distributor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Distributor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Distributor whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Distributor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Distributor whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Distributor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Distributor withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Distributor withoutTrashed()
 * @mixin \Eloquent
 */
class Distributor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'distributor';
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
