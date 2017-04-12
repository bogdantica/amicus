<?php

namespace App\Http\Controllers\Web;

use App\Amicus\AttendHelper;
use App\Amicus\Views\AttendView;
use App\Http\Requests\AttendRequest;
use App\Models\Event;
use App\Models\RegistrationForm;
use Illuminate\Http\JsonResponse;

class AttendController extends BaseController
{
    //

    public function modal(RegistrationForm $form)
    {
        $form->load([
            'options' => function ($query) {
                $query->orderBy('order');
            },
            'options.values' => function ($query) {
                $query->orderBy('order');
            }
        ]);

        return [
            'modal' => view('events.modals.attend.modal', compact('form'))->__toString()
        ];
    }


    public function show(Event $event)
    {
        $d = AttendView::show($event);

        return view('events.show.tabs.attend', compact($d));
    }

    public function attend(RegistrationForm $form, AttendRequest $request)
    {
        try {
            $d = AttendHelper::attend($form, $request->all());
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return new JsonResponse(['error' => [$e->getMessage()]],422);
            }
        }

        if ($request->ajax()) {
            return new JsonResponse("Success");
        }

        return redirect()->back();
    }


    public function attendingList(RegistrationForm $form)
    {

    }

}
