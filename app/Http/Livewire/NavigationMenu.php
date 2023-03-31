<?php



namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class NavigationMenu extends Component
{
    public function render()
    {
        return view('livewire.navigation-menu', [
            'routes' => $this->getRoutes(),
            'user' => Auth::user(),
        ]);
    }

    private function getRoutes()
    {
        $routes = [
            'dashboard' => [
                'name' => 'Dashboard',
                'route' => 'dashboard',
                'active' => Route::currentRouteName() === 'dashboard',
            ],
            'users' => [
                'name' => 'Users',
                'route' => 'users.index',
                'active' => strpos(Route::currentRouteName(), 'users') !== false,
            ],
        ];

        return $routes;
    }
}
?>