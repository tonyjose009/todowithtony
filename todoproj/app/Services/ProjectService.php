<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;


class ProjectService {

    public function getAll(){
        return Project::all();
    }

}
