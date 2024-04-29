<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receive;

class ReceiveController extends Controller
{
    public function uploadReceives(Request $request)
    {
        try {
            $receivesData = $request->all();
            
            foreach ($receivesData as $receiveData) {
                Receive::create([
                    'id' => $receiveData['id'],
                    'nomororder' => $receiveData['nomororder'],
                    'customer_name' => $receiveData['customer_name'],
                    'id_buyer' => $receiveData['id_buyer'],
                    'id_jenis_order' => $receiveData['id_jenis_order'],
                    'qty' => $receiveData['qty'],
                    'tglorder' => $receiveData['tglorder'],
                    'tglmasuk' => $receiveData['tglmasuk'],
                    'flagproses' => $receiveData['flagproses'],
                    'flagkirimbuyer' => $receiveData['flagkirimbuyer'],
                    'status' => $receiveData['status'],
                ]);
            }
            
            return response()->json(['message' => 'Receives uploaded successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function createReceive()
    {
        try {
            Receive::create([
                'id' => 1,
                'nomororder' => '00001',
                'customer_name' => 'Test',
                'id_buyer' => 1,
                'id_jenis_order' => 1,
                'qty' => 1,
                'tglorder' => '2024-01-01',
                'tglmasuk' => '2024-01-01',
                'flagproses' => 1,
                'flagkirimbuyer' => 1,
                'status' => 1,
            ]);
            
            return response()->json(['message' => 'Receives uploaded successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
