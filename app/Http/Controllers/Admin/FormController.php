<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DynamicFormRequest;
use App\Jobs\sendFormCreatedEMail;
use App\Models\Form;
use App\Models\FormSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $forms = Form::all();
        return view('forms.index', compact('forms'));
    }


    public function create()
    {
        return view('forms.create');
    }


    public function store(DynamicFormRequest $request)
    {

    $form = Form::create($request->only('name'));

    foreach ($request->fields as $field) {

        if (isset($field['label'], $field['type'])) {

            $field_name = str_replace(' ', '_', strtolower($field['label']));
            $fieldData = [
                'label' => $field['label'],
                'type' => $field['type'],
                'name' => $field_name
            ];

            $createdField = $form->fields()->create($fieldData);

            if ($field['type'] === 'select' && isset($field['options'])) {
                $options = implode(',', $field['options']);
                $createdField->update(['options' => $options]);
            }

        }
    }

        sendFormCreatedEMail::dispatch($form);

    return redirect()->route('forms.index')->with('success', 'Form created successfully.');
    }


    public function show(string $id)
    {
        $form = Form::with('fields')->findOrFail($id);
        return view('forms.show', compact('form'));
    }


    public function edit(string $id)
    {
        $form = Form::with('fields')->findOrFail($id);
        return view('forms.edit', compact('form'));
    }

    public function update(DynamicFormRequest $request, $id)
    {
        $form = Form::findOrFail($id);
        $form->update($request->only('name'));

        $form->fields()->delete();

        foreach ($request->fields as $field) {
            if (isset($field['label'], $field['type'])) {
                $field_name = str_replace(' ', '_', strtolower($field['label']));
                $fieldData = [
                    'label' => $field['label'],
                    'type' => $field['type'],
                    'name' => $field_name,
                    'options' => isset($field['options']) ? implode(',', $field['options']) : null
                ];
                $form->fields()->create($fieldData);
            }
        }

        return redirect()->route('forms.index')->with('success', 'Form updated successfully.');
    }

    public function destroy(Form $form)
    {
        $form->delete();
        return redirect()->route('forms.index');
    }


    public function submissions($id)
    {
        $form = Form::with('submissions')->findOrFail($id);
        return view('forms.submissions', compact('form'));
    }

    public function submissionsShow($id)
    {
        $submission = FormSubmission::with('form')->findOrFail($id);
        return view('forms.submission_show', compact('submission'));
    }
}
