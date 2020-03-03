<?php

namespace App\Http\Controllers\Admin;

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
        $this->crud->setColumns(['title','uploaded_by']);
        $this->crud->addColumn([
            'label'=>'Type',
            'type'=>'select',
            'entity'=>'type',
            'name'=>'type_id',
            'attribute'=>"label",
            'model'=>"App\Models\Type"
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
    
        // TODO: remove setFromDb() and manually define Fields
       // $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
