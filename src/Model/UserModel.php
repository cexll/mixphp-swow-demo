<?php

namespace App\Model;

use Mix\Framework\Database\AbstractModel;

class UserModel extends AbstractModel
{
    protected string $primaryKey = 'user_id';

    protected string $table = 'kd_farm_account';
}
