<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LinkFormRequest;
use App\Link;

class LinksController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LinkFormRequest $request)
    {
        $link = Link::where('url', $request->link)->first();
        if ($link) {
            return back()->with('link', $link->hash);
        }

        do {
            $hash = str_random(6); 
        }
        while (Link::where('hash', $hash)->count() > 0);

        Link::create(['url' => $request->link, 'hash' => $hash]);
        return back()->with('link', $hash);
    }

    /**
         * Redirect.
         *
         * @return \Illuminate\Http\Response
         */
    public function redirect($hash) {
        $link = Link::where('hash', $hash)->first();
        if ($link) {
            return redirect($link->url);
        }
        return abort(404);
    }
}
