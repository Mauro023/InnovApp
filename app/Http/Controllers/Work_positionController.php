<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWork_positionRequest;
use App\Http\Requests\UpdateWork_positionRequest;
use App\Repositories\Work_positionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Work_positionController extends AppBaseController
{
    /** @var Work_positionRepository $workPositionRepository*/
    private $workPositionRepository;

    public function __construct(Work_positionRepository $workPositionRepo)
    {
        $this->workPositionRepository = $workPositionRepo;
    }

    /**
     * Display a listing of the Work_position.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $workPositions = $this->workPositionRepository->all();

        return view('work_positions.index')
            ->with('workPositions', $workPositions);
    }

    /**
     * Show the form for creating a new Work_position.
     *
     * @return Response
     */
    public function create()
    {
        return view('work_positions.create');
    }

    /**
     * Store a newly created Work_position in storage.
     *
     * @param CreateWork_positionRequest $request
     *
     * @return Response
     */
    public function store(CreateWork_positionRequest $request)
    {
        $input = $request->all();

        $workPosition = $this->workPositionRepository->create($input);

        Flash::success('Work Position saved successfully.');

        return redirect(route('workPositions.index'));
    }

    /**
     * Display the specified Work_position.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $workPosition = $this->workPositionRepository->find($id);

        if (empty($workPosition)) {
            Flash::error('Work Position not found');

            return redirect(route('workPositions.index'));
        }

        return view('work_positions.show')->with('workPosition', $workPosition);
    }

    /**
     * Show the form for editing the specified Work_position.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $workPosition = $this->workPositionRepository->find($id);

        if (empty($workPosition)) {
            Flash::error('Work Position not found');

            return redirect(route('workPositions.index'));
        }

        return view('work_positions.edit')->with('workPosition', $workPosition);
    }

    /**
     * Update the specified Work_position in storage.
     *
     * @param int $id
     * @param UpdateWork_positionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWork_positionRequest $request)
    {
        $workPosition = $this->workPositionRepository->find($id);

        if (empty($workPosition)) {
            Flash::error('Work Position not found');

            return redirect(route('workPositions.index'));
        }

        $workPosition = $this->workPositionRepository->update($request->all(), $id);

        Flash::success('Work Position updated successfully.');

        return redirect(route('workPositions.index'));
    }

    /**
     * Remove the specified Work_position from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $workPosition = $this->workPositionRepository->find($id);

        if (empty($workPosition)) {
            Flash::error('Work Position not found');

            return redirect(route('workPositions.index'));
        }

        $this->workPositionRepository->delete($id);

        Flash::success('Work Position deleted successfully.');

        return redirect(route('workPositions.index'));
    }
}
