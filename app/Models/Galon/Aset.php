<?php

namespace App\Models\Galon;

use App\Services\Traits\HasLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Galon\Aset
 *
 * @property int $id
 * @property string $nama
 * @property string $harga_jual
 * @property string $harga_beli
 * @property int $jumlah
 * @property string $total
 * @property string $status
 * @property string $keterangan
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\Galon\AsetFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Aset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Aset newQuery()
 * @method static \Illuminate\Database\Query\Builder|Aset onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Aset query()
 * @method static \Illuminate\Database\Eloquent\Builder|Aset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Aset whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Aset whereHargaBeli($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Aset whereHargaJual($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Aset whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Aset whereJumlah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Aset whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Aset whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Aset whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Aset whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Aset whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Aset withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Aset withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Galon\Log[] $log
 * @property-read int|null $log_count
 */
class Aset extends \Eloquent
{
    use HasFactory;
    use HasLog;
    use SoftDeletes;

    protected $table = 'aset';
    protected $guarded = [];
    protected $appends = [];

    public function getTotal()
    {
        return $this->total + (($this->logAttribute['debit'] - $this->logAttribute['kredit']) ?? 0);
    }
}
