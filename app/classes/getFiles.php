<?php
namespace app\classes;


class getFiles
{
    private $files = array();

    public function getFiles($file_path, $file_type, $max_size, $multiple = false)
    {
        if (!is_int($max_size))
        {
            $max_size = 300000;
        }

        $this->getForm($multiple, $max_size, $file_type);

        if (isset($_FILES['file']))
        {
            foreach ($_FILES['file'] as $key => $file_info)
            {
                $this->files[$key] = $file_info;
            }

            $this->moveFilesToPath($file_path);
        }
    }

    private function getForm($multiple, $max_size, $file_type)
    {
        ?>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_size;?>">
            <?php
            if ($multiple === true)
            {
                echo "<input type='file' name='file[]' accept='{$file_type}' multiple>";
            }
            else
            {
                echo "<input type='file' name='file' accept='{$file_type}'>";
            }
            ?>
            <input type="submit">
        </form>
        <?php
    }

    private function moveFilesToPath($last_path)
    {
        if (is_array($this->files['tmp_name']))
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
