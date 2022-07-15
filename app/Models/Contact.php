<?php
declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Database\Factories\ContactFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Contact
 *
 * @method static ContactFactory factory(...$parameters)
 * @method static Builder|Contact newModelQuery()
 * @method static Builder|Contact newQuery()
 * @method static Builder|Contact query()
 * @mixin Eloquent
 * @property int $id
 * @property string $uuid
 * @property string $title
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $preferred_name
 * @property string $email
 * @property string $phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|Contact onlyTrashed()
 * @method static Builder|Contact whereCreatedAt($value)
 * @method static Builder|Contact whereDeletedAt($value)
 * @method static Builder|Contact whereEmail($value)
 * @method static Builder|Contact whereFirstName($value)
 * @method static Builder|Contact whereId($value)
 * @method static Builder|Contact whereLastName($value)
 * @method static Builder|Contact whereMiddleName($value)
 * @method static Builder|Contact wherePhone($value)
 * @method static Builder|Contact wherePreferredName($value)
 * @method static Builder|Contact whereTitle($value)
 * @method static Builder|Contact whereUpdatedAt($value)
 * @method static Builder|Contact whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|Contact withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Contact withoutTrashed()
 */
class Contact extends Model
{
    use HasUuid;
    use HasFactory;
    use SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'uuid',
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'preferred_name',
        'email',
        'phone'
    ];
}
