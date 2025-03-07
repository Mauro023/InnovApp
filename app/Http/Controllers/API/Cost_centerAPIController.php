<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCost_centerAPIRequest;
use App\Http\Requests\API\UpdateCost_centerAPIRequest;
use App\Models\Cost_center;
use App\Repositories\Cost_centerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Cost_centerController
 * @package App\Http\Controllers\API
 */

class Cost_centerAPIController extends AppBaseController
{
    /** @var  Cost_centerRepository */
    private $costCenterRepository;

    public function __construct(Cost_centerRepository $costCenterRepo)
    {
        $this->costCenterRepository = $costCenterRepo;
    }

    /**
     * Display a listing of the Cost_center.
     * GET|HEAD /costCenters
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $costCenters = $this->costCenterRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($costCenters->toArray(), 'Cost Centers retrieved successfully');
    }

    /**
     * Store a newly created Cost_center in storage.
     * POST /costCenters
     *
     * @param CreateCost_centerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCost_centerAPIRequest $request)
    {
        $input = $request->all();

        $costCenter = $this->costCenterRepository->create($input);

        return $this->sendResponse($costCenter->toArray(), 'Cost Center saved successfully');
    }

    /**
     * Display the specified Cost_center.
     * GET|HEAD /costCenters/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Cost_center $costCenter */
        $costCenter = $this->costCenterRepository->find($id);

        if (empty($costCenter)) {
            return $this->sendError('Cost Center not found');
        }

        return $this->sendResponse($costCenter->toArray(), 'Cost Center retrieved successfully');
    }

    /**
     * Update the specified Cost_center in storage.
     * PUT/PATCH /costCenters/{id}
     *
     * @param int $id
     * @param UpdateCost_centerAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCost_centerAPIRequest $request)
    {
        $input = $request->all();

        /** @var Cost_center $costCenter */
        $costCenter = $this->costCenterRepository->find($id);

        if (empty($costCenter)) {
            return $this->sendError('Cost Center not found');
        }

        $costCenter = $this->costCenterRepository->update($input, $id);

        return $this->sendResponse($costCenter->toArray(), 'Cost_center updated successfully');
    }

    /**
     * Remove the specified Cost_center from storage.
     * DELETE /costCenters/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Cost_center $costCenter */
        $costCenter = $this->costCenterRepository->find($id);

        if (empty($costCenter)) {
            return $this->sendError('Cost Center not found');
        }

        $costCenter->delete();

        return $this->sendSuccess('Cost Center deleted successfully');
    }
}
