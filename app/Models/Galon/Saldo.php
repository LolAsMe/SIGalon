<?php

namespace App\Models\Galon;

use App\Services\Traits\HasLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * App\Models\Tenongan\Saldo
 *
 * @property int $id
 * @property string $kode
 * @property string $saldo
 * @property int $pedagang_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tenongan\LogSaldo[] $logSaldo
 * @property-read int|null $log_saldo_count
 * @method static \Illuminate\Database\Eloquent\Builder|Saldo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Saldo newQuery()
 * @method static \Illuminate\Database\Query\Builder|Saldo onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Saldo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Saldo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Saldo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Saldo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Saldo whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Saldo wherePedagangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Saldo whereSaldo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Saldo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Saldo withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Saldo withoutTrashed()
 * @mixin \Eloquent
 * @property string $jumlah
 * @property string $owner_type
 * @property int $owner_id
 * @property-read mixed $tipe
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tenongan\LogSaldo[] $log
 * @property-read int|null $log_count
 * @property-read Model|\Eloquent $owner
 * @method static \Illuminate\Database\Eloquent\Builder|Saldo whereJumlah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Saldo whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Saldo whereOwnerType($value)
 * @property string $total
 * @method static \Database\Factories\Galon\SaldoFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Saldo whereTotal($value)
 * @property string|null $nama
 * @method static \Illuminate\Database\Eloquent\Builder|Saldo whereNama($value)
 */
class Saldo extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasLog;

    protected $table = 'saldo';
    protected $guarded = [];
    protected $appends = [];

    // public function transact($detailTransaksi = null)
    // {
    //     $this->total = $this->total + $this->logAttribute['debit'] - $this->logAttribute['kredit'];
    //     isset($detailTransaksi->id) ? $this->logAttribute['detail_transaksi_id'] = $detailTransaksi->id :0;
    //     $this->save();
    //     $this->createLog();
    // }
}
