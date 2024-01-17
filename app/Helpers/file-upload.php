<?php

function imageUpload($image, $directory)
{
    $imageExtension = $image->getClientOriginalExtension();
    $imageName      = rand(10000, 50000).'.'.$imageExtension;
    $image->move($directory, $imageName);
    return $directory.$imageName;
}


// function fileUpload($fileObject, $dir = null, $existFilePath = null)
// {
//         if ($fileObject) {
//                 if (file_exists($existFilePath)) {
//                         unlink($existFilePath);
//                 }
//                 $fileName = rand(100000, 999999) . time() . '.' . $fileObject->getClientOriginalExtension();
//                 $fileDir = 'admin/uploaded-files/' . $dir . '/';
//                 $fileObject->move($fileDir, $fileName);
//                 $fileUrl = $fileDir . $fileName;
//         } else {
//                 if (isset($existFilePath)) {
//                         $fileUrl = $existFilePath;
//                 } else {
//                         $fileUrl = null;
//                 }
//         }
//         return $fileUrl;
// }
