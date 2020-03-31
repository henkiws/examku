<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Menu;

class MenuSidebar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::check()) return $next($request);

        Menu::create('navbar', function($menu) {

            $menu->style('atlantis-lite');

            $attr = ['icon' => 'fas fa-dot-circle'];

            $menu->url('home', 'Dashboard', ['icon' => 'fas fa-home']);

            $menu->divider();

            $menu->dropdown('Users', function ($sub) use($attr) {
                $sub->url('users/all', 'User');
                $sub->url('users/role', 'Role');
                $sub->url('users/permission', 'Permission');
            }, ['icon' => 'fas fa-user-cog']);

            $menu->dropdown('Settings', function ($sub) use($attr) {
                $sub->url('settings/design', 'Design');
                $sub->url('logout', 'Logout');
            }, ['icon' => 'fas fa-table']);

        });

        return $next($request);
    }
}
