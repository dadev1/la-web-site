<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FrontendController extends Controller
{
    public function index() {
        return view('spa');
    }

    public function get_ias_cat_id() {
        $data = DB::table('applications')->where('app_name', 'IAS')->select('cat_id')->get();
        return response()->json($data);
    }

    public function get_checkout_category($app_id, $cat_id) {
        $app_name = 'IAS';
        switch ($app_id) {
            case '1':
                $app_name = 'IAS';
                break;
        }
        $category_data = DB::table('applications')->where('app_name', $app_name)->where('cat_id', $cat_id)->first();
        return response()->json($category_data);
    }

    public function get_dealer_checkout_category($app_id, $cat_id) {
        switch ($app_id) {
            case '1':
                $app_name = 'IAS';
                break;
        }
        $category_data = DB::table('applications')->where('app_name', $app_name)->where('cat_id', $cat_id)->first();
        return response()->json($category_data);
    }
    
    public function get_customer_transaction_by_userid($id) {
        $data = DB::table('transactions')->where('user_id', $id)->get();
        return response()->json($data);
    }

    public function get_customer_purchaselist_by_userid($id) {
        $data = DB::table('customer_purchases')->where('user_id', $id)->get();
        return response()->json($data);
    }

    public function get_purchaseID_by_userID($id) {
        $purchased_data = DB::table('customer_purchases')->where('user_id', $id)->leftJoin('applications', 'customer_purchases.cat_tab', '=', 'applications.category_tab')->select('customer_purchases.*', 'applications.cat_id')->get();

        return response()->json($purchased_data);
    }

    public function get_registered_customers() {
        $data = DB::table('customer_purchases')
        ->leftJoin('users', 'customer_purchases.user_id', '=', 'users.id')
        ->leftJoin('applications', 'customer_purchases.cat_tab', '=', 'applications.category_tab')
        ->select('customer_purchases.*', 'users.name', 'users.nikename', 'users.email', 'users.phone', 'users.role', 'users.permission', 'applications.id')->get();

        $customerData = array();

        foreach($data as $row){
            $customerMetadata = DB::table('customermetas')
            ->where('user_id', $row->user_id)
            ->select('*')->get();
            foreach($customerMetadata as $attr){
                $row->{$attr->key} = $attr->value;
            }
            array_push($customerData, $row);
        }

        return response()->json($customerData);
    }

    public function get_registered_dealers() {
        $data = DB::table('dealer_customers')
        ->leftJoin('users', 'dealer_customers.user_id', '=', 'users.id')
        ->leftJoin('applications', 'dealer_customers.app_id', '=', 'applications.id')
        ->select('dealer_customers.*', 'users.name', 'users.nikename', 'users.email', 'users.phone', 'users.role', 'users.permission', 'applications.app_name', 'applications.category_tab' , 'applications.period_date', 'applications.capacity')
        ->get();

        $dealerData = array();

        foreach($data as $row){
            $agencyMetadata = DB::table('agencymetas')
            ->where('user_id', $row->user_id)
            ->select('*')->get();
            foreach($agencyMetadata as $attr){
                $row->{$attr->key} = $attr->value;
            }
            array_push($dealerData, $row);
        }
    

        return response()->json($dealerData);
    }
}
