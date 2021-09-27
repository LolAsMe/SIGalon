<?php

namespace App\Models\Galon;

use App\Services\Traits\HasLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Galon\Utang
 *
 * @property int $id
 * @property int|null $aset_id
 * @property string $nama
 * @property int $jumlah
 * @property string $bayar
 * @property string $harga
 * @property string $total
 * @property string|null $keterangan
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\Galon\UtangFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Utang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Utang newQuery()
 * @method static \Illuminate\Database\Query\Builder|Utang onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Utang query()
 * @method static \Illuminate\Database\Eloquent\Builder|Utang whereAsetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Utang whereBayar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Utang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Utang whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Utang whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Utang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Utang whereJumlah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Utang whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Utang whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Utang whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Utang whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Utang withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Utang withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Galon\Log[] $log
 * @property-read int|null $log_count
 */
class Utang extends Model
{
    use HasFactory;
    use HasLog;
    use SoftDeletes;

    protected $table = 'utang';
    protected $guarded = [];
    protected $appends = [];
}
