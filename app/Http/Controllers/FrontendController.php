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
    public function team()
    {
        return view('website-template.team');
    }

    /**
     * Display a listing of the resource.
     */
    public function partnerschaften()
    {
        return view('website-template.partnerschaften');
    }



    /**
     * Display a listing of the resource.
     */
    public function frauenkooperativeNoyanlar()
    {
        return view('website-template.projects.frauenkooperative-noyanla');
    }

    /**
     * Display a listing of the resource.
     */
    public function derTraumVomHoren()
    {
        return view('website-template.projects.velid');
    }

    /**
     * Display a listing of the resource.
     */
    public function turkeiErdbebenprojekt()
    {
        return view('website-template.projects.turkeiErdbebenprojekt');
    }

    /**
     * Display a listing of the resource.
     */
    public function patenschaft()
    {
        return view('website-template.projects.patenschaft');
    }

    /**
     * Display a listing of the resource.
     */
    public function childrenVillage()
    {
        return view('website-template.projects.children-in-village');
    }

    /**
     * Display a listing of the resource.
     */
    public function autonomyFoundation()
    {
        return view('website-template.projects.autonomy-foundation');
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
    public function werdenSieMitglied()
    {
        return view('website-template.werden-sie-mitglied');
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
    public function satzungDesVereins()
    {
        return view('website-template.policy.satzung-des-vereins');
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
