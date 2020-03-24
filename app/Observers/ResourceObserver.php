<?php

namespace App\Observers;

use App\Models\Resource;
use Illuminate\Support\Facades\Storage;

class ResourceObserver
{
    /**
     * Handle the resource "created" event.
     *
     * @param  \App\Resource  $resource
     * @return void
     */
    public function created(Resource $resource)
    {
    }

    /**
     * Handle the resource "updated" event.
     *
     * @param  \App\Resource  $resource
     * @return void
     */
    public function updated(Resource $resource)
    {
        //
    }

    /**
     * Handle the resource "deleted" event.
     *
     * @param  \App\Resource  $resource
     * @return void
     */
    public function deleted(Resource $resource)
    {

    }
    public function deleting(Resource $resource)
    {
       $files = $resource->uploads;
       if($files && count($files)){
           foreach($files as $file){
               if($file>0){
                 //  Storage::delete($file['path']);
                   Storage::disk('public')->delete($file['path']);
                }
           }
       }
 
    }
    /**
     * Handle the resource "restored" event.
     *
     * @param  \App\Resource  $resource
     * @return void
     */
    public function restored(Resource $resource)
    {
        //
    }

    /**
     * Handle the resource "force deleted" event.
     *
     * @param  \App\Resource  $resource
     * @return void
     */
    public function forceDeleted(Resource $resource)
    {
        //
    }
}
