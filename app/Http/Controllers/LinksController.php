<?php

namespace Shorty\Http\Controllers;

use Illuminate\Http\Request;

use Shorty\Http\Requests;
use Shorty\Http\Requests\LinkFormRequest;
use Shorty\Link;
use Shorty\User;

class LinksController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Auth::check()) {
            $user = \Auth::user();
            $links = Link::where('user_id', $user->id)->get();
            return view('links.create', compact('links'));
        }
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
        } while (Link::where('hash', $hash)->count() > 0);

        if (\Auth::check()) {
            $user = \Auth::user();
            Link::create(['url' => $request->link, 'hash' => $hash, 'user_id' => $user->id]);
            return back()->with('link', $hash);
        }

        Link::create(['url' => $request->link, 'hash' => $hash]);
        return back()->with('link', $hash);
    }

    /**
         * Redirect to specific url.
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
