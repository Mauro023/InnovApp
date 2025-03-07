<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMonthlyDataRequest;
use App\Http\Requests\UpdateMonthlyDataRequest;
use App\Repositories\MonthlyDataRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MonthlyDataController extends AppBaseController
{
    /** @var MonthlyDataRepository $monthlyDataRepository*/
    private $monthlyDataRepository;

    public function __construct(MonthlyDataRepository $monthlyDataRepo)
    {
        $this->monthlyDataRepository = $monthlyDataRepo;
    }

    /**
     * Display a listing of the MonthlyData.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $monthlyDatas = $this->monthlyDataRepository->all();

        return view('monthly_datas.index')
            ->with('monthlyDatas', $monthlyDatas);
    }

    /**
     * Show the form for creating a new MonthlyData.
     *
     * @return Response
     */
    public function create()
    {
        return view('monthly_datas.create');
    }

    /**
     * Store a newly created MonthlyData in storage.
     *
     * @param CreateMonthlyDataRequest $request
     *
     * @return Response
     */
    public function store(CreateMonthlyDataRequest $request)
    {
        $input = $request->all();

        $monthlyData = $this->monthlyDataRepository->create($input);

        Flash::success('Monthly Data saved successfully.');

        return redirect(route('monthlyDatas.index'));
    }

    /**
     * Display the specified MonthlyData.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $monthlyData = $this->monthlyDataRepository->find($id);

        if (empty($monthlyData)) {
            Flash::error('Monthly Data not found');

            return redirect(route('monthlyDatas.index'));
        }

        return view('monthly_datas.show')->with('monthlyData', $monthlyData);
    }

    /**
     * Show the form for editing the specified MonthlyData.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $monthlyData = $this->monthlyDataRepository->find($id);

        if (empty($monthlyData)) {
            Flash::error('Monthly Data not found');

            return redirect(route('monthlyDatas.index'));
        }

        return view('monthly_datas.edit')->with('monthlyData', $monthlyData);
    }

    /**
     * Update the specified MonthlyData in storage.
     *
     * @param int $id
     * @param UpdateMonthlyDataRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMonthlyDataRequest $request)
    {
        $monthlyData = $this->monthlyDataRepository->find($id);

        if (empty($monthlyData)) {
            Flash::error('Monthly Data not found');

            return redirect(route('monthlyDatas.index'));
        }

        $monthlyData = $this->monthlyDataRepository->update($request->all(), $id);

        Flash::success('Monthly Data updated successfully.');

        return redirect(route('monthlyDatas.index'));
    }

    /**
     * Remove the specified MonthlyData from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $monthlyData = $this->monthlyDataRepository->find($id);

        if (empty($monthlyData)) {
            Flash::error('Monthly Data not found');

            return redirect(route('monthlyDatas.index'));
        }

        $this->monthlyDataRepository->delete($id);

        Flash::success('Monthly Data deleted successfully.');

        return redirect(route('monthlyDatas.index'));
    }
}
