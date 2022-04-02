<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\JapanPostcode;

class ImportPostalCodeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:japan-postalcode';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'import japan-postalcode';

    /**
     * Execute the console command.
     *
     * @return int
     */
    
    public function handle()
    {
        // テーブルを空にする
        JapanPostCode::truncate();

        // CSVファイルの文字コード変換
        $csv_path = storage_path('KEN_ALL.CSV');
        $converted_csv_path = storage_path('japan_post_code_utf8.csv');
        file_put_contents(
            $converted_csv_path,
            mb_convert_encoding(
                file_get_contents($csv_path),
                'UTF-8',
                'SJIS-win'
            )
        );

        // CSVから郵便データを取得してDBへ保存
        $file = new \SplFileObject($converted_csv_path);
        $file->setFlags(\SplFileObject::READ_CSV);

        foreach ($file as $row) {
            if (!is_null($row[0])) {
                JapanPostCode::create([
                    'postcode' => intval(substr($row[2], 0, 7)),
                    'prefecture' => $row[6],
                    'city' => $row[7],
                    'address' => (str_contains($row[8], '（')) ? current(explode('（', $row[8])) : $row[8]
                ]);
            }
        }
    }
}
