<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Vigener;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class MainForm extends Model
{
    public $type;
    public $dataFile;
    public $outFileUrl;
    public $code = 3;

    public function upload()
    {
        //var_dump($this->dataFile->baseName . '.' . $this->dataFile->extension);

        if ($this->validate()) {
            //$this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            $fileName = 'uploads/source.txt';

            $this->dataFile->saveAs($fileName);

            $this->code($fileName);

            return true;
        } else {
            return false;
        }
    }


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['dataFile'], 'file', 'skipOnEmpty' => false, /*'extensions' => 'txt'*/],
            [['code'], 'string'],
        ];
    }




    public function code($fileName)
    {
        $data = file_get_contents($fileName);
        $data = iconv( 'Windows-1251', 'UTF-8', $data);

        switch($this->type) {
            case 'caesar':
                $coded = Caesar::code($data, $this->code);
                break;
            case 'caesar_decode':
                $coded = Caesar::decode($data, $this->code);
                break;
            case 'vigener':
                $coded = Vigener::code($data, $this->code);
                break;
            case 'vigener_decode':
                $coded = Vigener::code($data, $this->code);
                break;

            default:
                die('Неизвестный тип кодирования');
        }

        $coded = iconv( 'UTF-8', 'Windows-1251', $coded);

        $this->outFileUrl = '/uploads/result.txt';

        file_put_contents(\Yii::getAlias('@webroot') . $this->outFileUrl, $coded);
    }



}
