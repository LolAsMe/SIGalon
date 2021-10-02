<?php

namespace App\Models\Galon;

use App\Services\Traits\HasLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Galon\Piutang
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
 * @method static \Database\Factories\Galon\PiutangFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Piutang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Piutang newQuery()
 * @method static \Illuminate\Database\Query\Builder|Piutang onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Piutang query()
 * @method static \Illuminate\Database\Eloquent\Builder|Piutang whereAsetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Piutang whereBayar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Piutang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Piutang whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Piutang whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Piutang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Piutang whereJumlah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Piutang whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Piutang whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Piutang whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Piutang whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Piutang withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Piutang withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Galon\Log[] $log
 * @property-read int|null $log_count
 * @property string $payer_type
 * @property int $payer_id
 * @property string $status
 * @property-read Model|\Eloquent $payer
 * @method static \Illuminate\Database\Eloquent\Builder|Piutang wherePayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Piutang wherePayerType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Piutang whereStatus($value)
 */
class Piutang extends \Eloquent
{
    use HasFactory;
    use HasLog;
    use SoftDeletes;

    protected $table = 'piutang';
    protected $guarded = [];
    protected $appens = [];

    public function payer()
    {
        return $this->morphTo();
    }
}
