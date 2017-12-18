<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GarbageRequest;
use App\Repositories\Contracts\GarbageInterface;
use DB;

class GarbageController extends Controller
{

    protected $repository;

    public function __construct(GarbageInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $garbages = $this->repository->getAll();
        return view('garbages.index' , compact("garbages"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('garbages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GarbageRequest $request)
    {
        $garbage = $this->repository->insert($request);
        return redirect()->route('garbages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $garbage = $this->repository->getById($id);
        return view('garbages.edit', compact("garbage"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $garbage = $this->repository->updateById($request, $id);
        return redirect()->route("garbages.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $garbage = $this->repository->deleteGarbage($id);
        return redirect()->route("garbages.index");
    }
}
