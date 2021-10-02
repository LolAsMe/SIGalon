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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Galon\DetailTransaksi[] $detail
 * @property-read int|null $detail_count
 * @property string $debit
 * @property string $kredit
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereDebit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereKredit($value)
 * @property-read Model|\Eloquent $payer
 */
class Transaksi extends \Eloquent
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'transaksi';
    protected $lastDetail = 0;
    protected $guarded = [];
    protected $appens = [];

    protected $detailAttribute = [];

    public function detail()
    {
        return $this->hasMany(DetailTransaksi::class);
    }

    public function createDetail()
    {
        $this->lastDetail = $this->detail()->create($this->detailAttribute);
    }

    public function getLastDetail()
    {
        return $this->lastDetail;
    }
    public function setDetailAttribute(array $attribute)
    {
        isset($attribute['jumlah']) ? $this->detailAttribute['jumlah'] = $attribute['jumlah'] : 0;
        $this->detailAttribute['debit'] = $attribute['debit'] ?? 0;
        $this->detailAttribute['kredit'] = $attribute['kredit'] ?? 0;
        isset($attribute['keterangan']) ? $this->detailAttribute['keterangan'] = $attribute['keterangan'] :0;
        isset($attribute['harga']) ? $this->detailAttribute['harga'] = $attribute['harga'] :0;
        isset($attribute['total']) ? $this->detailAttribute['total'] = $attribute['total'] :0;
        return $this;
    }

    public function transact()
    {
        $this->increment('debit',$this->detailAttribute['debit']);
        $this->increment('kredit',$this->detailAttribute['kredit']);
        $this->createDetail();
    }

    public function payer()
    {
        return $this->morphTo();
    }
}
