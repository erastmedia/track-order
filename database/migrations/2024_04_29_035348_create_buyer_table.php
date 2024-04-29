<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateBuyerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kodebuyer', 3);
            $table->string('namabuyer', 100);
            $table->timestamps();
            $table->index('kodebuyer');
        });

        $current_time = now();
        $buyers = [
            ['id' => 1, 'kodebuyer' => '001', 'namabuyer' => 'HAIRWARE'],
            ['id' => 2, 'kodebuyer' => '002', 'namabuyer' => 'HAIRVISIONS'],
            ['id' => 3, 'kodebuyer' => '003', 'namabuyer' => 'HAIR U WEAR INC.'],
            ['id' => 4, 'kodebuyer' => '004', 'namabuyer' => 'JON RENAU'],
            ['id' => 5, 'kodebuyer' => '005', 'namabuyer' => 'NJ PARIS'],
            ['id' => 6, 'kodebuyer' => '006', 'namabuyer' => 'INTERNATIONAL HAIRGOOD INC.'],
            ['id' => 7, 'kodebuyer' => '007', 'namabuyer' => 'NEW IMAGE'],
            ['id' => 8, 'kodebuyer' => '008', 'namabuyer' => 'HAIR CLUB'],
            ['id' => 9, 'kodebuyer' => '009', 'namabuyer' => 'HAIR WORLD'],
            ['id' => 10, 'kodebuyer' => '010', 'namabuyer' => 'HAIR DEVELOPMENT'],
            ['id' => 11, 'kodebuyer' => '011', 'namabuyer' => 'HIS & HER'],
            ['id' => 12, 'kodebuyer' => '012', 'namabuyer' => 'CHUNIL'],
            ['id' => 13, 'kodebuyer' => '013', 'namabuyer' => 'DENING HAIR CO.'],
            ['id' => 14, 'kodebuyer' => '014', 'namabuyer' => 'HAIR REGENESIS CLINIC'],
            ['id' => 15, 'kodebuyer' => '015', 'namabuyer' => 'HAIR PIECE DIRECT'],
            ['id' => 16, 'kodebuyer' => '016', 'namabuyer' => 'ADVANCE HAIR STUDIO'],
            ['id' => 17, 'kodebuyer' => '017', 'namabuyer' => 'MAYQUEL'],
            ['id' => 18, 'kodebuyer' => '018', 'namabuyer' => 'JP HAIR SALON'],
            ['id' => 19, 'kodebuyer' => '019', 'namabuyer' => 'INT. YULIAM'],
            ['id' => 20, 'kodebuyer' => '020', 'namabuyer' => 'DIMPLES'],
            ['id' => 21, 'kodebuyer' => '021', 'namabuyer' => 'LEADING MAN'],
            ['id' => 22, 'kodebuyer' => '022', 'namabuyer' => 'CAMAFLEX'],
            ['id' => 23, 'kodebuyer' => '023', 'namabuyer' => 'SANANTONE LTD TRADING'],
            ['id' => 24, 'kodebuyer' => '024', 'namabuyer' => 'JOSEPH PARIS'],
            ['id' => 25, 'kodebuyer' => '025', 'namabuyer' => 'ELLEDI COSMETICA'],
            ['id' => 26, 'kodebuyer' => '026', 'namabuyer' => 'HCM'],
            ['id' => 27, 'kodebuyer' => '027', 'namabuyer' => 'ELLEN WILLE'],
            ['id' => 28, 'kodebuyer' => '028', 'namabuyer' => 'STARSA'],
            ['id' => 29, 'kodebuyer' => '029', 'namabuyer' => 'ONTARIO INC'],
            ['id' => 30, 'kodebuyer' => '030', 'namabuyer' => 'INTEGRAL HAIR SOLUTIONS'],
            ['id' => 31, 'kodebuyer' => '031', 'namabuyer' => 'RUBY'],
            ['id' => 32, 'kodebuyer' => '032', 'namabuyer' => 'COMPLEMENT\'HAIR'],
            ['id' => 33, 'kodebuyer' => '033', 'namabuyer' => 'TOUP FRANCOLINI'],
            ['id' => 34, 'kodebuyer' => '034', 'namabuyer' => 'HELENA'],
            ['id' => 35, 'kodebuyer' => '035', 'namabuyer' => 'ADERANS'],
            ['id' => 36, 'kodebuyer' => '036', 'namabuyer' => 'AMEKOR'],
            ['id' => 37, 'kodebuyer' => '037', 'namabuyer' => 'FAIR FASHION'],
            ['id' => 38, 'kodebuyer' => '038', 'namabuyer' => 'GISELA MAYER'],
            ['id' => 39, 'kodebuyer' => '039', 'namabuyer' => 'HAIR CLUB HU'],
            ['id' => 40, 'kodebuyer' => '040', 'namabuyer' => 'HAIR INSPIRA'],
            ['id' => 41, 'kodebuyer' => '041', 'namabuyer' => 'FINKERS HAIR DESIGN'],
            ['id' => 42, 'kodebuyer' => '042', 'namabuyer' => 'EXECUTIVE HAIR SUPPLIERS'],
            ['id' => 43, 'kodebuyer' => '043', 'namabuyer' => 'SMART HAIR SHOPPER'],
            ['id' => 44, 'kodebuyer' => '044', 'namabuyer' => 'WIGS AMOR/CELAH WIGS'],
            ['id' => 45, 'kodebuyer' => '045', 'namabuyer' => 'NATURE HAIR CENTRES LTD'],
            ['id' => 46, 'kodebuyer' => '046', 'namabuyer' => 'ADVANCED HAIR PRODUCTS'],
            ['id' => 47, 'kodebuyer' => '047', 'namabuyer' => 'LORD HAIR'],
            ['id' => 48, 'kodebuyer' => '048', 'namabuyer' => 'INSERT HAIR'],
        ];
        try {
            foreach ($buyers as $buyer) {
                $existingData = DB::table('buyer')
                    ->where('kodebuyer', $buyer['kodebuyer'])
                    ->where('namabuyer', $buyer['namabuyer'])
                    ->first();
                if (!$existingData) {
                    $buyer['created_at'] = $current_time;
                    $buyer['updated_at'] = $current_time;
                    DB::table('buyer')->insert($buyer);
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
        Schema::dropIfExists('buyer');
    }
}
