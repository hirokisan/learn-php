<?php

$csv_file_path = './sample.csv';

var_dump(getCsv($csv_file_path));

/**
 * getCsv
 *
 * convert csv file to array
 *
 * @see http://www.php.net/manual/ja/class.splfileobject.php#splfileobject.constants SplFileObject 
 * @param string
 * @return array
 */
function getCsv($csv_file_path)
{
    $is_first = true;
    $keys = [];
    $data = [];
    $count = 0;

    $file = new SplFileObject($csv_file_path);
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
