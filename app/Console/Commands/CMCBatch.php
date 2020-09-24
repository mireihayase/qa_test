<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Marketcap;
use App\Coin;

class CMCBatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getCMCAPI';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get CMC API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $api_key = "3c009ce4-266e-485f-8371-4248d67b8cbd";
        $coinmarketcap_url = "https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?CMC_PRO_API_KEY=" .$api_key. "&start=1&limit=500";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $coinmarketcap_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // 実行結果を文字列で返す
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // サーバー証明書の検証を行わない
        $response = curl_exec($curl);
        $result = json_decode($response, true);
        curl_close($curl);

        $token_list = $result["data"];

        foreach ($token_list as $token) {
            $rank = $token['cmc_rank'];
            $symbol = $token['symbol'];
            $marketcap = Marketcap::updateOrCreate(['symbol' => $symbol],
                ['rank' => $rank]
                );
            $marketcap->save();
        }

        $coins = Coin::all();
        foreach ($coins as $coin) {
            $symbol = $coin['symbol'];
            $marketcap = Marketcap::where('symbol', $symbol)->update(['coin_id' => $coin['id']]);
        }
    }
}
