<?php


namespace App\Repository;


use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class AbstractRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * CoreRepository constructor.
     */
    public function __construct()
    {
        $this->model = $this->getModelClass();
    }

    /**
     * @return mixed
     */
    abstract protected function getModelClass() : Model;

    /**
     * @return Application|Model|mixed
     */
    protected function startCondition()
    {
        return clone $this->model;
    }

    /**
     * @param int $paginate
     * @return mixed
     */
    public function getAll($paginate = 10)
    {
        return $this->startCondition()->paginate($paginate);
    }

    /**
     * @param Request $request
     * @param null $id
     * @return bool
     */
    public function createOrUpdate(Request $request, $id = null)
    {
        $value = $request->post();

        $model = $this->startCondition();
        if ($id != null) {
            $model = $model
                ->whereId($id)->first();
        }

        return $model->fill($value)->save();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->startCondition()
            ->whereId($id)
            ->delete();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->startCondition()
            ->whereId($id)
            ->first();
    }
}
