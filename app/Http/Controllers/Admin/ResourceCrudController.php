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
        $this->crud->setColumns(['title']);
        $this->crud->addColumn([
            'label'=>'Uploaded by',
            'type'=>'select',
            'entity'=>'user',
            'name'=>'uploaded_by',
            'attribute'=>'name',
            'model'=>"App\Model\BackpackUser"
        ]);
        $this->crud->addColumn([
            'label'=>'Type',
            'type'=>'select',
            'entity'=>'type',
            'name'=>'type_id',
            'attribute'=>"label",
            'model'=>"App\Models\Type"
        ]);
        $this->crud->addColumn([
            'name' => 'description',
            'label' => 'Description',
            'type' => 'summernote',
            'options' => [
                'height' => 200,
            ],
        ]);
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
      //  $this->crud->setFromDb();
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ResourceRequest::class);

        $this->crud->addField([
            'name' => 'title',
            'type' => 'text',
            'label' => 'Title'
        ]);

        $this->crud->addField([
            'name' => 'type_id',
            'type' => 'select',
            'label' => 'Type',
            'entity'=>'type',
            'attribute'=>'label'
        ]);

        $this->crud->addField([
            'name' => 'description',
            'type' => 'text',
            'label' => 'Description'
        ]);
        $this->crud->addField([
                'name' => 'uploaded_by',
                'type' => 'hidden',
                'default' => Auth::guard('backpack')->user()->id,
        ]);
    
        // TODO: remove setFromDb() and manually define Fields
       // $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
