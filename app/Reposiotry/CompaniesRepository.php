<?php


namespace App\Repository;


use App\Mail\CompanyCreated;
use App\Models\Companies as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 * Class CompaniesRepository
 * @package App\Repository
 */
class CompaniesRepository extends AbstractRepository
{
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

        $save = $model->fill($value)->save();

        if ($save && $request->hasFile('logo')) {
            $file = $request->file('logo');
            $file->storeAs('public/logo', $model->id . "." . $file->extension());

            $model->logo_patch = 'logo/' . $model->id . "." . $file->extension();
            $model->save();
        }

        if ($save) {
            Mail::to('igor97w@gmail.com')->send(new CompanyCreated($request->name));
        }

        return $save;
    }

    /**
     * @return mixed
     */
    public function getForSelectList()
    {

        return $this->startCondition()->get();

    }

    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function getModelClass(): \Illuminate\Database\Eloquent\Model
    {
        return new Model();
    }
}
