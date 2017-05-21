<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class RoleComposer
{
    public function compose(View $view)
    {
        $view->with('roles', \App\Role::pluck('name', 'id'));
    }
}