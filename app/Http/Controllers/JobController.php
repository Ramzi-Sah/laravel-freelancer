<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index() {
        $jobs = Job::with('user:id,name')->get();

        // TODO: reduce db requests
        $user_jobs = [];
        $other_jobs = [];
        foreach ($jobs as $job) {
            $job['nbrRequests'] = $job->requests()->count();

            if ($job->user->is(auth()->user())) {
                array_push($user_jobs, $job);
            } else {
                array_push($other_jobs, $job);
            }
        };

        return View('jobs.index', [
            'jobs' => $other_jobs,
            'user_jobs' => $user_jobs
        ]);
    }

    public function create() {
        return View('jobs.create');
    }

    public function show(Job $job) {
        $requests = $job->requests()->with('user:id,name')->get();

        return View('jobs.show', ['job' => $job, 'requests' => $requests]);
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'name' => 'required|string|max:60',
            'cost' => 'required|numeric|gte:0|max:9999'
        ]);

        $new_job = $request->user()->jobs()->create($validated);

        return redirect(Route('jobs.show', $new_job));
    }

    public function delete(Job $job) {
        $this->authorize('delete', $job);

        $job->delete();

        return redirect(Route('jobs'));
    }

    public function edit(Job $job) {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Request $request, Job $job) {
        $this->authorize('update', $job);

        $validated = $request->validate([
            'name' => 'required|string|max:60',
            'cost' => 'required|numeric|gte:0|max:9999'
        ]);

        $job->update($validated);

        return redirect(route('jobs.show', $job));
    }
}
