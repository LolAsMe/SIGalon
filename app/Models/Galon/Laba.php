<?php

namespace App\Models\Galon;

use App\Services\Traits\HasLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Galon\Laba
 *
 * @property int $id
 * @property string $nama
 * @property string $total
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Galon\Log[] $log
 * @property-read int|null $log_count
 * @method static \Illuminate\Database\Eloquent\Builder|Laba newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Laba newQuery()
 * @method static \Illuminate\Database\Query\Builder|Laba onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Laba query()
 * @method static \Illuminate\Database\Eloquent\Builder|Laba whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Laba whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Laba whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Laba whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Laba whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Laba whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Laba withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Laba withoutTrashed()
 * @mixin \Eloquent
 */
class Laba extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasLog;

    protected $table = 'laba';
    protected $guarded = [];
    protected $appends = [];

    // public function transact($detailTransaksi = null)
    // {
    //     $this->total = $this->total - $this->logAttribute['debit'] + $this->logAttribute['kredit'];
    //     isset($detailTransaksi->id) ? $this->logAttribute['detail_transaksi_id'] = $detailTransaksi->id :0;
    //     $this->save();
    //     $this->createLog();
    // }
}
