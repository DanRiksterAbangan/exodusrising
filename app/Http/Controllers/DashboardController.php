<?php

namespace App\Http\Controllers;

use App\Models\TopupTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard(){

        $data = Cache::remember("admin-dashboard-cache", 60 * 5, function () {
            //GROSS REVENUE
            $totalBuyAmount = DB::table("topup_transactions")->where("status","approved")->sum("amount");
            $topups = DB::table("topup_transactions")->selectRaw("status,count(id) as count")->groupBy("status")->get();
            //MINTED RPS
            $totalBuyRPS = $totalBuyAmount * 10;
            $totalGiftCodesRPS = DB::table("gift_codes")->where("status","claimed")->sum("rps_amount");
            $totalStreamerRPS = $totalBuyRPS * 0.1;
            $totalMintedRPS = $totalBuyRPS + $totalGiftCodesRPS + $totalStreamerRPS;

            //GIFTCODES
            $giftcodes = DB::table("gift_codes")->selectRaw("status,count(id) as count")->groupBy("status")->get();

            //COMMISSIONS
            $totalStreamerCommissionAmount = DB::table("topup_transactions")->where("status","approved")->where("streamer_code","<>",null)->sum("amount") * 0.1;

            return [
                "totalBuyRPS" => $totalBuyRPS,
                "totalGiftCodesRPS" => $totalGiftCodesRPS,
                "totalStreamerRPS" => $totalStreamerRPS,
                "totalMintedRPS" => $totalMintedRPS,
                "topups" => $topups,
                "totalBuyAmount" => $totalBuyAmount,
                "giftcodes" => $giftcodes,
                "totalStreamerCommissionAmount" => $totalStreamerCommissionAmount
            ];
        });

        $totalBuyRPS = $data["totalBuyRPS"];
        $totalGiftCodesRPS = $data["totalGiftCodesRPS"];
        $totalStreamerRPS = $data["totalStreamerRPS"];
        $totalMintedRPS = $data["totalMintedRPS"];
        $topups = $data["topups"];
        $totalBuyAmount = $data["totalBuyAmount"];
        $giftcodes = $data["giftcodes"];
        $totalStreamerCommissionAmount = $data["totalStreamerCommissionAmount"];


        return view("pages.admin.dashboard",compact("totalBuyRPS","totalGiftCodesRPS","totalStreamerRPS","totalMintedRPS","topups","totalBuyAmount","giftcodes","totalStreamerCommissionAmount"));
    }
}
