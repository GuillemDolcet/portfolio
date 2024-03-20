<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\PersonalInfo;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;

class ContactController extends AdminController
{
    /**
     * [POST] /contact/form/{personalInfo}
     * contact
     *
     * Get contact form data validate and send mail
     *
     * @param ContactRequest $request
     * @param PersonalInfo $personalInfo
     * @return JsonResponse
     */
    public function contact(ContactRequest $request, PersonalInfo $personalInfo): JsonResponse
    {
        $attributes = $request->validated();

        $data = array_merge($attributes, ['personalInfo' => $personalInfo]);

        $subject = Lang::get('admin.hello') . ' ' . $personalInfo->firstName . ', ' . $attributes['name'] . ' ' . Lang::get('admin.sends-message');

        Mail::send('emails.contact', $data, function ($mail) use ($personalInfo, $subject) {
            $mail->to($personalInfo->email);
            $mail->subject($subject);
        });

        return new JsonResponse([
            'success' => true,
            'message' => Lang::get('admin.responses.success-contact')
        ]);
    }


}
