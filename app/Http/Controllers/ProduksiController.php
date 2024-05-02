<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produksi;

class ProduksiController extends Controller
{
    public function uploadProduksis(Request $request)
    {
        try {
            $produksisData = $request->all();
            
            foreach ($produksisData as $produksiData) {
                Produksi::create([
                    'id' => $produksiData['id'],
                    'id_receive' => $produksiData['id_receive'],
                    'kodeitem' => $produksiData['kodeitem'],
                    'id_jenis_order' => $produksiData['id_jenis_order'],
                    'pcs' => $produksiData['pcs'],
                    'tglkirim' => $produksiData['tglkirim'],
                    'tglkirimbaru' => $produksiData['tglkirimbaru'],
                    'tglkirimbed' => $produksiData['tglkirimbed'],
                    'tgldelivery' => $produksiData['tgldelivery'],
                    'hair' => $produksiData['hair'],
                    'base' => $produksiData['base'],
                    'venting' => $produksiData['venting'],
                    'final' => $produksiData['final'],
                    'cost' => $produksiData['cost'],
                    'flagapproval' => $produksiData['flagapproval'],
                    'tglapproval' => $produksiData['tglapproval'],
                    'qty' => $produksiData['qty'],
                    'flagkirimbuyer' => $produksiData['flagkirimbuyer'],
                    'flagproses' => $produksiData['flagproses'],
                ]);
            }
            
            return response()->json(['message' => 'Produksis uploaded successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function deleteProduksis(Request $request)
    {
        $ids = $request->input('ids');

        // Menghapus komentar berdasarkan ID yang diterima
        try {
            $deleted = Produksi::whereIn('id', explode(', ', $ids))->delete();
            if ($deleted) {
                return response()->json(['message' => 'Produksis berhasil dihapus.'], 200);
            } else {
                return response()->json(['message' => 'Tidak ada data Produksi terhapus.'], 200);
            }
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return response()->json(['error' => 'Terjadi kesalahan saat menghapus produksi.'], 500);
        }
    }
}
