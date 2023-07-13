<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentiment\Analyzer;

class SentimentController extends Controller
{
    public function index(){
        $analyzer = new Analyzer(); 
        $array = [];
        if (($handle = fopen("https://gist.githubusercontent.com/derror/24b62116c54d4c18d99b5c3527590d54/raw/510fd70161608e1bcb7b44276b89ebf06ed9cd71/dataset-gymbeam-product-descriptions-eng.csv", "r")) !== FALSE) {
            fgetcsv($handle, 1000, ",");
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $eval = $analyzer->getSentiment(strip_tags($data[1]));
                if(0 > $eval['compound']){
                    $tmp = ['name'=> $data[0] ,'text' => $data[1], 'sentiment'=> 'negative', 'sentiment_score' => $eval['compound']];
                }else if(0 < $eval['compound']){
                    $tmp = ['name'=> $data[0] ,'text' => $data[1], 'sentiment'=> 'positive', 'sentiment_score' => $eval['compound']];
                }
                else{
                    $tmp = ['name'=> $data[0] ,'text' => $data[1], 'sentiment'=> 'neutral', 'sentiment_score' => $eval['compound']];
                }
                $array[]= $tmp;
            }
            fclose($handle);
        }

        $highestItem = null;
        $lowestItem = null;

        foreach ($array as $item) {
            // Check if current item has higher sentiment score than the highestItem
            if ($highestItem === null || $item['sentiment_score'] > $highestItem['sentiment_score']) {
                $highestItem = $item;
            }
        
            // Check if current item has lower sentiment score than the lowestItem
            if ($lowestItem === null || $item['sentiment_score'] < $lowestItem['sentiment_score']) {
                $lowestItem = $item;
            }
        }
       
        return view('index',['products'=>$array, 'lowest' => $lowestItem , 'highest' => $highestItem]);
        

    }
}
