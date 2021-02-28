<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompaniesCreateRequest;
use App\Mail\CompanyCreated;
use App\Repository\CompaniesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

/**
 * Class CompaniesController
 * @package App\Http\Controllers
 */
class CompaniesController extends Controller
{
    /**
     * @var CompaniesRepository
     */
    private $CompaniesRepository;

    /**
     * CompaniesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->CompaniesRepository = new CompaniesRepository();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('companies.index', [
            'companies' => $this->CompaniesRepository->getAll(),
        ]);
    }

    /**
     *
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * @param CompaniesCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CompaniesCreateRequest $request)
    {
        $store = $this->CompaniesRepository->createOrUpdate($request);

        return ($store)
            ? redirect()->route('companies.index')->with("message", __("Companies created success!"))
            : redirect()->route('companies.index')->withErrors(__('Something wrong, try latter'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        $company = $this->CompaniesRepository->getById($id);

        if ($company == null) {
            return redirect()->route('home')->withErrors('Company not exists');
        }

        $logo = Storage::disk('public')->url('image-not-found.jpg');
        if ($company->logo_patch !== null) {
            $logo = Storage::disk('public')->url($company->logo_patch);
        }

        return view('companies.show', [
            'company' => $company,
            'logo' => $logo
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $company = $this->CompaniesRepository->getById($id);

        if ($company == null) {
            return redirect()->route('home')->withErrors('Company not exists');
        }

        $logo = Storage::disk('public')->url('image-not-found.jpg');
        if ($company->logo_patch !== null) {
            $logo = Storage::disk('public')->url($company->logo_patch);
        }

        return view('companies.edit', [
            'company' => $company,
            'logo' => $logo
        ]);
    }


    /**
     * @param CompaniesCreateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CompaniesCreateRequest $request, $id)
    {
        $store = $this->CompaniesRepository->createOrUpdate($request, $id);

        return ($store)
            ? redirect()->route('companies.index')->with("message", __("Companies updated success!"))
            : redirect()->route('companies.index')->withErrors(__('Something wrong, try latter'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $destroy = $this->CompaniesRepository->delete($id);

        return ($destroy)
            ? redirect()->route('companies.index')->with("message", __("Companies deleted success!"))
            : redirect()->route('companies.index')->withErrors(__('Something wrong, try latter'));
    }
}
