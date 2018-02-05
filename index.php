<?php
function exchangeprice($value, $curr = 'USD', $action = 'buycn', $inverted = false) {
  $httpcode = 0;
  while ($httpcode != 200){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://www.maybank2u.com.my/mbb_info/m2u/M2UCurrencyConverter.do');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    preg_match_all('/' . $curr . '\|(.*)\"/', $response, $match);
    $data = explode('|', $match[1][1]);

    switch ($action) {
      case "sellttod":// Sell TT / OD
        $returnpr = $data[3];
        break;
      case "buytt":// Buy TT
        $returnpr = $data[4];
        break;
      case "buyod":// Buy OD
        $returnpr = $data[5];
        break;
      case "sellcn":// Currency Notes (Sell)
        $returnpr = $data[0];
        break;
      case "buycn":// Currency Notes (Buy)
        $returnpr = $data[6];
        break;
    }

    if (!$inverted) {
      return round($value * (1 / $returnpr), 2);
    } else {
      return round($value * $returnpr, 2);
    }
  }
}

echo exchangeprice(640.00, 'USD');
