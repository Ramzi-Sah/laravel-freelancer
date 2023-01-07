<?php
namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function show(JobRequest $jobRequest) {
        return View('request.show', ['jobRequest' => $jobRequest]);
    }

    public function store(Request $request, Job $job) {
        $this->authorize('createRequest', $job);

        // user can only request once
        if (in_array(auth()->user()->id, array_column($job->requests->toArray(), 'user_id'))) {
            return redirect(Route('jobs.show', $job))->withErrors(['Already requested this job.']);
        };

        $request = $job->requests()->create(['user_id'=> $request->user()->id]);

        return redirect(Route('request.show', $request));
    }

    public function delete(JobRequest $jobRequest) {
        $this->authorize('delete', $jobRequest);

        $jobRequest->delete();

        return redirect(Route('jobs.show', $jobRequest->job));
    }
}
