<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Receive;
use Illuminate\Http\Request;
use DataTables;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $buyers = Buyer::pluck('namabuyer', 'kodebuyer');
        return view('home', compact('buyers'));
    }

    public function filterAll(Request $request)
    {
        $this->middleware('auth');
        
        if ($request->ajax()) {
            
            if (Auth::user()->kodebuyer=='adm') {
                
                $data = Receive::leftjoin('keterangan', 'keterangan.id_receive', '=', 'receive.id')
                ->leftjoin('jenis_order', 'jenis_order.id', '=', 'receive.id_jenis_order')
                ->leftjoin('buyer', 'buyer.id', '=', 'receive.id_buyer')
                ->select(['receive.id', 'receive.nomororder', 'receive.qty', 'jenis_order.jenis', 'receive.tglorder', 'receive.tglmasuk', 'receive.status', 'keterangan.notes', 'receive.customer_name'])
                ->where('receive.status', '=', $request->stat_prod)
                ->where('buyer.kodebuyer', '=', $request->kode_buyer)
                ->orderBy('receive.tglorder', 'asc')
                ->orderBy('receive.nomororder', 'asc');
                
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-xs">Detail'. $row->id.'</a>';
                            return $btn;
                    })
                    ->rawColumns(['action', 'status', 'notes'])
                    ->make(true);
            } else {
                $data = Receive::leftjoin('keterangan', 'keterangan.id_receive', '=', 'receive.id')
                ->leftjoin('jenis_order', 'jenis_order.id', '=', 'receive.id_jenis_order')
                ->leftjoin('buyer', 'buyer.id', '=', 'receive.id_buyer')
                ->select(['receive.id', 'receive.nomororder', 'receive.qty', 'jenis_order.jenis', 'receive.tglorder', 'receive.tglmasuk', 'receive.status', 'keterangan.notes', 'receive.customer_name'])
                ->where('receive.status', '=', $request->stat_prod)
                ->where('buyer.kodebuyer', '=', Auth::user()->kodebuyer)
                ->orderBy('receive.tglorder', 'asc')
                ->orderBy('receive.nomororder', 'asc');
                
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-xs">Detail'. $row->id.'</a>';
                            return $btn;
                    })
                    ->rawColumns(['action', 'status', 'notes'])
                    ->make(true);
            }
        }
        return view('home');
    }
}
