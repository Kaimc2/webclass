<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\ScanType;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        Stock::with(['products', 'locations'])->paginate(5);
    }

    public function scan(Request $request)
    {
        $request->validate([
            "product_id" => "required|numeric",
            "location_id" => "required|numeric",
            "quantity" => "required|numeric",
            "type" => "required|string",
        ]);

        $inputs = $request->all();
        $stock = Stock::where("product_id", $inputs["product_id"])
            ->where("location_id", $inputs["location_id"])
            ->first();

        if ($stock) {
            switch ($inputs["type"]) {
                case ScanType::IN:
                    $stock->quantity += $inputs["quantity"];
                    break;
                case ScanType::OUT:
                    $stock->quantity -= $inputs["quantity"];
                    break;
            }
        } else {
            $stock = Stock::create([
                "product_id" => $inputs["productId"],
                "location_id" => $inputs["locationId"],
                "quantity" => $inputs["quantity"],
                "type" => $inputs["type"],
            ]);
        }

        return response()->json([
            "message" => "Stock scanned successfully",
            "data" => $stock,
        ]);
    }
}
