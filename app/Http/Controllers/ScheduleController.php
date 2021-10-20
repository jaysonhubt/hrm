<?php

namespace App\Http\Controllers;

use App\Services\ScheduleService;
use App\Services\CandidateService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\ScheduleRequest\CreateSchedule as CreateScheduleRequest;
use App\Http\Requests\ScheduleRequest\UpdateSchedule as UpdateScheduleRequest;

class ScheduleController extends Controller
{
    /**
     * @var ScheduleService
     * @var CandidateService
     * @var UserService
     */
    protected $scheduleService;
    protected $candidateService;
    protected $userService;

    /**
     * Create a new controller instance.
     *
     * @param ScheduleService $scheduleService
     */
    public function __construct(
        ScheduleService $scheduleService,
        CandidateService $candidateService,
        UserService $userService
    ) {
        $this->scheduleService = $scheduleService;
        $this->candidateService = $candidateService;
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $viewData['schedules'] = $this->scheduleService->all();

        return view('schedule.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $viewData['candidates'] = $this->candidateService->all();
        $viewData['users'] = $this->userService->all();

        return view('schedule.form-data', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateScheduleRequest $request
     * @return Response
     */
    public function store(CreateScheduleRequest $request)
    {
        try {
            $customRequest = $request->validated();
            $post = $this->scheduleService->create($customRequest);

            return redirect()->route('schedules.index')->with('success', 'Thêm thành công'); 
        } catch (Exception $err) {
            throw $err;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $viewData['candidates'] = $this->candidateService->all();
        $viewData['users'] = $this->userService->all();
        $viewData['schedule'] = $this->scheduleService->find($id);

        return view('schedule.form-data', $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateScheduleRequest $request
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateScheduleRequest $request, $id)
    {
        try {
            $customRequest = $request->validated();
            $schedule = $this->scheduleService->update($customRequest, $id);

            return redirect()->route('schedules.index')->with('success',  'Sửa thành công');
        } catch (Exception $err) {
            throw $err;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $schedule = $this->scheduleService->find($id);
            $this->scheduleService->delete($id);

            return redirect()->route('schedules.index')->with('success',  'Xóa thành công');
        } catch (Exception $err) {
            throw $err;
        }
    }
}
