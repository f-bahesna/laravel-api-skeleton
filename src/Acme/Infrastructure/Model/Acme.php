<?php
declare(strict_types=1);

namespace Acme\Infrastructure\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @author frada <fbahezna@gmail.com>
 */
class Acme extends Model
{
    protected $table = 'acmes';
    public $incrementing = false;
    protected $fillable = ['id', 'name'];
}
