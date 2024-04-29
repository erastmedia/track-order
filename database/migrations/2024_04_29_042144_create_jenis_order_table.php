<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateJenisOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode', 2);
            $table->string('jenis', 50);
            $table->timestamps();
            $table->index('kode');
        });

        $current_time = now();
        $jenis_orders = [
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
            foreach ($jenis_orders as $jenis_order) {
                $existingData = DB::table('jenis_order')
                    ->where('kode', $jenis_order['kode'])
                    ->where('jenis', $jenis_order['jenis'])
                    ->first();
                if (!$existingData) {
                    $jenis_order['created_at'] = $current_time;
                    $jenis_order['updated_at'] = $current_time;
                    DB::table('jenis_order')->insert($jenis_order);
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
        Schema::dropIfExists('jenis_order');
    }
}
