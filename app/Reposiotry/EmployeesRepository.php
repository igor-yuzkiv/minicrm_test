<?php


namespace App\Repository;
use App\Models\Employees;
use App\Models\Employees as Model;
use Illuminate\Http\Request;

class EmployeesRepository extends AbstractRepository
{

    /**
     * @param int $paginate
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll($paginate = 10) {
        return $this->startCondition()
            ->with('company')
            ->paginate($paginate);
    }

    protected function getModelClass(): \Illuminate\Database\Eloquent\Model
    {
        return new Employees();
    }
}
