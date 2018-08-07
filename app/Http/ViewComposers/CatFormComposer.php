?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;

class CatFormComposer
{
    /**
     * The user repository implementation.
     *
     * @var Breed
     */
    protected $breeds;

    /**
     * Create a new profile composer.
     *
     * @param  Breed $breeds
     * @return void
     */
    public function __construct(Breed $breeds)
    {
        // Dependencies automatically resolved by service container...
        $this->breed = $breeds;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('count', $this->breeds->count());
    }
}