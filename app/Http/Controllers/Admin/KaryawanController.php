<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Repositories\Contracts\KaryawanContract;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    protected $title, $repo, $response;
    protected $file_path = 'uploads/anggota-cluster';

    public function __construct(KaryawanContract $repo)
    {
        $this->title = 'karyawan';
        $this->repo = $repo;
    }

    public function index()
    {
        try {
            $title = $this->title;
            return view('admin.' . $title . '.index', compact('title'));
        } catch (\Exception $e) {
            return response()->json(["e" => $e->getMessage()]);
        }
    }

    public function data(Request $request)
    {
        try {
            $title = $this->title;
            $data = $this->repo->paginated($request->all());
            $perPage = $request->per_page == '' ? 5 : $request->per_page;
            $view = view('admin.' . $title . '.data', compact('data', 'title'))->with('i', ($request->input('page', 1) -
                1) * $perPage)->render();
            return response()->json([
                "total_page" => $data->lastpage(),
                "total_data" => $data->total(),
                "html"       => $view,
            ]);
        } catch (\Exception $e) {
            return response()->json(["e" => $e->getMessage()]);
        }
    }

    public function create()
    {
        try {
            $title = $this->title;
            return view('admin.' . $title . '.form', compact('title',));
        } catch (\Exception $e) {
            return view('errors.message', ['message' => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            $req = $request->all();

            $data = $this->repo->store($req);
            return response()->json(['data' => $data, 'success' => true]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    // public function show($id)
    // {
    //     try {
    //         $data = $this->repo->find($id);
    //         return response()->json($data);
    //     } catch (\Exception $e) {
    //         return view('errors.message', ['message' => $e->getMessage()]);
    //     }
    // }


    public function edit($id)
    {
        try {
            $title = $this->title;
            $data = $this->repo->find($id);

            return view('admin.' . $title . '.form', compact('title', 'data'));
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        try {
            $req = $request->all();
            $data = $this->repo->update($req, $request->id);
            // dd($data);
            return response()->json(['data' => $data, 'success' => true]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        try {
            $data = $this->repo->delete($id);
            return response()->json($data);
        } catch (\Exception $e) {
            return view('errors.message', ['message' => $e->getMessage()]);
        }
    }
}
