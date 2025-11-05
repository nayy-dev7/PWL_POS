<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LevelModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class LevelController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Level Pengguna',
            'list' => ['Home', 'Level']
        ];

        $page = (object)[
            'title' => 'Daftar Level Pengguna'
        ];

        $activeMenu = 'level'; // untuk sidebar

        return view('level.index', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function list(Request $request)
    {
        $levels = LevelModel::select('level_id', 'level_kode', 'level_nama');

        return DataTables::of($levels)
            ->addIndexColumn()
            ->addColumn('aksi', function ($level) {
                $btn  = '<a href="' . url('/level/' . $level->level_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/level/' . $level->level_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/level/' . $level->level_id) . '">' .
                        csrf_field() . method_field('DELETE') .
                        '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin hapus data ini?\')">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Level',
            'list' => ['Home', 'Level', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah Level Baru'
        ];

        $activeMenu = 'level';

        return view('level.create', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'level_kode' => 'required|unique:m_level,level_kode',
            'level_nama' => 'required'
        ]);

        LevelModel::create([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama
        ]);

        return redirect('/level')->with('success', 'Data level berhasil ditambahkan');
    }

    public function show($id)
    {
        $level = LevelModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Detail Level',
            'list' => ['Home', 'Level', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail Level Pengguna'
        ];

        $activeMenu = 'level';

        return view('level.show', compact('breadcrumb', 'page', 'activeMenu', 'level'));
    }

    public function edit($id)
    {
        $level = LevelModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Edit Level',
            'list' => ['Home', 'Level', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit Data Level'
        ];

        $activeMenu = 'level';

        return view('level.edit', compact('breadcrumb', 'page', 'activeMenu', 'level'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'level_kode' => 'required|unique:m_level,level_kode,' . $id . ',level_id',
            'level_nama' => 'required'
        ]);

        $level = LevelModel::find($id);
        $level->update([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama
        ]);

        return redirect('/level')->with('success', 'Data level berhasil diubah');
    }

    public function destroy($id)
    {
        $level = LevelModel::find($id);
        if ($level) {
            $level->delete();
            return redirect('/level')->with('success', 'Data level berhasil dihapus');
        }
        return redirect('/level')->with('error', 'Data tidak ditemukan');
    }
    public function create_ajax()
{
    return view('level.create_ajax');
}

public function store_ajax(Request $request)
{
    if ($request->ajax() || $request->wantsJson()) {
        $rules = [
            'level_kode' => 'required|string|min:2|unique:m_level,level_kode',
            'level_nama' => 'required|string|max:100'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi Gagal!',
                'msgField' => $validator->errors()
            ]);
        }

        try {
            LevelModel::create($request->only(['level_kode', 'level_nama']));
            return response()->json([
                'status' => true,
                'message' => 'Data level berhasil ditambahkan!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ]);
        }
    }

    return response()->json([
        'status' => false,
        'message' => 'Bukan request AJAX'
    ]);
}

public function edit_ajax($id)
{
    $level = LevelModel::find($id);
    return view('level.edit_ajax', compact('level'));
}

public function update_ajax(Request $request, $id)
{
    if ($request->ajax() || $request->wantsJson()) {
        $rules = [
            'level_kode' => 'required|string|min:2|unique:m_level,level_kode,' . $id . ',level_id',
            'level_nama' => 'required|string|max:100'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi Gagal!',
                'msgField' => $validator->errors()
            ]);
        }

        try {
            $level = LevelModel::find($id);
            $level->update($request->only(['level_kode', 'level_nama']));
            return response()->json([
                'status' => true,
                'message' => 'Data level berhasil diperbarui!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ]);
        }
    }

    return response()->json([
        'status' => false,
        'message' => 'Bukan request AJAX'
    ]);
}

public function confirm_ajax($id)
{
    $level = LevelModel::find($id);
    return view('level.confirm_ajax', compact('level'));
}

public function destroy_ajax(Request $request, $id)
{
    if ($request->ajax() || $request->wantsJson()) {
        try {
            $level = LevelModel::find($id);
            if (!$level) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
            $level->delete();
            return response()->json([
                'status' => true,
                'message' => 'Data level berhasil dihapus!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ]);
        }
    }

    return response()->json([
        'status' => false,
        'message' => 'Bukan request AJAX'
    ]);
}

}
