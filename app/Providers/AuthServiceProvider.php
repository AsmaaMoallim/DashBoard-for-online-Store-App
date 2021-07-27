<?php

namespace App\Providers;

use App\Models\Permission;
use App\Policies\BannerPolicy;
use App\Policies\ReturnPermissionOfManager;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manager_view', function () {
            return (Permission::Deals_with_manager == ReturnPermissionOfManager::retunPer(Permission::Deals_with_manager));
        });
        Gate::define('positions_permissions_view', function () {
            return (Permission::Deals_with_positions_permissions == ReturnPermissionOfManager::retunPer(Permission::Deals_with_positions_permissions));
        });
        Gate::define('media_Library_view', function () {
            return (Permission::Deals_with_media_library == ReturnPermissionOfManager::retunPer(Permission::Deals_with_media_library));
        });
        Gate::define('banners_view', function () {
            return (Permission::Deals_with_banners == ReturnPermissionOfManager::retunPer(Permission::Deals_with_banners));
        });
        Gate::define('main_sections_sub_sections_view', function () {
            return (Permission::Deals_with_main_sections_sub_sections == ReturnPermissionOfManager::retunPer(Permission::Deals_with_main_sections_sub_sections));
        });
        Gate::define('products_view', function () {
            return (Permission::Deals_with_products == ReturnPermissionOfManager::retunPer(Permission::Deals_with_products));
        });
        Gate::define('clients_view', function () {
            return (Permission::Deals_with_clients == ReturnPermissionOfManager::retunPer(Permission::Deals_with_clients));
        });

        Gate::define('measure_view', function () {
            return (Permission::Deals_with_measure == ReturnPermissionOfManager::retunPer(Permission::Deals_with_measure));
        });
        Gate::define('contact_information_view', function () {
            return (Permission::Deals_with_contact_information == ReturnPermissionOfManager::retunPer(Permission::Deals_with_contact_information));
        });
        Gate::define('social_media_link_view', function () {
            return (Permission::Deals_with_social_media_link == ReturnPermissionOfManager::retunPer(Permission::Deals_with_social_media_link));
        });
        Gate::define('shipping_charge_view', function () {
            return (Permission::Deals_with_shipping_charge == ReturnPermissionOfManager::retunPer(Permission::Deals_with_shipping_charge));
        });
        Gate::define('bank_accounts_view', function () {
            return (Permission::Deals_with_sys_bank_account == ReturnPermissionOfManager::retunPer(Permission::Deals_with_sys_bank_account));
        });
        Gate::define('bank_transaction_view', function () {
            return (Permission::Deals_with_bank_transaction == ReturnPermissionOfManager::retunPer(Permission::Deals_with_bank_transaction));
        });
        Gate::define('comments_view', function () {
            return (Permission::Deals_with_comments == ReturnPermissionOfManager::retunPer(Permission::Deals_with_comments));
        });
        Gate::define('notifications_view', function () {
            return (Permission::Deals_with_notifications == ReturnPermissionOfManager::retunPer(Permission::Deals_with_notifications));
        });
        Gate::define('email_box_view', function () {
            return (Permission::Deals_with_email_box == ReturnPermissionOfManager::retunPer(Permission::Deals_with_email_box));
        });
        Gate::define('orders_view', function () {
            return (Permission::Deals_with_orders == ReturnPermissionOfManager::retunPer(Permission::Deals_with_orders));
        });


    }
}
