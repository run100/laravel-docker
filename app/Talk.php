<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Talk
 *
 * @package App
 * @property int $id
 * @property int $uid 用户ID
 * @property string $message 消息内容
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Talk newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Talk newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Talk query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Talk whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Talk whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Talk whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Talk whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Talk whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $email
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Talk whereEmail($value)
 */
class Talk extends Model
{
    //
    protected $fillable = [
        'uid', 'message'
    ];
}
