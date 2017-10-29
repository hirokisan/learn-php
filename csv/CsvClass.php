<?php

/**
 * todo: write down phpdoc
 */
class CsvClass
{

    private $csv_file_path;

    /**
     * set method
     * set $file
     *
     * @param string
     * @return void
     */
    public function set($file)
    {
        $this->is_valid($file);

        $this->csv_file_path = $file;
    }

    /**
     * get method
     * convert csv file to array
     *
     * @see http://www.php.net/manual/ja/class.splfileobject.php#splfileobject.constants SplFileObject
     * @return array
     */
    public function get()
    {
        $is_first = true;
        $keys = [];
        $data = [];
        $count = 0;

        $file = new SplFileObject($this->csv_file_path);

        while(!$file->eof())
        {
            /**
             * $file->fgets()
             * 呼び出す度に次の行に移動してしまうので注意する
             */
            $input = $file->fgets();

            /**
             * 空行は除外する
             */
            if(empty($input)) continue;

            $line = str_getcsv($input);

            if($is_first)
            {
                $keys = $line;
                $count = count($keys);
                $is_first = false;
                continue;
            }

            /**
             * ヘッダー行と異なる要素数のデータは除外する
             */
            if($count != count($line)) continue;

            foreach ($keys as $index => $key) {
                $tmp[$key] = $line[$index];
            }
            $data[] = $tmp;
        }
        return $data;
    }

    private function is_valid($file)
    {
        $this->is_exist($file);
        $this->is_csv($file);
    }

    /**
     * is_exist method
     * check $file is exist and readable or not
     *
     * @param string
     * @return void
     * @throws Exception ファイルが存在していないか読み込み可能ではない場合
     */
    private function is_exist($file)
    {
        if (!is_readable($file))
        {
            throw new Exception("ファイルが存在していないか読み込み可能ではありません。");
        }
    }

    /**
     * is_csv method
     * check $file is csv or not
     *
     * @param string
     * @return void
     * @throws Exception CSVファイル以外の場合
     */
    private function is_csv($file)
    {
        $info = new SplFileInfo($file);

        if ($info->getExtension() != 'csv')
        {
            throw new Exception("CSVファイルのみ対応しています。");
        }
    }

}
