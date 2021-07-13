<?php
declare(strict_types=1);

namespace App\Services;

use App\Interfaces\IAdmin;
use App\Models\Admin;
use App\Repositories\AdminRepository;

class AdminService implements IAdmin
{
    /**
     * @var AdminRepository
     */
    private $repository;


    /**
     * AdminService constructor.
     */
    public function __construct(AdminRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAdminByEmail(string $email) : Admin
    {
       return $this->repository->getAdminByEmail($email);
    }
}
