<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAdvisorAPIRequest;
use App\Http\Requests\API\UpdateAdvisorAPIRequest;
use App\Models\Advisor;
use App\Repositories\AdvisorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AdvisorController
 * @package App\Http\Controllers\API
 */

class AdvisorAPIController extends AppBaseController
{
    /** @var  AdvisorRepository */
    private $advisorRepository;

    public function __construct(AdvisorRepository $advisorRepo)
    {
        $this->advisorRepository = $advisorRepo;
    }

    /**
     * Display a listing of the Advisor.
     * GET|HEAD /advisors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $advisors = $this->advisorRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($advisors->toArray(), 'Advisors retrieved successfully');
    }

    /**
     * Store a newly created Advisor in storage.
     * POST /advisors
     *
     * @param CreateAdvisorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAdvisorAPIRequest $request)
    {
        $input = $request->all();

        $advisor = $this->advisorRepository->create($input);

        return $this->sendResponse($advisor->toArray(), 'Advisor saved successfully');
    }

    /**
     * Display the specified Advisor.
     * GET|HEAD /advisors/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Advisor $advisor */
        $advisor = $this->advisorRepository->find($id);

        if (empty($advisor)) {
            return $this->sendError('Advisor not found');
        }

        return $this->sendResponse($advisor->toArray(), 'Advisor retrieved successfully');
    }

    /**
     * Update the specified Advisor in storage.
     * PUT/PATCH /advisors/{id}
     *
     * @param int $id
     * @param UpdateAdvisorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdvisorAPIRequest $request)
    {
        $input = $request->all();

        /** @var Advisor $advisor */
        $advisor = $this->advisorRepository->find($id);

        if (empty($advisor)) {
            return $this->sendError('Advisor not found');
        }

        $advisor = $this->advisorRepository->update($input, $id);

        return $this->sendResponse($advisor->toArray(), 'Advisor updated successfully');
    }

    /**
     * Remove the specified Advisor from storage.
     * DELETE /advisors/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Advisor $advisor */
        $advisor = $this->advisorRepository->find($id);

        if (empty($advisor)) {
            return $this->sendError('Advisor not found');
        }

        $advisor->delete();

        return $this->sendSuccess('Advisor deleted successfully');
    }
}
