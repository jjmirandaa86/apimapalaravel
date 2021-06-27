<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;

class VisitController extends Controller
{
    // GET DATA X VISIT DATE
    //======================
    public function getXVisitaDate(Request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $state = $request->input('state');

        return Visit::whereBetween('visitDate', [$startDate, $endDate])
            ->where("state", $state)
            ->orderBy('visitDate', 'ASC')
            ->orderBy('idRoute', 'ASC')
            ->orderBy('correlativeVisit', 'ASC')
            ->paginate(20);
    }

    // GET DATA X ID_ROUTE
    //======================
    public function getXIdRoute(Request $request)
    {
        $idRoute = $request->input('idRoute');
        $state = $request->input('state');

        return Visit::select("*")
            ->where("idRoute", $idRoute)
            ->where("state", $state)
            ->orderBy('visitDate', 'ASC')
            ->orderBy('idRoute', 'ASC')
            ->orderBy('correlativeVisit', 'ASC')
            ->paginate(20);
    }

    // GET DATA X DATE AND ROUTE
    //======================
    public function getXVisitDateidRoute(Request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $idRoute = $request->input('idRoute');
        $state = $request->input('state');

        return Visit::whereBetween('visitDate', [$startDate, $endDate])
            ->where("idRoute", $idRoute)
            ->where("state", $state)
            ->orderBy('visitDate', 'ASC')
            ->orderBy('idRoute', 'ASC')
            ->orderBy('correlativeVisit', 'ASC')
            ->paginate(20);
    }

    // GET DATA X DATE AND ROUTE AND TYPEVISIT
    //======================
    public function getXVisitDateidRouteTypeVisit(Request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $idRoute = $request->input('idRoute');
        $typeVisit = $request->input('typeVisit');
        $state = $request->input('state');

        return Visit::whereBetween('visitDate', [$startDate, $endDate])
            ->where("idRoute", $idRoute)
            ->where("typeVisit", $typeVisit)
            ->where("state", $state)
            ->orderBy('visitDate', 'ASC')
            ->orderBy('idRoute', 'ASC')
            ->orderBy('correlativeVisit', 'ASC')
            ->paginate(20);
    }
}
