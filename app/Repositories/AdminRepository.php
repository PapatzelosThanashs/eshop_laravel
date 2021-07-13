<?php
declare(strict_types=1);


namespace App\Repositories;
use App\Models\Admin;

class AdminRepository
{
    public function getAdminByEmail(string $email) : Admin
    {
        return Admin::where('email', $email)
            ->first();
    }
}
