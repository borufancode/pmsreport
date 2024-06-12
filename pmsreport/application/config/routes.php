<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'ReportDashboard/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['regional-dashboard'] = "ReportDashboard/index";
$route['dashboard/(:any)'] = "ReportDashboard/index/$1";

$route['asset-count-report/(:any)'] = "ReportDashboard/AssetCountSheetReport/$1";
$route['asset-count-report-filter/(:any)'] = "ReportDashboard/AssetCountSheetReportFilter/$1";
$route['all-asset-count-sheet-report'] = "ReportDashboard/AllAssetCountSheetReport";


$route['fixed-asset-count-summary-report-filter/(:any)'] = "ReportDashboard/AssetCountSummarySheetReportFilter/$1";
$route['all-asset-count-summary-sheet-report'] = "ReportDashboard/AllAssetCountSummarySheetReport";

$route['stock-taking-sheet-filter/(:any)'] = "ReportDashboard/StockTackingSheetFilter/$1";
$route['all-stock-taking-sheet-report'] = "ReportDashboard/AllStockTakingSheetReport";
//Asset Disposal Report

$route['asset-disposal-filter/(:any)'] = "ReportDashboard/AssetDisposalReportFilter/$1";
$route['all-asset-disposal-report'] = "ReportDashboard/AllAssetDisposalReport";
//Asset Vehicles Report

$route['vehicles-summary-filter/(:any)'] = "ReportDashboard/VehicleSummaryReportFilter/$1";
$route['all-vehicles-summary-report'] = "ReportDashboard/VehicleSummaryReport";

//Asset Asset Value Report
$route['asset-value-report-filter/(:any)'] = "ReportDashboard/AssetValueReportFilter/$1";
$route['all-asset-value-report'] = "ReportDashboard/AssetValueReport";

//Asset Value Sammary Report
$route['asset-value-summary-report-filter/(:any)'] = "ReportDashboard/AssetValueSummaryReportFilter/$1";
$route['all-asset-value-summary-report'] = "ReportDashboard/AssetValueSummaryReport";

//Report By Organizationt
$route['reportbyOrganization/(:any)'] = "ReportDashboard/ReportByOrganization/$1";
$route['summary-report-by-organization'] = "ReportDashboard/SummaryReportOrganization";
$route['generate-report-dashboard-by-office/(:any)'] = "ReportDashboard/GenerateDashboardByOfficeReport/$1";







