<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // get all data from admin.json file
        $adminJson = file_get_contents(base_path('resources/json/submenu_admin.json'));
        $adminData = json_decode($adminJson);
        // Share all adminData to all the views
        \View::share('adminData', $adminData);

		/// الرئيسية
        $homeJson = file_get_contents(base_path('resources/json/submenu_home.json'));
        $homeData = json_decode($homeJson);
        // Share all basicData to all the views
        \View::share('homeData', $homeData);


		/// تقارير عامة
        $publicreportsJson = file_get_contents(base_path('resources/json/submenu_publicreports.json'));
        $publicreportsData = json_decode($publicreportsJson);
        // Share all publicreportsData to all the views
        \View::share('publicreportsData', $publicreportsData);
		
		/// تقارير استحقاقات
        $reportsJson = file_get_contents(base_path('resources/json/submenu_reports.json'));
        $reportsData = json_decode($reportsJson);
        // Share all basicData to all the views
        \View::share('reportsData', $reportsData);
		
		/// موارد بشرية
        $hrJson = file_get_contents(base_path('resources/json/submenu_hr.json'));
        $hrData = json_decode($hrJson);
        // Share all qrcodeData to all the views
        \View::share('hrData', $hrData);
   
   
        // get all data from menu.json file
        $dashboardsJson = file_get_contents(base_path('resources/json/dashboard.json'));
        $dashboardsData = json_decode($dashboardsJson);

        // Share all dashboardsData to all the views
        \View::share('dashboardsData', $dashboardsData);







		

		
		
		// get all data from menu.json file
        $authorizationJson = file_get_contents(base_path('resources/json/submenu_authorization.json'));
        $authorizationData = json_decode($authorizationJson);

        // Share all basicData to all the views
        \View::share('authorizationData', $authorizationData);
		
		
		
		

		

    }
}
