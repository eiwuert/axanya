<?php

/**
 * Metas Model
 *
 * @package     Makent
 * @subpackage  Model
 * @category    Metas
 * @author      Trioangle Product Team
 * @version     1.2
 * @link        http://trioangle.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Metas extends Model
{

    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'metas';
}
