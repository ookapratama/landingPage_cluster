<?php

namespace App\Http\Services\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface ClusterContract
{
	/**
	 * params string $search
	 * @return Collection
	 */

	public function paginated(array $request);
	public function deleteAndCreateByCluster(array $name, $request);
	public function deleteByCluster($name);
}
