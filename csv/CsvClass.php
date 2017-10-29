<?php

/**
 * todo: learn how to use exception
 *
 */
class CsvClass
{

    private $csv_file_path;

    //public function __construct($file){
    //    if(!$this->is_valid($file)) exit;

    //    $this->csv_file_path = $file;
    //}

    /**
     * set()
     * set $file
     *
     * @param string
     * todo: stop procedure if $file is not valid
     *
     */
    public function set($file)
    {
        if(!$this->is_valid($file));

        $this->csv_file_path = $file;
    }

    /**
     * get()
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
        /**
         * 設定しても空行が読み飛ばされないのでコメントアウト。原因調査中です。
         *
         // CSV 列として行を読み込みます
         $file->setFlags(SplFileObject::READ_CSV);
        //ファイルの空行を読み飛ばします
        $file->setFlags(SplFileObject::READ_AHEAD);
        $file->setFlags(SplFileObject::SKIP_EMPTY);
        // 行末の改行を読み飛ばします
        $file->setFlags(SplFileObject::DROP_NEW_LINE);
         */

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
        try
        {
            $this->is_exist($file);
            $this->is_csv($file);
        }
        catch (Exception $e)
        {
            print "エラーが発生しました";
            error_log($e->getMessage());
            return false;
        }

        return true;
    }

    /**
     * is_exist()
     * check $file is exist and readable or not
     *
     * @param string
     * @return bool
     */
    private function is_exist($file)
    {
        if (!is_readable($file))
        {
            throw new Exception("ファイルが存在していないか読み込み可能ではありません。");
        }

    }

    /**
     * is_csv()
     * check $file is csv or not
     *
     * @param string
     * @return bool
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
