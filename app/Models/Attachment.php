<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Attachment extends Model
{
    use HasFactory;



    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'attachment' => "required|file|max:2048"
        ]);

        return response()->json([
            "message" => "store",
            "request"=>$request->attachment
        ]);

        $attachment = $request->attachment;
        $fileName = $attachment->getClientOriginalName();
        $attachment->move(public_path('attachments'), $fileName);
        $attributes = [
            "report_id" => Report::getNextID(),
            "file_name" => $fileName,
            "file_path" => env('APP_URL') . env('APP_ATTACHMENT_path') . $fileName,
        ];
        return response()->json([
            "message" => "store",
            "request" => implode($attributes)
        ]);
    }
}
