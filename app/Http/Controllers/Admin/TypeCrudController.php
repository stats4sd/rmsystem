<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TypeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TypeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TypeCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Type');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/type');
        $this->crud->setEntityNameStrings('type', 'types');
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'label',
            'type' => 'text',
            'label' => 'Label'
        ]);

        // TODO: remove setFromDb() and manually define Columns, maybe Filters
      //  $this->crud->setFromDb();
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(TypeRequest::class);
        $this->crud->addField([
            'name' => 'label',
            'type' => 'text',
            'label' => 'Label'
        ]);
        // TODO: remove setFromDb() and manually define Fields
      //  $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
