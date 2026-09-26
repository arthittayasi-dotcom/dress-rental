<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Dress;
use App\Models\Rental;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function index()
    {


        // รายได้รวม
        // ไม่นับรายการที่ปฏิเสธ

        $totalSales = Rental::where(
            'status',
            '!=',
            'rejected'
        )
        ->sum('total_price');





        // จำนวนรายการเช่าทั้งหมด

        $totalRentals = Rental::where(
            'status',
            '!=',
            'rejected'
        )
        ->count();






        // จำนวนชุดทั้งหมด

        $totalDresses = Dress::count();






        // คำขอรออนุมัติ

        $pendingRentals = Rental::where(
            'status',
            'pending'
        )
        ->count();






        // ชุดพร้อมเช่า

        $availableDresses = Dress::where(
            'status',
            'available'
        )
        ->count();






        // ชุดกำลังเช่า

        $rentingDresses = Dress::where(
            'status',
            'rented'
        )
        ->count();







        // รายได้วันนี้

        $todaySales = Rental::where(
            'status',
            '!=',
            'rejected'
        )
        ->whereDate(
            'created_at',
            today()
        )
        ->sum('total_price');








        // จำนวนรายการวันนี้

        $todayRentals = Rental::where(
            'status',
            '!=',
            'rejected'
        )
        ->whereDate(
            'created_at',
            today()
        )
        ->count();








        // รายได้เดือนนี้

        $monthSales = Rental::where(
            'status',
            '!=',
            'rejected'
        )
        ->whereMonth(
            'created_at',
            now()->month
        )
        ->whereYear(
            'created_at',
            now()->year
        )
        ->sum('total_price');








        // รายได้เดือนก่อน

        $lastMonthSales = Rental::where(
            'status',
            '!=',
            'rejected'
        )
        ->whereMonth(
            'created_at',
            now()->subMonth()->month
        )
        ->whereYear(
            'created_at',
            now()->subMonth()->year
        )
        ->sum('total_price');








        // ค่าเฉลี่ยต่อรายการ

        $averageRental = $totalRentals > 0
            ? $totalSales / $totalRentals
            : 0;









        // กราฟ 7 วันล่าสุด

        $chartData = Rental::where(
            'status',
            '!=',
            'rejected'
        )
        ->whereBetween(
            'created_at',
            [
                now()->subDays(6)->startOfDay(),
                now()->endOfDay()
            ]
        )
        ->get()
        ->groupBy(function($item){

            return Carbon::parse(
                $item->created_at
            )->format('d/m');

        })
        ->map(function($items){

            return $items->sum('total_price');

        });








        return view(
            'owner.dashboard',
            compact(
                'totalSales',
                'totalRentals',
                'totalDresses',
                'pendingRentals',
                'availableDresses',
                'rentingDresses',
                'todaySales',
                'todayRentals',
                'monthSales',
                'lastMonthSales',
                'averageRental',
                'chartData'
            )
        );


    }

}