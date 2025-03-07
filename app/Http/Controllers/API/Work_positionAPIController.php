<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateWork_positionAPIRequest;
use App\Http\Requests\API\UpdateWork_positionAPIRequest;
use App\Models\Work_position;
use App\Repositories\Work_positionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Work_positionController
 * @package App\Http\Controllers\API
 */

class Work_positionAPIController extends AppBaseController
{
    /** @var  Work_positionRepository */
    private $workPositionRepository;

    public function __construct(Work_positionRepository $workPositionRepo)
    {
        $this->workPositionRepository = $workPositionRepo;
    }

    /**
     * Display a listing of the Work_position.
     * GET|HEAD /workPositions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $workPositions = $this->workPositionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($workPositions->toArray(), 'Work Positions retrieved successfully');
    }

    /**
     * Store a newly created Work_position in storage.
     * POST /workPositions
     *
     * @param CreateWork_positionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateWork_positionAPIRequest $request)
    {
        $input = $request->all();

        $workPosition = $this->workPositionRepository->create($input);

        return $this->sendResponse($workPosition->toArray(), 'Work Position saved successfully');
    }

    /**
     * Display the specified Work_position.
     * GET|HEAD /workPositions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Work_position $workPosition */
        $workPosition = $this->workPositionRepository->find($id);

        if (empty($workPosition)) {
            return $this->sendError('Work Position not found');
        }

        return $this->sendResponse($workPosition->toArray(), 'Work Position retrieved successfully');
    }

    /**
     * Update the specified Work_position in storage.
     * PUT/PATCH /workPositions/{id}
     *
     * @param int $id
     * @param UpdateWork_positionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWork_positionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Work_position $workPosition */
        $workPosition = $this->workPositionRepository->find($id);

        if (empty($workPosition)) {
            return $this->sendError('Work Position not found');
        }

        $workPosition = $this->workPositionRepository->update($input, $id);

        return $this->sendResponse($workPosition->toArray(), 'Work_position updated successfully');
    }

    /**
     * Remove the specified Work_position from storage.
     * DELETE /workPositions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Work_position $workPosition */
        $workPosition = $this->workPositionRepository->find($id);

        if (empty($workPosition)) {
            return $this->sendError('Work Position not found');
        }

        $workPosition->delete();

        return $this->sendSuccess('Work Position deleted successfully');
    }
}
