<?php
namespace app\classes;


class getFiles
{
    private $files = array();
    private static $instance = null;

    private function  __construct(){}
    private function __clone(){}
    private function __wakeup(){}

    public static function getInstance()
    {
        if (self::$instance === null)
        {
            self::$instance = new self;
        }

        return self::$instance;

    }

    public function getFiles($file_path)
    {
        if (isset($_FILES['file']))
        {
            foreach ($_FILES['file'] as $key => $file_info)
            {
                $this->files[$key] = $file_info;
            }

            $this->moveFilesToPath($file_path);
        }
    }

    private function moveFilesToPath($last_path)
    {
        if (is_array($this->files['name']) && is_array($this->files['tmp_name']))
        {
            foreach ($this->files['name'] as $name)
            {
                $path[] = $last_path.$name;
            }

            $counter = 0;

            foreach($this->files['tmp_name'] as $value)
            {
                if (!move_uploaded_file($value, $path[$counter]))
                {
                    unlink($path);
                    if (!move_uploaded_file($value, $path[$counter]))
                    {
                        die('не удалось сохранить файлы!');
                    }
                }
                $counter++;
            }
        }
        else
        {
            $path = $last_path.$this->files['name'];
            if (!move_uploaded_file($this->files['tmp_name'], $path))
            {
                unlink($path);
                if (!move_uploaded_file($this->files['tmp_name'], $path))
                {
                    die('не удалось сохранить файл!');
                }
            }
        }
    }
}
