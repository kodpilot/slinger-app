<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\users;
use Analytics;
use Spatie\Analytics\Period;


class adminController extends Controller
{
  public function index()
  {

    $timeSpace          = Period::months(1);
    $AnalyticsSessions  = Analytics::performQuery($timeSpace, 'ga:sessions', ['metrics' => 'ga:sessions,ga:pageviews,ga:sessionDuration,ga:exits', 'dimensions' => 'ga:source,ga:medium', 'sort' => '-ga:sessions']); // 0 => nereden, 1=>nasıl, 2=> kaç kişi,4=>süre,5=>aniden çıkma  //(url)
    $AnalyticsWhere     = Analytics::performQuery($timeSpace, 'ga:sessions', ['metrics' => 'ga:sessions', 'dimensions' => 'ga:country', 'sort' => '-ga:sessions'])->rows; //0=>nereden,1=>kaç kişi //konum nereden (ülke)
    $AnalyticsBrowsers  = Analytics::fetchTopBrowsers($timeSpace); // tarayıcılar
    $AnalyticsCustomers = Analytics::fetchUserTypes($timeSpace);  // önceden siteye geldi mi? ilk defa mı geliyor?
    $AnalyticsWhichUrl  = Analytics::fetchTopReferrers($timeSpace, 1000); // hangi linkten gelenler
    $AnalyticsFavorites = Analytics::fetchMostVisitedPages($timeSpace, 8); // sitede hangi linklerde durdular
    $AnalyticsDevice    = Analytics::performQuery($timeSpace, 'ga:sessions', ['metrics' => 'ga:sessions', 'dimensions' => 'ga:deviceCategory', 'sort' => '-ga:sessions'])->rows; //Cihaz 
    $AnalyticsWhichHour = Analytics::performQuery($timeSpace, 'ga:sessions', ['metrics' => 'ga:sessions', 'dimensions' => 'ga:hour', 'sort' => '-ga:sessions'])->rows; // 0=>saat 1=>session
    $AnalyticsCitys     = Analytics::performQuery($timeSpace, 'ga:sessions', ['metrics' => 'ga:sessions', 'dimensions' => 'ga:city', 'sort' => '-ga:sessions'])->rows; //iller
    $jsonWhereVisited   = countryCodes($AnalyticsWhere);




    $totalUserCount     = users::where('active','1')->count();

    return view(
      'admin.index',
      compact(
        'totalUserCount',
        'AnalyticsSessions',
      )
    );
  }
  public function login()
  {

    return view('admin.login');
  }
}
