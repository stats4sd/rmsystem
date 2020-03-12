<?php

namespace App\Http\Controllers\Admin;
use Auth;
use App\Http\Requests\ResourceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ResourceCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ResourceCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Resource');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/resource');
        $this->crud->setEntityNameStrings('resource', 'resources');
    }

    protected function setupListOperation()
    {
        $this->crud->addColumns([
            [
                'name'=>'title'
            ],
            [
                'name'=>'description'
            ],
            [
                'label'=>'Uploaded by',
                'type'=>'select',
                'entity'=>'user',
                'name'=>'uploaded_by',
                'attribute'=>'name',
                'model'=>"App\Model\BackpackUser"
            ],
            [
                'label'=>'Type',
                'type'=>'select',
                'entity'=>'type',
                'name'=>'type_id',
                'attribute'=>"label",
                'model'=>"App\Models\Type"
            ],
            [
                'label' => 'Tags',
                'type'=>'select',
                'entity'=>'tags',
                'name'=>'tags',
                'attribute'=>'name',
                'model'=>'App\Models\Tag'
            ],
            [
                'label' => 'Files',
                'type'=>'upload_multiple',
                'name'=>'uploads',
                'disk'=>'public'
            
            ]
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ResourceRequest::class);

        $this->crud->addFields([
            [
                'name' => 'title',
                'type' => 'text',
                'label' => 'Title'
            ],
            [
                'name' => 'type_id',
                'type' => 'select2',
                'label' => 'Type',
                'entity'=>'type',
                'attribute'=>'label'
            ],
            [
                'name' => 'description',
                'type' => 'summernote',
                'label' => 'Description'
            ],
            [
                'name' => 'uploads',
                'label' => 'Upload additional documents',
                'type' => 'upload_multiple',
                'upload' => true
            ],
            [
                'label' => "Tags",
                'type' =>'select2_multiple',
                'name' => 'tags',
                'entity'=>'tags',
                'attribute'=>'name',
                'model'=>"App\Models\Tag",
                'pivot' => true
            ],
            [
                'name' => 'uploaded_by',
                'type' => 'hidden',
                'default' => Auth::guard('backpack')->user()->id,
            ]
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
