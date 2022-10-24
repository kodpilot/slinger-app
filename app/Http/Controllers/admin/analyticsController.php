<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;
use Carbon\Carbon;
class analyticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($startDate=null,$endDate=null,Request $request)
    {   
    
        switch ($startDate) {
            case null:
                $timeSpace = Period::months(1);
                break;

            case 'yesterday':
                $startDate  = Carbon::yesterday();
                $endDate    = Carbon::today();
                break;
            case 'lastOneWeek':
                $startDate  = Carbon::now()->subDays(7);
                $endDate    = Carbon::now();
                break;

            case 'thisMounth':
                $startDate  = Carbon::now()->startOfMonth();
                $endDate    = Carbon::now();
                break;

            case 'lastThirtyDay':
                $startDate  = Carbon::now()->subDays(30);
                $endDate    = Carbon::now();
                break;

            case 'lastOneYear':
                $startDate  = Carbon::now()->subYear();
                $endDate    = Carbon::now();
                break;
            case 'special':
                $startDate  = Carbon::parse($request->startDate);
                $endDate    = Carbon::parse(($request->endDate));
                break;
        }

        if ($startDate != null) {
            $timeSpace = Period::create($startDate, $endDate);
        }
        

        $AnalyticsSessions = Analytics::performQuery($timeSpace,'ga:sessions',['metrics' => 'ga:sessions,ga:pageviews,ga:sessionDuration,ga:exits','dimensions' => 'ga:source,ga:medium','sort' => '-ga:sessions']); // 0 => nereden, 1=>nasıl, 2=> kaç kişi,4=>süre,5=>aniden çıkma  //(url)
        $AnalyticsWhere = Analytics::performQuery($timeSpace,'ga:sessions',['metrics' => 'ga:sessions','dimensions' => 'ga:country','sort' => '-ga:sessions'])->rows; //0=>nereden,1=>kaç kişi //konum nereden (ülke)
        $AnalyticsBrowsers = Analytics::fetchTopBrowsers($timeSpace); // tarayıcılar
        $AnalyticsCustomers = Analytics::fetchUserTypes($timeSpace);  // önceden siteye geldi mi? ilk defa mı geliyor?
        $AnalyticsWhichUrl =Analytics::fetchTopReferrers($timeSpace,1000); // hangi linkten gelenler
        $AnalyticsFavorites = Analytics::fetchMostVisitedPages($timeSpace,8); // sitede hangi linklerde durdular
        $AnalyticsDevice = Analytics::performQuery($timeSpace,'ga:sessions',['metrics' => 'ga:sessions','dimensions' => 'ga:deviceCategory','sort' => '-ga:sessions'])->rows;//Cihaz 
        $AnalyticsWhichHour = Analytics::performQuery($timeSpace,'ga:sessions',['metrics' => 'ga:sessions','dimensions' => 'ga:hour','sort' => '-ga:sessions'])->rows; // 0=>saat 1=>session
        $AnalyticsCitys = Analytics::performQuery($timeSpace,'ga:sessions',['metrics' => 'ga:sessions','dimensions' => 'ga:city','sort' => '-ga:sessions'])->rows;//iller
        $jsonWhereVisited = countryCodes($AnalyticsWhere);
        
        // dd());
        
        return view('admin.analytics.index',compact('AnalyticsSessions','jsonWhereVisited','AnalyticsWhere','AnalyticsBrowsers','AnalyticsWhichHour','AnalyticsCustomers','AnalyticsDevice','AnalyticsFavorites','AnalyticsCitys'));
    }

}
