<?php

namespace App\Model;

use Mix\Framework\Database\AbstractModel;

class UserCloudDataModel extends AbstractModel
{
    protected string $table = 'kd_farm_userCloud_data';

    protected string $primaryKey = 'id';
}
