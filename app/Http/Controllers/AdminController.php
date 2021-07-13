<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Interfaces\IAdmin;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    private $adminService;

    /**
     * AdminController constructor.
     */
    public function __construct(IAdmin $adminService)
    {
        $this->adminService = $adminService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|RedirectResponse|Redirector
     */
    public function index()
    {
        if (session()->has('ADMIN_LOGIN')) {
            return redirect('admin/dashboard');
        } else {
            return view('admin.login');
        }
    }


    public function auth(Request $request)
    {
        $result = $this->adminService->getAdminByEmail($request->email);
        if (!isset($result)) {
            $request->session()->flash('error', 'wrong credentials');
            return redirect('admin');
        } else {
            if (Hash::check($request->password, $result->password)) {
                session(['ADMIN_LOGIN' => true, 'ADMIN_ID' => $request->id]);
                return redirect('admin/dashboard');
            } else {
                $request->session()->flash('error', 'Please enter correct password');
                return redirect('admin');
            }
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error', 'Logout successfully');
        return redirect('admin');
    }


}
