<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keterangan;

class KeteranganController extends Controller
{
    public function uploadKeterangan(Request $request)
    {
        try {
            $keterangansData = $request->all();
            
            foreach ($keterangansData as $keteranganData) {
                Keterangan::create([
                    'id_receive' => $keteranganData['id_receive'],
                    'id_batch' => $keteranganData['id_batch'],
                    'tgl1' => $keteranganData['tgl1'],
                    'comment1' => $keteranganData['comment1'],
                    'tgl2' => $keteranganData['tgl2'],
                    'comment2' => $keteranganData['comment2'],
                    'notes' => $keteranganData['notes'],
                    'tglmutakhir' => $keteranganData['tglmutakhir'],
                ]);
            }
            
            return response()->json(['message' => 'Keterangans uploaded successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function deleteKeterangans(Request $request)
    {
        $idreceives = $request->input('idreceives');

        // Menghapus komentar berdasarkan ID yang diterima
        try {
            $deleted = Keterangan::whereIn('id_receive', explode(', ', $idreceives))->delete();
            if ($deleted) {
                return response()->json(['message' => 'Keterangans berhasil dihapus.'], 200);
            } else {
                return response()->json(['message' => 'Tidak ada data Keterangan terhapus.'], 200);
            }
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return response()->json(['error' => 'Terjadi kesalahan saat menghapus Keterangan.'], 500);
        }
    }
}
