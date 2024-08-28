<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attachment;

class AttachmentController extends Controller
{
    public function store(Request $request)
    {
        return response()->json([
            "message"=> "store",
        ]);
    }
}
