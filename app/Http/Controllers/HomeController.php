<?php

namespace App\Http\Controllers;

use App\Http\Services\Repositories\Contracts\ClusterContract;
use App\Http\Services\Repositories\Contracts\KaryawanContract;
use App\Models\LabelCluster;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $cluster, $karyawan;

    public function __construct(ClusterContract $cluster, KaryawanContract $karyawan)
    {
        $this->cluster = $cluster;
        $this->karyawan = $karyawan;
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('admin');
    }

    public function landing()
    {
        $label = LabelCluster::get();
        $cluster = $this->cluster->getAllWithConcat();
        // dd($cluster);
        $processCluster = $cluster->map(function ($c) {
            $userIds = explode(',', $c->user_ids ?? '-');
            $anggota = explode(',', $c->anggota_cluster ?? '-');
            $role = explode(',', $c->role_anggota ?? '-');
            $url_pict = explode(',', $c->url_pict ?? '-');

            $AnggotaCluster = [];
            for ($i = 0; $i < count($anggota); $i++) {
                if (!empty($anggota[$i])) {
                    $AnggotaCluster[] = [
                        'user_id' => $userIds[$i] ?? '-',
                        'nama' => trim($anggota[$i]),
                        'role' => trim($role[$i]),
                        'url_pict' => trim($url_pict[$i]),
                        'foto' => $this->fotoAnggota($userIds[$i] ?? '')
                    ];
                }
            }

            return [
                'id' => $c->id,
                'nama' => $c->nama,
                'shift' => $c->shift,
                'anggota' => $AnggotaCluster
            ];
        });

        $karyawan = $this->karyawan->paginated([]);


        return view('app.landing', compact('label', 'processCluster', 'karyawan'));
    }

    public function fotoAnggota($userIds)
    {
        return 'https://placehold.co/128x128?text= ' . urlencode($userIds) . '/4A5568/FFFFFF/png';
    }
}
