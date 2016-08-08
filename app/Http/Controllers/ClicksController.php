<?php

namespace Shorty\Http\Controllers;

use Illuminate\Http\Request;

use Shorty\Http\Requests;

class ClicksController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($link)
    {

        return view('links.show');
    }
}
