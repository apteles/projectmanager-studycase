<?php

namespace ProjectManager\Http\Controllers;

use Illuminate\Http\Request;

use ProjectManager\Repositories\ProjectRepository;
use ProjectManager\Services\ProjectService;
use ProjectManager\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Response;

class ProjectController extends Controller
{
    private $projectRepository;

    private $projectService;

    public function __construct(ProjectRepository $repository, ProjectService $service)
    {
        $this->projectRepository = $repository;

        $this->projectService = $service;
    }

    public function index()
    {
        return $this->projectRepository->findWhere(['owner_id' => AuthController::getAuthenticatedUser()->id]);
    }

    public function update(Request $request, $id)
    {
        return $this->projectService->save($request->all(), $id);
    }
    
    public function store(Request $request)
    {
        return $this->projectService->save($request->all());
    }

    public function show($id)
    {
        if($this->checkPermissions($id)){
            return $this->projectRepository->find($id);
        }

        return Response::json([
            'error' => 'Access forbiden.'
        ],401);
    }

    public function destroy($id)
    {
        if($this->checkPermissions($id)){
            return $this->projectRepository->destroy($id);  
        }

        return Response::json([
            'error' => 'Access forbiden.'
        ],401);
    }

    private function checkProjectOwner($project_id)
    {
        return $this->projectRepository->isOwner($project_id);
    }

   public function checkProjectMember($project_id)
   {
       return $this->projectRepository->hasMember($project_id);
     
   }

    public function checkPermissions($project_id)
    {
        return $this->checkProjectOwner($project_id) || $this->checkProjectMember($project_id); 

    }
}
