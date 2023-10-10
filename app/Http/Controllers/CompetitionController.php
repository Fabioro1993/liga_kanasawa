<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use App\Http\Requests\UpdateCompetitionRequest;
use App\Http\Requests\StoreCompetitionRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Competition;
use App\Models\Category;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Competition::with(['category', 'belt'])->get();
            return response()->json($data);
        }

        $categories = Category::orderBy('id', 'asc')->get();
        return view('competition.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompetitionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //!validar que no se cree una competicion que ya exista
        try {
            DB::beginTransaction();

            $competition              = new Competition();
            $competition->category_id = $request->category_id;
            $competition->belt_id     = $request->belt_id;
            $competition->gender      = $request->gender_id;
            $competition->save();

            DB::commit();
            return true;
        } catch (ValidationException $e) {
            DB::rollback();
            throw $e;
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function show(Competition $competition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $competition = Competition::with(['category', 'belt'])->find($id);
        return $competition;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompetitionRequest  $request
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            DB::beginTransaction();

            $competition              = Competition::find($request->id);
            $competition->category_id = $request->category_id;
            $competition->belt_id     = $request->belt_id;
            $competition->gender      = $request->gender_id;
            $competition->save();

            DB::commit();
            return true;
        } catch (ValidationException $e) {
            DB::rollback();
            throw $e;
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            DB::beginTransaction();

            $competition = Competition::find($request->id);
            $competition->delete();

            DB::commit();
            return true;
        } catch (ValidationException $e) {
            DB::rollback();
            throw $e;
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    public function belts(Request $request)
    {
        $id = $request['id'];
        $belts = Category::with('attributes.belt')->find($id);
        return $belts->attributes;
    }
}
