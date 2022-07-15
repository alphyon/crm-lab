<?php
declare(strict_types=1);

namespace App\Models;

use Database\Factories\JobTitleFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\JobTitle
 *
 * @method static JobTitleFactory factory(...$parameters)
 * @method static Builder|JobTitle newModelQuery()
 * @method static Builder|JobTitle newQuery()
 * @method static Builder|JobTitle query()
 * @mixin Eloquent
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|JobTitle whereCreatedAt($value)
 * @method static Builder|JobTitle whereId($value)
 * @method static Builder|JobTitle whereName($value)
 * @method static Builder|JobTitle whereUpdatedAt($value)
 * @method static Builder|JobTitle whereUuid($value)
 */
class JobTitle extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'uuid',
        'name'
    ];
}
