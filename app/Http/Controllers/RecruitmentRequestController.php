<?php

namespace App\Http\Controllers;

use App\Services\RecruitmentRequestService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RecruitmentRequest\CreateRecruitmentRequest;
use App\Http\Requests\RecruitmentRequest\UpdateRecruitmentRequest;

class RecruitmentRequestController extends Controller
{
    /**
     * @var RecruitmentRequestService
     */
    protected $recruitmentRequestService;

    /**
     * Create a new controller instance.
     *
     * @param RecruitmentRequestService $recruitmentRequestService
     */
    public function __construct(RecruitmentRequestService $recruitmentRequestService)
    {
        $this->recruitmentRequestService = $recruitmentRequestService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $viewData['requirements'] = $this->recruitmentRequestService->all();

        return view('requirement.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('requirement.form-data');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRecruitmentRequest $request
     * @return Response
     */
    public function store(CreateRecruitmentRequest $request)
    {
        try {
            $customRequest = $request->validated();
            if($request->hasFile('jd')) {
                $file = $request->jd;
                $filename = (string)Str::uuid() . "." . $file->getClientOriginalExtension();
                $path = 'uploads/jds/' . $filename;
                $customRequest = array_merge($customRequest, ['jd_url' => $path]);
                $file->storeAs('uploads/jds', $filename, 'local');
            }
            $post = $this->recruitmentRequestService->create($customRequest);

            return redirect()->route('requirements.index')->with('success', 'Thêm thành công');
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
        // $viewData['requirement'] = $this->recruitmentRequestService->find($id);

        // return response()->json([
        //     'status_code' => 200,
        //     'success' => true,
        //     'data' => $viewData['requirement']
        // ], 200); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $viewData['requirement'] = $this->recruitmentRequestService->find($id);

        return view('requirement.form-data', $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRecruitmentRequest $request
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateRecruitmentRequest $request, $id)
    {
        try {
            $customRequest = $request->validated();
            if($request->hasFile('jd')) {
                $file = $request->jd;
                $filename = (string)Str::uuid() . "." . $file->getClientOriginalExtension();
                $path = 'uploads/jds/' . $filename;
                $customRequest = array_merge($customRequest, ['jd_url' => $path]);
                $requirement = $this->recruitmentRequestService->find($id);
                if($requirement->jd_url) {
                    Storage::delete($requirement->jd_url);
                }
                $file->storeAs('uploads/jds', $filename, 'local');
            }
            $requirement = $this->recruitmentRequestService->update($customRequest, $id);

            return redirect()->route('requirements.index')->with('success', 'Sửa thành công');
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
            $requirement = $this->recruitmentRequestService->find($id);
            if($requirement->jd_url) {
                Storage::delete($requirement->jd_url);
            }
            $this->recruitmentRequestService->delete($id);

            return redirect()->route('requirements.index')->with('success', 'Xóa thành công');
        } catch (Exception $err) {
            throw $err;
        }
    }
}
