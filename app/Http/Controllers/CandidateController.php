<?php

namespace App\Http\Controllers;

use App\Services\CandidateService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\CandidateRequest\CreateCandidateRequest;
use App\Http\Requests\CandidateRequest\UpdateCandidateRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    /**
     * @var CandidateService
     */
    protected $candidateService;

    /**
     * Create a new controller instance.
     *
     * @param CandidateService $candidateService
     */
    public function __construct(CandidateService $candidateService)
    {
        $this->candidateService = $candidateService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $viewData['candidates'] = $this->candidateService->all();

        return view('candidate.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('candidate.form-data');
    }

    public function upload()
    {
        return view('candidate.index');
    }

    public function postUpload(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCandidateRequest $request
     * @return Response
     */
    public function store(CreateCandidateRequest $request)
    {
        try {
            $customRequest = $request->validated();
            if($request->hasFile('cv')) {
                $file = $request->cv;
                $filename = (string)Str::uuid() . "." . $file->getClientOriginalExtension();
                $path = 'uploads/cvs/' . $filename;
                $customRequest = array_merge($customRequest, ['cv_url' => $path]);
                $file->storeAs('uploads/cvs', $filename, 'local');
            }
            $post = $this->candidateService->create($customRequest);

            return redirect()->route('candidates.index')->with('success', 'Thêm thành công'); 
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
        $viewData['candidate'] = $this->candidateService->find($id);

        return view('candidate.form-data', $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCandidateRequest $request
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateCandidateRequest $request, $id)
    {
        try {
            $customRequest = $request->validated();
            if($request->hasFile('cv')) {
                $file = $request->cv;
                $filename = (string)Str::uuid() . "." . $file->getClientOriginalExtension();
                $path = 'uploads/cvs/' . $filename;
                $customRequest = array_merge($customRequest, ['cv_url' => $path]);
                $candidate = $this->candidateService->find($id);
                if($candidate->cv_url) {
                    Storage::delete($candidate->cv_url);
                }
                $file->storeAs('uploads/cvs', $filename, 'local');
            }
            $candidate = $this->candidateService->update($customRequest, $id);

            return redirect()->route('candidates.index')->with('success',  'Sửa thành công');
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
            $candidate = $this->candidateService->find($id);
            if($candidate->cv_url) {
                Storage::delete($candidate->cv_url);
            }
            $this->candidateService->delete($id);

            return redirect()->route('candidates.index')->with('success',  'Xóa thành công');
        } catch (Exception $err) {
            throw $err;
        }
    }
}
