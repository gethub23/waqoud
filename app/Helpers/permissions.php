<?php


use App\Models\Permission;
use Illuminate\Support\Facades\Route;


// display routes
function sidebar()
{
    $routes         = Route::getRoutes();
    $routes_data    = [];
    $my_routes      = Permission::where('role_id', auth()->user()->role_id)->pluck('permission')->toArray();
    foreach ($routes as $route) {
        if ($route->getName())
            $routes_data['"'.$route->getName().'"'] = [
                'title'     => isset($route->getAction()['title']) ? $route->getAction()['title'] : null,
                'subTitle'  => isset($route->getAction()['subTitle']) ? $route->getAction()['subTitle'] : null,
                'icon'      => isset($route->getAction()['icon']) ? $route->getAction()['icon'] : null,
                'subIcon'   => isset($route->getAction()['subIcon']) ? $route->getAction()['subIcon'] : null,
                'name'      => $route->getName() ?? null,
            ];
    }


    foreach ($routes as $value) {
        if ($value->getName() !== null) {

            //display only parent routes
            if (isset($value->getAction()['title']) && isset($value->getAction()['icon']) && isset($value->getAction()['type']) && $value->getAction()['type'] == 'parent') {


                //display route with sub directory
                if (isset($value->getAction()['sub_route']) && $value->getAction()['sub_route'] == true && isset($value->getAction()['child']) && count($value->getAction()['child'])) {

                    // check user auth to access this route
                    if (in_array($value->getName(), $my_routes)) {


                        //check if this is the current opened
                        $active     = '';
                        $opend      = '';
                        $child_name = substr(Route::currentRouteName(), 6);
                        if(in_array($child_name, $value->getAction()['child'])){
                            $active = 'active';
                            $opend  = 'open';
                        }

                        echo '<li class="nav-item ' . $opend . '" >
                                <a href="javascript:void(0);" class="'.$active.'">' . $value->getAction()['icon'] . '<span class="menu-title" data-i18n="nav.dash.main">' . awtTrans($value->getAction()['title']) . '</a>
                                <ul class="menu-content">';

                        // display child sub directories
                        foreach ($value->getAction()['child'] as $child){
                            $active = ('admin.'.$child) == Route::currentRouteName() ? 'active' : '';


                            if (isset($routes_data['"admin.' . $child . '"']) && $routes_data['"admin.' . $child . '"']['title'] && $routes_data['"admin.' . $child . '"']['icon'])
                                echo '<li class="' .$active.' menu-item"><a href="' . route('admin.'.$child) . '">' . $routes_data['"admin.' . $child . '"']['icon'] .  awtTrans($routes_data['"admin.' . $child . '"']['title']) . ' </a></li>';
                        }

                        echo '</ul></li>';
                    }
                } else {

                    if (in_array($value->getName(), $my_routes)) {
                        $active = $value->getName() == Route::currentRouteName() ? 'active' : '';
                        $open = $value->getName() == Route::currentRouteName() ? 'open' : '';

                        echo '<li class="nav-item '.$open.'"><a href="' . route($value->getName()) . '" class="' . $active . '">' . $value->getAction()['icon'] . ' <span class="menu-title" data-i18n="nav.scrumboard.main">' . awtTrans($value->getAction()['title']) . ' </span>  </a></li>';
                    }
                }
            }
        }
    }
}

function addRole()
{

    $routes = Route::getRoutes();
    $routes_data = [];
    $id = 0;
    foreach ($routes as $route)
        if ($route->getName())
            $routes_data['"' . $route->getName() . '"'] = ['title' => isset($route->getAction()['title']) ? $route->getAction()['title'] : null];

    foreach ($routes as $value) {

        if (isset($value->getAction()['title']) && isset($value->getAction()['type']) && $value->getAction()['type'] == 'parent') {


            $parent_class = 'gtx_' . $id++;
            echo '


                    <div class="col-md-3">
                        <div class="card permissionCard package bg-white shadow">
                            <div class="role-title text-white">
                                <div>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permissions[]" value="' . $value->getName() . '" id="' . $parent_class . '" class="roles-parent">
                                        <label for="' . $parent_class . '" dir="ltr"></label>
                                    </div>
                                    <label class="text-white" for="' . $parent_class . '">' . awtTrans($value->getAction()["title"]) . '</label>
                                </div>
                            </div>';


            if (isset($value->getAction()['child']) && count($value->getAction()['child'])) {

                echo '<ul class="list-unstyled">';

                foreach ($value->getAction()['child'] as $key => $child) {


                    echo '<li>
                             <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox"  name="permissions[]" value="admin.' . $child . '"  id="' . $value->getName() . $key . '" class="' . $parent_class . '">
                                    <label for="' . $value->getName() . $key . '" dir="ltr"></label>
                                </div>
                                <label for="' . $value->getName() . $key . '"> ' . awtTrans($routes_data['"admin.' . $child . '"']['title']) . '</label>
                            </div>

                        </li>';
                }
                echo '</ul>';
            }

            echo '</div></div>';
        }
    }
}

function editRole($id)
{

    $routes         = Route::getRoutes();
    $routes_data    = [];
    $my_routes      = Permission::where('role_id', $id)->pluck('permission')->toArray();
    $id = 0;
    foreach ($routes as $route)
        if ($route->getName())
            $routes_data['"' . $route->getName() . '"'] = ['title' => isset($route->getAction()['title']) ? $route->getAction()['title'] : null];

    foreach ($routes as $value) {

        if (isset($value->getAction()['title']) && isset($value->getAction()['type']) && $value->getAction()['type'] == 'parent') {

            $select = in_array($value->getName(), $my_routes)  ? 'checked' : '';
            $parent_class = 'gtx_' . $id++;
            echo '


                    <div class="col-md-3">
                        <div class="card permissionCard package bg-white shadow">
                            <div class="role-title text-white">
                                <div >
                                    <div class="icheck-primary d-inline" >
                                            <input type="checkbox" name="permissions[]" value="' . $value->getName() . '" id="' . $parent_class . '" class="roles-parent" ' . $select . '>
                                            <label for="' . $parent_class . '" dir="ltr"></label>
                                    </div>
                                    <label class="text-white" for="' . $parent_class . '">' . awtTrans($value->getAction()["title"]) . '</label>
                                </div>
                            </div>';



            if (isset($value->getAction()['child']) && count($value->getAction()['child'])) {

                echo '<ul class="list-unstyled mt-2">';

                foreach ($value->getAction()['child'] as $key => $child) {

                    $select = in_array('admin.' . $child, $my_routes)  ? 'checked' : '';
                    echo '<li>
                             <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox"  name="permissions[]" value="admin.' . $child . '"  id="' . $value->getName() . $key . '" class="' . $parent_class . '" ' . $select . '>
                                    <label for="' . $value->getName() . $key . '" dir="ltr"></label>
                                </div>
                                <label for="' . $value->getName() . $key . '"> ' . awtTrans($routes_data['"admin.' . $child . '"']['title']) . '</label>
                            </div>

                        </li>';
                }
                echo '</ul>';
            }

            echo '</div></div>';
        }
    }
}
