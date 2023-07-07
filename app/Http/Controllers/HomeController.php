<?php

namespace App\Http\Controllers;

use App\Helpers\AlphabetIdConverter;
use App\Models\Link;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class HomeController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('welcome');
    }

    /**
     * @param $shortLink
     * @return Redirector|RedirectResponse
     * @throws \Exception
     */
    public function redirect($shortLink):Redirector|RedirectResponse
    {
        if ($link = Link::query()->where('id', AlphabetIdConverter::convertToId($shortLink))->first()){
            return redirect($link->original_link);
        }

        abort(404);
    }
}
