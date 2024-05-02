<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateJenisOrderProduksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_order_produksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode', 2);
            $table->string('jenis', 50);
            $table->timestamps();
            $table->index('kode');
        });

        $current_time = now();
        $jenis_order_produksis = [
            ['id' => 1, 'kode' => '01', 'jenis' => 'Order'],
            ['id' => 2, 'kode' => '02', 'jenis' => 'FF'],
            ['id' => 3, 'kode' => '03', 'jenis' => 'Repair'],
            ['id' => 4, 'kode' => '04', 'jenis' => 'FFR'],
            ['id' => 5, 'kode' => '05', 'jenis' => 'Order - FF'],
            ['id' => 6, 'kode' => '06', 'jenis' => 'Order - FFR'],
            ['id' => 7, 'kode' => '07', 'jenis' => 'Order - Repair'],
            ['id' => 8, 'kode' => '08', 'jenis' => 'FF - FFR'],
            ['id' => 9, 'kode' => '09', 'jenis' => 'FF - Repair'],
            ['id' => 10, 'kode' => '10', 'jenis' => 'FFR - Repair'],
            ['id' => 11, 'kode' => '11', 'jenis' => 'Order - FF- FFR'],
            ['id' => 12, 'kode' => '12', 'jenis' => 'Order - FF- FFR - Repair'],
            ['id' => 13, 'kode' => '13', 'jenis' => 'Order - FF- Repair'],
        ];
        try {
            foreach ($jenis_order_produksis as $jenis_order_produksi) {
                $existingData = DB::table('jenis_order_produksi')
                    ->where('kode', $jenis_order_produksi['kode'])
                    ->where('jenis', $jenis_order_produksi['jenis'])
                    ->first();
                if (!$existingData) {
                    $jenis_order_produksi['created_at'] = $current_time;
                    $jenis_order_produksi['updated_at'] = $current_time;
                    DB::table('jenis_order_produksi')->insert($jenis_order_produksi);
                }
            }
            return response()->json(['success' => 'Data baru berhasil ditambahkan dari Preset.']);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => [$th->getMessage()]
            ], 500);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_order_produksi');
    }
}
