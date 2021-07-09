<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    //Create Project  (For All) [POST]
    public function createProject(Request $request)
    {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'duration' => ' required'
            ]);

            //student id + Create
            $user_id = auth()->user()->id;

            $project = new Project();

            $project->user_id = $user_id;
            $project->name = $request->name;
            $project->description = $request->description;
            $project->duration = $request->duration;

            $project->save();

            //send response
            return response()->json([
                'status' => 1,
                'message' => "Project has been created"
            ]);
    }

    //SELF PROJECT LIST API (For All) {api/list-project} [GET]
    public function listProject()
    {
        $user_id = auth()->user()->id;

        $project = Project::where("user_id", $user_id)->get();

        return response()->json([
            'status' => 1,
            'message' => "Projects",
            'data' => $project
        ]);
    }

    //SINGLE PROJECT  API (Admin and Blogwriter) {api/single-project/{$id}} [GET]
    public function singleProject($id)
    {
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('blogwriter')) {
            $user_id = auth()->user()->id;
            if (Project::where([
                'id' => $id
            ])->exists()) {
                $details = Project::where([
                    'id' => $id
                ])->get();

                return response()->json([
                    'status' => 1,
                    'message' => "Project details",
                    'data' => $details
                ]);
            } else {
                return response()->json([
                    'status' => 1,
                    'message' => "Project not found"
                ]);
            }
        } else {
            return response()->json([
                'status' => 0,
                'message' => "Admin and Blog Writer can only create Project !!"
            ]);
        }
    }

    //DELETE PROJECT API (Only Admin) {api/delete-project/{$id}} [DELETE]
    public function deleteProject($id)
    {
        if (Auth::user()->hasRole('admin')) {
            $user_id = auth()->user()->id;

            if (Project::where([
                'id' => $id
            ])->exists()) {
                $project = Project::where([
                    'id' => $id
                ])->first();

                $project->delete();

                return response()->json([
                    'status' => 1,
                    'message' => "Project deleted successfully!"
                ]);
            } else {
                return response()->json([
                    'status' => 0,
                    'message' => 'Project not found'
                ]);
            }
        } else {
            return response()->json([
                'status' => 0,
                'message' => "Admin can only create Project !!"
            ]);
        }
    }
}
