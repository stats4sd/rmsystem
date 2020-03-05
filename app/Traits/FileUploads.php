<?php

//namespace TraitNamespace;
namespace App\Traits;
use App\Helpers\GenericHelper;

  trait FileUploads
  {
    public function setAttribute ($key, $value)
    {

        if(in_array($key, $this->uploads)) {

            $disk = "public";
            $request = \Request::instance();

            $destination_path =  $this->uploadPath;
            $attribute_value = $this->{$key};


            if(! is_array($attribute_value)) {
                $attribute_value = (array) json_decode($this->{$key});
            }

            /// *****************************************************
            // REMOVE FILES MARKED FOR REMOVAL
            // *****************************************************
            $files_to_clear = $request->get('clear_'.$key);
            if($files_to_clear) {

                foreach($files_to_clear as $fileNo => $path) {
                    // DO NOT DELETE FROM STORAGE ! (So we can go back to previous revisions...)
                    $attribute_value = array_where($attribute_value, function ($value, $fileNo) use ($path) {
                        return $value['path'] != $path;
                    });
                }
            }

            /// *****************************************************
            // Upload Files
            // *****************************************************
            if($request->hasFile($key)) {
                foreach($request->file($key) as $file) {
                    if($file->isValid()) {

                        // use helper to make a url-friendly and unique filename
                        $new_file_name = GenericHelper::slugify_filename($file, date("Y-m-d_H:i:s"));

                        $file_path = $file->storeAs($destination_path, $new_file_name, $disk);

                        $attribute_value[] = [
                            "path" => $file_path,
                            "storedName" => $new_file_name,
                            "name" => $file->getClientOriginalName(),
                            "type" => $file->getClientOriginalExtension(),
                            "size" => $file->getClientSize(),
                        ];
                    }
                }
            }
            $this->attributes[$key] = json_encode($attribute_value);

            return;
        }

        parent::setAttribute($key, $value);
    }
  }