<?php
declare(strict_types=1);

namespace App\Interfaces;
use App\Models\Admin;

interface IAdmin
{
    public function getAdminByEmail(string $email) : Admin;
}
