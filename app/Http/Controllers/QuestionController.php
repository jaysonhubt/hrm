<?php

namespace App\Http\Controllers;

use App\Services\QuestionService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\QuestionRequest\CreateQuestionRequest;
use App\Http\Requests\QuestionRequest\UpdateQuestionRequest;

class QuestionController extends Controller
{
    /**
     * @var QuestionService
     */
    protected $questionService;

    /**
     * Create a new controller instance.
     *
     * @param QuestionService $questionService
     */
    public function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $viewData['questions'] = $this->questionService->all();

        return view('question.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('question.form-data');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateQuestionRequest $request
     * @return Response
     */
    public function store(CreateQuestionRequest $request)
    {
        try {
            $post = $this->questionService->create($request->validated());

            return redirect()->route('questions.index')->with('success', 'Thêm thành công');
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
        $viewData['question'] = $this->questionService->find($id);

        return view('question.form-data', $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateQuestionRequest $request
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateQuestionRequest $request, $id)
    {
        try {
            $question = $this->questionService->update($request->validated(), $id);

            return redirect()->route('questions.index')->with('success', 'Sửa thành công');
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
            $schedule = $this->questionService->find($id);
            $this->questionService->delete($id);

            return redirect()->route('questions.index')->with('success',  'Xóa thành công');
        } catch (Exception $err) {
            throw $err;
        }
    }
}
