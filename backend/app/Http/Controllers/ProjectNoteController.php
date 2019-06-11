<?php

namespace ProjectManager\Http\Controllers;

use Illuminate\Http\Request;

use ProjectManager\Repositories\ProjectNoteRepository;
use ProjectManager\Services\ProjectNoteService;

class ProjectNoteController extends Controller
{
    private $projectNoteRepository;

    private $projectNoteService;

    public function __construct(ProjectNoteRepository $repository, ProjectNoteService $service)
    {
        $this->projectRepository = $repository;

        $this->projectNoteService = $service;
    }

    public function index($id)
    {
        return $this->projectRepository->findWhere(['project_id' => $id]);
    }

    public function update(Request $request, $id, $noteId)
    {
        return $this->projectNoteService->save($request->all(), $noteId);
    }
    
    public function store(Request $request)
    {
        return $this->projectNoteService->save($request->all());
    }

    public function show($id, $noteId)
    {
        return $this->projectRepository->findWhere(['project_id' => $id, 'id' => $noteId]);
    }

    public function destroy($id,$noteId)
    {
        return $this->projectRepository->destroy($noteId);
    }


}
