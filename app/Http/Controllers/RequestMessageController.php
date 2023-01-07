<?php

namespace App\Http\Controllers;

use App\Models\JobRequest;
use App\Models\RequestMessage;
use Illuminate\Http\Request;

class RequestMessageController extends Controller
{
    public function store(Request $request, JobRequest $jobRequest) {
        $this->authorize('createMessage', $jobRequest);

        $validated = $request->validate([
            'message' => 'required|string|max:255'
        ]);
        
        $jobRequest->messages()->create(['user_id'=> $request->user()->id, 'message' => $validated['message']]);

        return redirect(route('request.show', $jobRequest));
    }

    public function edit(RequestMessage $requestMessage) {
        return view('request.editMessage', ['requestMessage' => $requestMessage]);
    }

    public function update(Request $request, RequestMessage $requestMessage) {
        $this->authorize('update', $requestMessage);

        $validated = $request->validate([
            'message' => 'required|string|max:255'
        ]);

        $requestMessage->update($validated);

        return redirect(route('request.show', $requestMessage->jobRequest));
    }

    public function delete(RequestMessage $requestMessage) {
        $this->authorize('delete', $requestMessage);

        $requestMessage->delete();

        return redirect(route('request.show', $requestMessage->jobRequest));
    }
}
