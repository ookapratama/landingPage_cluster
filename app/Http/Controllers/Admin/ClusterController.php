<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Repositories\Contracts\ClusterContract;
use App\Models\UserCluster;

class ClusterController extends Controller
{
    protected $title, $repo, $response, $userCluster;


    public function __construct(ClusterContract $repo, UserCluster $userCluster)
    {
        $this->title = 'clusters';
        $this->repo = $repo;
        $this->userCluster = $userCluster;
    }

    public function index()
    {
        try {
            $title = $this->title;
            return view('admin.' . $title . '.index', compact('title'));
        } catch (\Exception $e) {
            return view('errors.message', ['message' => $e->getMessage()]);
        }
    }

    public function data(Request $request)
    {
        try {
            $title = $this->title;
            $data = $this->repo->paginated($request->all());
            // $anggota = [];
            // foreach ($data as $key => $value) {
            //     foreach(explode(',', $value->anggota_cluster) as $a) {
            //         dump($value->anggota_cluster);
            //         dump($a);
            //         $anggota[] = $a;
            //         dump($anggota);
            //     }
            // }
            // dd($a);
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
            $userCluster = $this->userCluster::get();
            return view('admin.' . $title . '.form', compact('title', 'userCluster'));
        } catch (\Exception $e) {
            return view('errors.message', ['message' => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            $req = $request->all();
            // dd($req);
            foreach ($req['user_cluster_id'] as $anngota_cluster) {
                $data = $this->repo->store([
                    'user_id' => $anngota_cluster,
                    'shift' => $req['shift'],
                    'nama' => $req['nama'],
                ]);
            }
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
            $dataByCriteria = $this->repo->getByCriteria(['nama' => $data->nama]);
            $userCluster = $this->userCluster::get();
            $anggotaCluster = [];
            foreach ($dataByCriteria as $u) {
                $anggotaCluster[] = $u['user_id'];
            }
            return view('admin.' . $title . '.form', compact('title', 'data', 'userCluster', 'anggotaCluster'));
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        try {
            $req = $request->all();
            $data = $this->repo->deleteAndCreateByCluster($req['nama'], $req);
            // dd($data);
            return response()->json(['data' => $data, 'success' => true]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        try {
            $cluster = $this->repo->find($id);
            $data = $this->repo->deleteByCluster($cluster->nama);
            return response()->json($data);
        } catch (\Exception $e) {
            return view('errors.message', ['message' => $e->getMessage()]);
        }
    }
}
