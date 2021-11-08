<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Services\PdfLinkService;

class HomeController extends Controller
{
    private $pdfLink;

    /**
     * Create a new controller instance.
     *
     * @param PdfLinkService $pdfLinkService
     */
    public function __construct(PdfLinkService $pdfLinkService)
    {
        $this->middleware('auth');
        $this->pdfLink = $pdfLinkService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function upload(Request $request)
    {

        $file = $request->file('file');
        $fileName = str_replace('.pdf', '', $file->getClientOriginalName());
        $path = $request->file('file')->store($fileName);

        try {
            DB::beginTransaction();
            $this->pdfLink->saveData([
                'link' => $path
            ]);
            DB::commit();

            return response()->json([
                'status' => 'success'
            ]);
        } catch (\Exception $exception) {
            DB::rollBack();
            Storage::delete($path);

            return response()->json([
                'status' => 'fail'
            ]);
        }

    }

    public function getLinkData(Request $request)
    {

    }
}
