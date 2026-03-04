<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangModel;
use App\Models\KategoriModel;
use App\Models\SupplierModel;
use Yajra\DataTables\Facades\DataTables;

class BarangController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Barang',
            'list'  => ['Home', 'Barang']
        ];

        $page = (object)[
            'title' => 'Daftar barang'
        ];

        $activeMenu = 'barang';

        // Optional: untuk filter dropdown
        $kategori = KategoriModel::all();
        $supplier = SupplierModel::all();

        return view('barang.index', compact('breadcrumb', 'page', 'activeMenu', 'kategori', 'supplier'));
    }

    public function list(Request $request)
    {
        $barang = BarangModel::select(
                'barang_id',
                'barang_kode',
                'barang_nama',
                'kategori_id',
                'supplier_id',
                'harga_beli',
                'harga_jual'
            )
            ->with(['kategori', 'supplier']);

        if ($request->kategori_id) {
            $barang->where('kategori_id', $request->kategori_id);
        }
        if ($request->supplier_id) {
            $barang->where('supplier_id', $request->supplier_id);
        }

        return DataTables::of($barang)
            ->addIndexColumn()
            ->addColumn('kategori', fn($b) => $b->kategori->kategori_nama ?? '-')
            ->addColumn('supplier', fn($b) => $b->supplier->supplier_nama ?? '-')
            ->rawColumns(['kategori', 'supplier'])
            ->make(true);
    }
}