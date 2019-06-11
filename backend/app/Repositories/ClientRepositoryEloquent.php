<?php
namespace ProjectManager\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

use ProjectManager\Entities\Client;

class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{
    public function model()
    {
        return Client::class;
    }
}