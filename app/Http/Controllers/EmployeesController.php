<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeesCreateRequest;
use App\Repository\CompaniesRepository;
use App\Repository\EmployeesRepository;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{

    /**
     * @var EmployeesRepository
     */
    private $EmployeesRepository;

    /**
     * @var CompaniesRepository
     */
    private $CompaniesRepository;

    /**
     * EmployeesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->EmployeesRepository = new EmployeesRepository();
        $this->CompaniesRepository = new CompaniesRepository();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('employees.index', [
            'employees' => $this->EmployeesRepository->getAll(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('employees.create', [
            'companies' => $this->CompaniesRepository->getForSelectList(),
        ]);
    }

    /**
     * @param EmployeesCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EmployeesCreateRequest $request)
    {
        $store = $this->EmployeesRepository->createOrUpdate($request);

        return ($store)
            ? redirect()->route('employees.index')->with("message", __("Employees created success!"))
            : redirect()->route('employees.index')->withErrors(__('Something wrong, try latter'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        $employee = $this->EmployeesRepository->getById($id);

        if ($employee == null) {
            return redirect()->route('home')->withErrors('Company not exists');
        }

        return view('employees.show', [
            'employee' => $employee,
            'companies' => $this->CompaniesRepository->getForSelectList(),
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $employee = $this->EmployeesRepository->getById($id);

        if ($employee == null) {
            return redirect()->route('home')->withErrors('Company not exists');
        }

        return view('employees.edit', [
            'employee' => $employee,
            'companies' => $this->CompaniesRepository->getForSelectList(),
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $store = $this->EmployeesRepository->createOrUpdate($request, $id);

        return ($store)
            ? redirect()->route('employees.index')->with("message", __("Employees updated success!"))
            : redirect()->route('employees.index')->withErrors(__('Something wrong, try latter'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $destroy = $this->EmployeesRepository->delete($id);

        return ($destroy)
            ? redirect()->route('employees.index')->with("message", __("Employees deleted success!"))
            : redirect()->route('employees.index')->withErrors(__('Something wrong, try latter'));
    }
}
