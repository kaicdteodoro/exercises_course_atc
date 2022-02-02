<?php

namespace App\Repositories;

use App\Models\Bill;
use Prettus\Repository\Eloquent\BaseRepository;

class BillRepository extends BaseRepository
{
    public function model()
    {
        return Bill::class;
    }
}
