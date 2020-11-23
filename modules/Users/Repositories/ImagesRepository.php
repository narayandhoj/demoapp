<?php
namespace Modules\Users\Repositories;

use App\Repositories\Repository;
use Modules\Users\Models\Image;

use DB;

class ImagesRepository extends Repository
{
    public function __construct(Image $image){
        $this->model = $image;
    }
}