<?php

namespace ProjectManager\Http\Controllers;

use Illuminate\Http\Request;

use ProjectManager\Repositories\ProjectRepository;
use ProjectManager\Services\ProjectService;
use Illuminate\Support\Facades\Response;

class ProjectFileController extends Controller
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
        return $this->projectRepository->findWhere(['owner_id' => \Authorizer::getResourceOwnerId()]);
    }

    public function update(Request $request, $id)
    {
        return $this->projectService->save($request->all(), $id);
    }
    
    public function store(Request $request)
    {
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();

        $data['file'] = $file;
        $data['extension'] = $extension;
        $data['name'] = $request->name;
        $data['description'] = $request->project_id;
        $data['project_id'] = $request->project_id;
        

        if(!$this->projectService->createFile($data))
            return Response::json([
                'error' => 'Internal error to create file.'
            ],500);

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

    public function destroy($project_id, $file_id)
    {
        if($this->checkPermissions($project_id)){

            return $this->projectRepository->skipPresenter()
                                                ->find($project_id)
                                                    ->files()
                                                        ->whereId($file_id)
                                                            ->delete();  
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
