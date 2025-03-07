<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCost_centerRequest;
use App\Http\Requests\UpdateCost_centerRequest;
use App\Repositories\Cost_centerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Cost_centerController extends AppBaseController
{
    /** @var Cost_centerRepository $costCenterRepository*/
    private $costCenterRepository;

    public function __construct(Cost_centerRepository $costCenterRepo)
    {
        $this->costCenterRepository = $costCenterRepo;
    }

    /**
     * Display a listing of the Cost_center.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $costCenters = $this->costCenterRepository->all();

        return view('cost_centers.index')
            ->with('costCenters', $costCenters);
    }

    /**
     * Show the form for creating a new Cost_center.
     *
     * @return Response
     */
    public function create()
    {
        return view('cost_centers.create');
    }

    /**
     * Store a newly created Cost_center in storage.
     *
     * @param CreateCost_centerRequest $request
     *
     * @return Response
     */
    public function store(CreateCost_centerRequest $request)
    {
        $input = $request->all();

        $costCenter = $this->costCenterRepository->create($input);

        Flash::success('Cost Center saved successfully.');

        return redirect(route('costCenters.index'));
    }

    /**
     * Display the specified Cost_center.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $costCenter = $this->costCenterRepository->find($id);

        if (empty($costCenter)) {
            Flash::error('Cost Center not found');

            return redirect(route('costCenters.index'));
        }

        return view('cost_centers.show')->with('costCenter', $costCenter);
    }

    /**
     * Show the form for editing the specified Cost_center.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $costCenter = $this->costCenterRepository->find($id);

        if (empty($costCenter)) {
            Flash::error('Cost Center not found');

            return redirect(route('costCenters.index'));
        }

        return view('cost_centers.edit')->with('costCenter', $costCenter);
    }

    /**
     * Update the specified Cost_center in storage.
     *
     * @param int $id
     * @param UpdateCost_centerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCost_centerRequest $request)
    {
        $costCenter = $this->costCenterRepository->find($id);

        if (empty($costCenter)) {
            Flash::error('Cost Center not found');

            return redirect(route('costCenters.index'));
        }

        $costCenter = $this->costCenterRepository->update($request->all(), $id);

        Flash::success('Cost Center updated successfully.');

        return redirect(route('costCenters.index'));
    }

    /**
     * Remove the specified Cost_center from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $costCenter = $this->costCenterRepository->find($id);

        if (empty($costCenter)) {
            Flash::error('Cost Center not found');

            return redirect(route('costCenters.index'));
        }

        $this->costCenterRepository->delete($id);

        Flash::success('Cost Center deleted successfully.');

        return redirect(route('costCenters.index'));
    }
}
