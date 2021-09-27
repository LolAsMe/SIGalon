<?php

namespace App\Models\Galon;

use App\Services\Traits\HasLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Galon\Transaksi
 *
 * @property int $id
 * @property string $tanggal
 * @property string $total
 * @property string $status
 * @property string|null $keterangan
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\Galon\TransaksiFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi newQuery()
 * @method static \Illuminate\Database\Query\Builder|Transaksi onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereTanggal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Transaksi withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Transaksi withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Galon\Log[] $log
 * @property-read int|null $log_count
 */
class Transaksi extends Model
{
    use HasFactory;
    use HasLog;
    use SoftDeletes;

    protected $table = 'transaksi';
    protected $guarded = [];
    protected $appens = [];
}
