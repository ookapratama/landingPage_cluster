<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Repositories\Contracts\UserClusterContract;
use App\Models\UserCluster;
use App\Traits\Uploadable;
use Illuminate\Http\Request;

class UserClusterController extends Controller
{
    use Uploadable;
    protected $title, $repo, $response, $userCluster;
    protected $file_path = 'uploads/anggota-cluster';

    public function __construct(UserClusterContract $repo, UserCluster $userCluster)
    {
        $this->title = 'user-clusters';
        $this->repo = $repo;
        $this->userCluster = $userCluster;
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
            return view('admin.' . $title . '.form', compact('title', ));
        } catch (\Exception $e) {
            return view('errors.message', ['message' => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            $req = $request->all();

            if ($request->hasFile('url_pict')) {
                $file = $request->file('url_pict')->getClientOriginalName();
                $file_name = pathinfo($file, PATHINFO_FILENAME);
                $file_name = $this->uploadFile2($request->file('url_pict'), $this->file_path, '');
                $req['url_pict'] = $file_name;
            }
            // dd($req);
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
            if ($request->hasFile('url_pict')) {
                $file = $request->file('url_pict')->getClientOriginalName();
                $file_name = pathinfo($file, PATHINFO_FILENAME);
                $file_name = $this->uploadFile2($request->file('url_pict'), $this->file_path, '');
                $req['url_pict'] = $file_name;
            } else {
                $req['url_pict'] = $req['url_old'];
            }
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
