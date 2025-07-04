<?php

namespace App\Http\Services\Repositories;

use App\Http\Services\Repositories\BaseRepository;
use App\Http\Services\Repositories\Contracts\ClusterContract;
use App\Models\Cluster;
use Illuminate\Support\Facades\DB;

class ClusterRepository extends BaseRepository implements ClusterContract
{
	/**
	 * @var
	 */
	protected $model;

	public function __construct(Cluster $model)
	{
		$this->model = $model;
	}

	public function paginated(array $criteria)
	{
		$perPage = $criteria['per_page'] ?? 5;
		$field = $criteria['sort_field'] ?? 'id';
		$sortOrder = $criteria['sort_order'] ?? 'desc';
		return $this->model
			->select(([
				'clusters.*',
				DB::raw("GROUP_CONCAT(clusters.user_id) as user_ids"),
				DB::raw("GROUP_CONCAT(user_clusters.nama) as anggota_cluster"),
				DB::raw("GROUP_CONCAT(roles.name) as role_anggota"),
			]))
			->leftJoin('user_clusters', 'user_clusters.id', '=', $this->model->getTable() . '.user_id')
			->leftJoin('roles', 'roles.id', '=', 'user_clusters.id_role')
			->groupBy('nama', 'shift')
			->orderBy('clusters.id', $sortOrder)
			->paginate($perPage);
	}

	public function deleteAndCreateByCluster($name, $request)
	{
		$oldCluster = $this->model->where('nama', $name)->get();
		if ($oldCluster->count() > 0) {
			$this->model->where('nama', $name)->delete();
		}
		foreach ($request['user_cluster_id'] as $anggota_cluster) {
			$data = $this->model->create([
				'user_id' => $anggota_cluster,
				'shift' => $request['shift'],
				'nama' => $request['nama'],
			]);
		}
		return $data;
	}

	public function deleteByCluster($name)
	{
		$cluster = $this->model->where('nama', $name)->get();
		if ($cluster->count() > 0) {
			$data = $this->model->where('nama', $name)->delete();
		}
		return $data;
	}
}
