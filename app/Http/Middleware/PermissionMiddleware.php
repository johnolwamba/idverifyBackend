<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param $permission
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {

        if (Auth::guest()) {
            return redirect('/login');
        }

//['create-meeting', 'edit-meeting', 'delete-meeting', 'view-a-meeting', 'view-all-meetings', 'create-tasks', 'edit-task', 'view-a-task', 'delete-task', 'change-task-status', 'view-all-tasks', 'update-task-comments', 'view-reports', 'do-admin-tasks', 'create-extension-request', 'review-extension-request'
        //]

//        if(!$request->user()->hasAnyPermission(['view-a-meeting', 'view-all-meetings'])){
//            return redirect('auth/no-role');
//        }

        if (!$request->user()->can($permission)) {
                abort(403);
        }

        return $next($request);
    }
}
