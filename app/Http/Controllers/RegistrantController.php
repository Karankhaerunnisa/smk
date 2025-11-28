<?php

namespace App\Http\Controllers;

use App\Enums\RegistrantStatus;
use App\Http\Requests\StoreRegistrantRequest;
use App\Http\Requests\UpdateRegistrantRequest;
use App\Models\Major;
use App\Models\Registrant;
use Illuminate\Http\Request;

class RegistrantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $majors = Major::all();

        $statuses = RegistrantStatus::cases();

        $registrants = Registrant::with('major')


        ->when($request->majorCode, function ($query, $majorCode) {
            $query->whereRelation('major', 'code', $majorCode);
        })

        ->when($request->status, function ($query, $status) {
            $query->where('status', $status);
        })

        ->when($request->search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('registration_number', 'like', "%{$search}%");
            });
        })
        ->paginate(10);

        return view('admin.registrants.index', compact('majors', 'statuses', 'registrants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegistrantRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Registrant $registrant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registrant $registrant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegistrantRequest $request, Registrant $registrant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registrant $registrant)
    {
        //
    }
}
