<?php

global $redux_ticker;

#echo '<pre>'.print_r($redux_ticker, true).'</pre>';

echo '<div id="eat-marquee" class="clearfix">';
	if (isset($redux_ticker['ticker_content']) && is_array($redux_ticker['ticker_content'])) {
		foreach($redux_ticker['ticker_content'] as $ticker_line){
			echo '<span>'.$ticker_line.'</span>';	
		}
	}

echo '</div>';