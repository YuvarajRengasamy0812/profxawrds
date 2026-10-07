<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\WebmasterSection;

// Dashboard layout (sidebar menu) needs the active webmaster sections on every page
trait DashboardView
{
    protected function dashboardView($view, array $data = [])
    {
        $data['GeneralWebmasterSections'] = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

        return view($view, $data);
    }
}
