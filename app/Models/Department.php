<?php
declare(strict_types=1);

namespace App\Models;

use Database\Factories\DepartmentFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Department
 *
 * @method static DepartmentFactory factory(...$parameters)
 * @method static Builder|Department newModelQuery()
 * @method static Builder|Department newQuery()
 * @method static Builder|Department query()
 * @mixin Eloquent
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|Department onlyTrashed()
 * @method static Builder|Department whereCompanyId($value)
 * @method static Builder|Department whereCreatedAt($value)
 * @method static Builder|Department whereDeletedAt($value)
 * @method static Builder|Department whereId($value)
 * @method static Builder|Department whereName($value)
 * @method static Builder|Department whereUpdatedAt($value)
 * @method static Builder|Department whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|Department withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Department withoutTrashed()
 */
class Department extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'uuid',
        'name',
        'company_id'
    ];
}
