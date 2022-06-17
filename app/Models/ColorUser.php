<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\ColorUser
 *
 * @property int $id
 * @property int $user_id
 * @property int $color_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ColorUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ColorUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ColorUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|ColorUser whereColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ColorUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ColorUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ColorUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ColorUser whereUserId($value)
 * @mixin \Eloquent
 */
class ColorUser extends Pivot
{
    //
}
