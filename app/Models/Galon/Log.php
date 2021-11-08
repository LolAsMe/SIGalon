<?php

namespace App\Models\Galon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Galon\Log
 *
 * @property int $id
 * @property string $owner_type
 * @property int $owner_id
 * @property int|null $detail_transaksi_id
 * @property string $nama
 * @property string $debit
 * @property string $kredit
 * @property string $total
 * @property string $keterangan
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Model|\Eloquent $owner
 * @method static \Database\Factories\Galon\LogFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Log newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Log newQuery()
 * @method static \Illuminate\Database\Query\Builder|Log onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Log query()
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereDebit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereDetailTransaksiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereKredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereOwnerType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Log withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Log withoutTrashed()
 * @mixin \Eloquent
 * @property string $tanggal
 * @property int $jumlah
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereJumlah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereTanggal($value)
 */
class Log extends \Eloquent
{
    use HasFactory;
    use SoftDeletes;

    protected $table =  'log';
    protected $guarded = [];
    protected $appens = [];

    public function owner()
    {
        return $this->morphTo();
    }

    public function detail()
    {
        return $this->belongsTo(DetailTransaksi::class);
    }
}
