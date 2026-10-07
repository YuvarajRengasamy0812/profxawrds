<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

// Blocks admin modules / CMS sections this project does not use (see config/profx.php)
class BlockUnusedAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $path = trim(substr($request->path(), strlen(config('smartend.backend_path'))), '/');
        $first = explode('/', $path)[0];

        $blocked = in_array($first, config('profx.blocked_admin_paths', []));

        // /admin/{webmasterId}/topics|categories|... and the topics datatable ajax
        $webmasterId = $request->route('webmasterId') ?? ($first == 'topics-list' ? $request->input('webmaster_id') : null);
        if ($webmasterId !== null && !in_array((int)$webmasterId, config('profx.admin_sections', []))) {
            $blocked = true;
        }

        if ($blocked) {
            if ($request->ajax() || $request->wantsJson()) {
                abort(403);
            }

            return redirect()->route('adminHome')->with('errorMessage', 'This module is disabled for this website.');
        }

        return $next($request);
    }
}
