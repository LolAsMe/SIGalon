<?php

namespace App\Models\Galon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Galon\DetailTransaksi
 *
 * @property int $id
 * @property int $transaksi_id
 * @property int $aset_id
 * @property int $jumlah
 * @property string $harga
 * @property string $debit
 * @property string $kredit
 * @property string $total
 * @property string $status
 * @property string|null $keterangan
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\Galon\DetailTransaksiFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaksi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaksi newQuery()
 * @method static \Illuminate\Database\Query\Builder|DetailTransaksi onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaksi query()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaksi whereAsetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaksi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaksi whereDebit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaksi whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaksi whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaksi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaksi whereJumlah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaksi whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaksi whereKredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaksi whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaksi whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaksi whereTransaksiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaksi whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|DetailTransaksi withTrashed()
 * @method static \Illuminate\Database\Query\Builder|DetailTransaksi withoutTrashed()
 * @mixin \Eloquent
 * @property-read \App\Models\Galon\Transaksi $transaksi
 */
class DetailTransaksi extends \Eloquent
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'detail_transaksi';
    protected $guarded = [];
    protected $appends = [];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
