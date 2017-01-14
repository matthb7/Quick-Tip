<?php
	/* Function to check if value is a number greater than 0 */
	function isValid($value) {
        return is_numeric($value) && $value > 0;
    }
    /* Function return appropriate tip percentage given distinct option */
    function getTip($option) {
    	if ($option == 'custom' && $_POST['tipCust'] && isValid($_POST['tipCust'])) {
    		return $_POST['tipCust'];
    	}
    	if (isValid($option)) {
    		return $option;
    	}
    	return false;
    }
    /* Function return appropriate tip amount given bill and tip values */
   	function getTipAmt($bill, $tip) {
   		if (isValid($bill) && isValid($tip)) {
   			return $bill * ($tip / 100);
   		}
   		return false;
   	}
   	/* Check if submit button is clicked */
	if (isset($_POST['submit'])) {
		/* Check if bill is valid */
		if (isset($_POST['bill']) && isValid($_POST['bill'])) {
			$bill = $_POST['bill'];
			/* Check if tip is valid */
			if (isset($_POST['tipOpt']) && ($tip = getTip($_POST['tipOpt'])) != false) {
				$tipAmt = getTipAmt($bill, $tip);
				$totAmt = $bill + $tipAmt;
				$_POST['tipAmt'] = round($tipAmt, 2);
		    	$_POST['totAmt'] = round($totAmt, 2);
				$split = $_POST['split'];
				/* Check if split is valid */
				if (isValid($split)) {
					$tipEach = $tipAmt / $split;
	    			$totEach = $totAmt / $split;
	    			$_POST['tipEach'] = round($tipEach, 2);
	    			$_POST['totEach'] = round($totEach, 2);
				}
				/* Identify split section as incorrect */
				elseif (empty($split) == false || $split == '0') {
					$_POST['fix'] = 'split';
				}
			}
			/* Identify tip section as incorrect */
			else {
				$_POST['fix'] = 'tip';
			}
		}
		/* Identify bill section as incorrect */
		else {
			$_POST['fix'] = 'bill';
		}
	} 
?>