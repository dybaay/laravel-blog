<?php

namespace App\Http\Controllers;

use App\MyServices\Newsletter;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate([
            'email' => 'required|email'
        ]);

        try {
            $newsletter->subscribe(request('email'));

        }catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email cannot be added to this newsletter!'
            ]);
        }

        return back()->with('success', 'You have successfully subscribed to our newsletter!');
    }






}
