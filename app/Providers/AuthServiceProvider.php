<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Admin;
use App\Policies\AdminPolicy;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Admin::class => AdminPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('quan-ly-san-pham', function (Admin $admin) {
            if ($admin->quyen && $admin->quyen->ten_quyen === 'Quản Lý Sản Phẩm' ||  $admin->quyen_id == 0 ) {
                return true;
            }
            return false;
        });
    
        Gate::define('quan-ly-nha-cung-cap', function (Admin $admin) {
            if ($admin->quyen && $admin->quyen->ten_quyen === 'Quản Lý Nhà Cung Cấp' ||  $admin->quyen_id == 0 ) {
                return true;
            }
            return false;
        });
        Gate::define('quan-ly-hoa-don-nhap', function (Admin $admin) {
            if ($admin->quyen && $admin->quyen->ten_quyen === 'Quản Lý Hóa Đơn Nhập' ||  $admin->quyen_id == 0 ) {
                return true;
            }
            return false;
        });
    
        Gate::define('quan-ly-hoa-don-xuat', function (Admin $admin) {
            if ($admin->quyen && $admin->quyen->ten_quyen === 'Quản Lý Hóa Đơn Xuất' ||  $admin->quyen_id == 0 ) {
                return true;
            }
            return false;
        });
        Gate::define('quan-ly-binh-luan', function (Admin $admin) {
            if ($admin->quyen && $admin->quyen->ten_quyen === 'Quản Lý Bình Luận' ||  $admin->quyen_id == 0 ) {
                return true;
            }
            return false;
        });
    
        Gate::define('quan-ly-thong-ke', function (Admin $admin) {
            if ($admin->quyen && $admin->quyen->ten_quyen === 'Quản Lý Thống Kê' ||  $admin->quyen_id == 0 ) {
                return true;
            }
            return false;
        });


        Gate::define('quan-ly-tai-khoan-admin', function (Admin $admin) {
            return $admin->quyen_id == 0;
        });
    
        Gate::define('quan-ly-tai-khoan-nguoi-dung', function (Admin $admin) {
            if ($admin->quyen && $admin->quyen->ten_quyen === 'Quản Lý Tài Khoản Người Dùng' ||  $admin->quyen_id == 0 ) {
                return true;
            }
            return false;
        });

    }
}
