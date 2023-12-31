<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use App\Http\Requests\UpdateCompetitionRequest;
use App\Http\Requests\StoreCompetitionRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Competition;
use App\Models\Category;
use App\Models\Position;
use App\Models\State;

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

        $states = State::orderBy('id', 'asc')->get();
        return view('competition.index', compact('states'));
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
    public function edit($competition_id, $type)
    {
        $positions = Position::with(['category', 'state'])->where('competition_id', $competition_id)
            ->where('type', $type)->get();

        $competition = Competition::with(['category', 'belt'])->find($competition_id);

        return compact('positions', 'competition');
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
        $competition_id = $request->competition_id;
        $type = $request->id_type;

        $positions = Position::where('competition_id', $competition_id)
            ->where('type', $type)->get();
        try {
            DB::beginTransaction();

            if (count($positions) != 0) {
                $positions = Position::where('competition_id', $competition_id)
                    ->where('type', $type)->delete();
            }

            if ($request->first['full_name']) {
                $position = new Position();
                $position->positions      = 1;
                $position->full_name      = $request->first['full_name'];
                $position->dojo           = $request->first['dojo'];
                $position->organization   = $request->first['organization'];
                $position->state_id       = $request->first['state'];
                $position->type           = $type;
                $position->competition_id = $competition_id;
                $position->save();
            }

            if ($request->two['full_name']) {
                $position = new Position();
                $position->positions      = 2;
                $position->full_name      = $request->two['full_name'];
                $position->dojo           = $request->two['dojo'];
                $position->organization   = $request->two['organization'];
                $position->state_id       = $request->two['state'];
                $position->type           = $type;
                $position->competition_id = $competition_id;
                $position->save();
            }

            if ($request->three['full_name']) {
                $position = new Position();
                $position->positions      = 3;
                $position->full_name      = $request->three['full_name'];
                $position->dojo           = $request->three['dojo'];
                $position->organization   = $request->three['organization'];
                $position->state_id       = $request->three['state'];
                $position->type           = $type;
                $position->competition_id = $competition_id;
                $position->save();
            }

            if ($request->four['full_name']) {
                $position = new Position();
                $position->positions      = 4;
                $position->full_name      = $request->four['full_name'];
                $position->dojo           = $request->four['dojo'];
                $position->organization   = $request->four['organization'];
                $position->state_id       = $request->four['state'];
                $position->type           = $type;
                $position->competition_id = $competition_id;
                $position->save();
            }

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
