<?php
function uploadImage($request, $object, $filename)
{
    if ($request->hasFile($filename)) {
        $file = $request->$filename; // Get the temporary file name
        $newName = uniqid() . "." . $file->getClientOriginalExtension();
        $file->move("images", $newName);
        $object->logo  = "images/$newName";
    }
}
