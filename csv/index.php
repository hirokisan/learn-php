<?php

$csv_file_path = './sample.csv';

if(!is_valid($csv_file_path)) return false;

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

function is_valid($csv_file_path)
{
    try
    {
        is_exist($csv_file_path);
        is_csv($csv_file_path);
    }
    catch (Exception $e)
    {
        print $e->getMessage();
        return false;
    }

    return true;
}

function is_exist($csv_file_path)
{
    if (!is_readable($csv_file_path))
    {
        throw new Exception("ファイルが存在していないか読み込み可能ではありません。");
    }

}

function is_csv($file)
{
    $info = new SplFileInfo($file);

    if ($info->getExtension() != 'csv')
    {
        throw new Exception("CSVファイルのみ対応しています。");
    }
}
