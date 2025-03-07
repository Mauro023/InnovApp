<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMonthlyDataAPIRequest;
use App\Http\Requests\API\UpdateMonthlyDataAPIRequest;
use App\Models\MonthlyData;
use App\Repositories\MonthlyDataRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MonthlyDataController
 * @package App\Http\Controllers\API
 */

class MonthlyDataAPIController extends AppBaseController
{
    /** @var  MonthlyDataRepository */
    private $monthlyDataRepository;

    public function __construct(MonthlyDataRepository $monthlyDataRepo)
    {
        $this->monthlyDataRepository = $monthlyDataRepo;
    }

    /**
     * Display a listing of the MonthlyData.
     * GET|HEAD /monthlyDatas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $monthlyDatas = $this->monthlyDataRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($monthlyDatas->toArray(), 'Monthly Datas retrieved successfully');
    }

    /**
     * Store a newly created MonthlyData in storage.
     * POST /monthlyDatas
     *
     * @param CreateMonthlyDataAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMonthlyDataAPIRequest $request)
    {
        $input = $request->all();

        $monthlyData = $this->monthlyDataRepository->create($input);

        return $this->sendResponse($monthlyData->toArray(), 'Monthly Data saved successfully');
    }

    /**
     * Display the specified MonthlyData.
     * GET|HEAD /monthlyDatas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MonthlyData $monthlyData */
        $monthlyData = $this->monthlyDataRepository->find($id);

        if (empty($monthlyData)) {
            return $this->sendError('Monthly Data not found');
        }

        return $this->sendResponse($monthlyData->toArray(), 'Monthly Data retrieved successfully');
    }

    /**
     * Update the specified MonthlyData in storage.
     * PUT/PATCH /monthlyDatas/{id}
     *
     * @param int $id
     * @param UpdateMonthlyDataAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMonthlyDataAPIRequest $request)
    {
        $input = $request->all();

        /** @var MonthlyData $monthlyData */
        $monthlyData = $this->monthlyDataRepository->find($id);

        if (empty($monthlyData)) {
            return $this->sendError('Monthly Data not found');
        }

        $monthlyData = $this->monthlyDataRepository->update($input, $id);

        return $this->sendResponse($monthlyData->toArray(), 'MonthlyData updated successfully');
    }

    /**
     * Remove the specified MonthlyData from storage.
     * DELETE /monthlyDatas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MonthlyData $monthlyData */
        $monthlyData = $this->monthlyDataRepository->find($id);

        if (empty($monthlyData)) {
            return $this->sendError('Monthly Data not found');
        }

        $monthlyData->delete();

        return $this->sendSuccess('Monthly Data deleted successfully');
    }
}
