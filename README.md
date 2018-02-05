# Maybank2u MYR Exchange to 28 Currencies

Money exchange from MYR to any 28 currencies or vice versa.
http://www.maybank2u.com.my/mbb_info/m2u/M2UCurrencyConverter.do

Please refer on the website for 28 currencies code.

Usage:
<code>exchangeprice($value, $curr, $action, $inverted);</code>

Parameter:
- $value (required) - string
  Value to be exchange.
- $curr (required) - string
  Currency code.
- $action (optional) - string
 "sellttod": Sell TT / OD
 "buytt": Buy TT
 "buyod": Buy OD
 "sellcn": Currency Notes (Sell)
 "buycn": Currency Notes (Buy)
- $inverted (optional) - boolean
 MYR to XXX: true
 XXX to MYR: false

Example:
<code>exchangeprice(640.00, 'USD', 'buycn', true);</code>

Use at ur own risk :3
