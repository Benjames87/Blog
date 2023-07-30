<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'body',
    ];
    protected $hidden = [
        'user_id',
        'post_id'
    ];

    /**
     * @return BelongsTo
     */
    public function author() : BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    /**
     * @return BelongsTo
     */
    public function post() : BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
