<?php


namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model
{
    /**
     * @var UploadedFile
     */
    public $image;

    public function rules()
    {
        return [
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg','maxSize'=>1024*1024*2],
        ];
    }

    public function upload(UploadedFile $file,$currentImage)
    {

            $this->deleteCurrentImage($currentImage);

            $this->image=$file;

            $filename= $this->generateFileName();
            $file->saveAs( $this->getFolder() . $filename);

            return $filename;
    }


    public function getFolder()

    {
        return Yii::getAlias('@app').'/web/uploads/';
    }


    public function generateFileName()

    {
        return(md5(uniqid($this->image->baseName)).'.'.$this->image->extension);
    }


    public function deleteCurrentImage($currentImage)
    {

        if($this->fileExists($currentImage))
        {
            unlink($this->getFolder() . $currentImage);
        }

    }

    public function fileExists($currentImage)
    {
        if(!empty($currentImage)&&$currentImage!=null)
        {

            return file_exists($this->getFolder() . $currentImage);

        }
    }


}