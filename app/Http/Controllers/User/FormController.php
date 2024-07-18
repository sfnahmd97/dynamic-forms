<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\FormSubmission;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        $forms = Form::all();
        return view('user_forms.index', compact('forms'));
    }

    public function show($id ,Request $request)
    {
        $form = Form::findOrFail($id);

        if ($request->isMethod('post')) {
            $data = $request->except('_token');
            FormSubmission::create([
                'form_id' => $form->id,
                'data' => json_encode($data),
            ]);

            return redirect()->route('user_forms.show', $form->id)->with('success', 'Form submitted successfully.');
        }
        return view('user_forms.show', compact('form'));
    }
}
