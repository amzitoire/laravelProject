<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEpreuveRequest;
use App\Http\Requests\UpdateEpreuveRequest;
use App\Repositories\EpreuveRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class EpreuveController extends AppBaseController
{
    /** @var EpreuveRepository $epreuveRepository*/
    private $epreuveRepository;

    public function __construct(EpreuveRepository $epreuveRepo)
    {
        $this->epreuveRepository = $epreuveRepo;
    }

    /**
     * Display a listing of the Epreuve.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $epreuves = $this->epreuveRepository->paginate(10);

        return view('epreuves.index')
            ->with('epreuves', $epreuves);
    }

    /**
     * Show the form for creating a new Epreuve.
     *
     * @return Response
     */
    public function create()
    {
        return view('epreuves.create');
    }

    /**
     * Store a newly created Epreuve in storage.
     *
     * @param CreateEpreuveRequest $request
     *
     * @return Response
     */
    public function store(CreateEpreuveRequest $request)
    {
        $input = $request->all();
        $path = $request->file('file')->store('public/files');
        $epreuve = $this->epreuveRepository->create($input);

        Flash::success('Epreuve saved successfully.');

        return redirect(route('epreuves.index'));
    }

    /**
     * Display the specified Epreuve.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $epreuve = $this->epreuveRepository->find($id);

        if (empty($epreuve)) {
            Flash::error('Epreuve not found');

            return redirect(route('epreuves.index'));
        }

        return view('epreuves.show')->with('epreuve', $epreuve);
    }

    /**
     * Show the form for editing the specified Epreuve.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $epreuve = $this->epreuveRepository->find($id);

        if (empty($epreuve)) {
            Flash::error('Epreuve not found');

            return redirect(route('epreuves.index'));
        }

        return view('epreuves.edit')->with('epreuve', $epreuve);
    }

    /**
     * Update the specified Epreuve in storage.
     *
     * @param int $id
     * @param UpdateEpreuveRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEpreuveRequest $request)
    {
        $epreuve = $this->epreuveRepository->find($id);

        if (empty($epreuve)) {
            Flash::error('Epreuve not found');

            return redirect(route('epreuves.index'));
        }
        $path = $request->file('file')->store('public/files');

        $epreuve = $this->epreuveRepository->update($request->all(), $id);

        Flash::success('Epreuve updated successfully.');

        return redirect(route('epreuves.index'));
    }

    /**
     * Remove the specified Epreuve from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $epreuve = $this->epreuveRepository->find($id);

        if (empty($epreuve)) {
            Flash::error('Epreuve not found');

            return redirect(route('epreuves.index'));
        }

        $this->epreuveRepository->delete($id);

        Flash::success('Epreuve deleted successfully.');

        return redirect(route('epreuves.index'));
    }
}