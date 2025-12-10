<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function startseite()
    {
        return view('website-template.startseite');
    }

    /**
     * Display a listing of the resource.
     */
    public function entstehungsgeschichte()
    {
        return view('website-template.entstehungsgeschichte');
    }

    /**
     * Display a listing of the resource.
     */
    public function vorstand()
    {
        return view('website-template.vorstand');
    }

    /**
     * Display a listing of the resource.
     */
    public function team()
    {
        return view('website-template.team');
    }

    /**
     * Display a listing of the resource.
     */
    public function derTraumVomHoren()
    {
        return view('website-template.derTraumVomHoren');
    }

    /**
     * Display a listing of the resource.
     */
    public function turkeiErdbebenprojekt()
    {
        return view('website-template.turkeiErdbebenprojekt');
    }

    /**
     * Display a listing of the resource.
     */
    public function werdeAktiv()
    {
        return view('website-template.werdeAktiv');
    }

    /**
     * Display a listing of the resource.
     */
    public function spenden()
    {
        return view('website-template.spenden');
    }

    /**
     * Display a listing of the resource.
     */
    public function kontakt()
    {
        return view('website-template.kontakt');
    }

    /**
     * Display a listing of the resource.
     */
    public function agb()
    {
        return view('website-template.policy.agb');
    }

    /**
     * Display a listing of the resource.
     */
    public function impressum()
    {
        return view('website-template.policy.impressum');
    }

    /**
     * Display a listing of the resource.
     */
    public function datenschutzerklarung()
    {
        return view('website-template.policy.datenschutzerklarung');
    }
}
