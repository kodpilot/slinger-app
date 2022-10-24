<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\permissions;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $permissions = permissions::where('role_id',Auth::user()->admin)->get();
            $url = $request->url();
            $control = false;
            $route = null;
            $current_path = parse_url($url)['path'];
            foreach ($permissions as $permission) {
                if ($permission->menuStatu==2) {
                    $role_path = parse_url(route(getRoleAction($permission->menu_id,2)->route))['path'];
                    $route = getRoleAction($permission->menu_id,2)->route;
                    if(str_contains($current_path,$role_path)){
                        $control = true;
                        break;
                    }
                }
            }
            if ($control) {
                return $next($request);
            }
            else{
                toastr()->warning('Bu Alan İçin Yetkiniz Yok !', 'Yetkisiz Giriş');
                if ($route != null) {
                    return redirect()->route($route);
                }
            }
        }else{
            return redirect('admin-giris');
        }
    }
}
