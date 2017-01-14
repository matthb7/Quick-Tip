<!-- Include PHP -->
<?php include('scripts/calculate.php') ?>
<!DOCTYPE html>
<html lang="en" style="background-image: url('img/background.jpg');">
	<head>
		<meta charset="utf-8">
	  	<meta name="description" content="This an application to help calculate tip percentages.">
	  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Tip Calculator</title>
		<!-- Include CSS -->
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>
		<div id="title">
			<h1>Quick Tip</h1>
		</div>
		<div id="form">
			<form action="" method="post">
				<div id="bill" <?php if (isset($_POST['fix']) && $_POST['fix'] == 'bill') echo ' style="background-color: red;"'; ?>>
					<h3>Enter values and click submit to calculate your tip!</h3>
					Bill Subtotal: 
					<input type="text" name="bill" value="<?php if (isset($_POST['bill'])) echo $_POST['bill']; ?>"><br>
				</div>
				<div id="tip" <?php if (isset($_POST['fix']) && $_POST['fix'] == 'tip') echo ' style="background-color: red;"'; ?>>
					Tip Percentage: <br>
					<?php for ($i=10; $i<=20; $i=$i+5) { ?>
						<input type="radio" name="tipOpt" value="<?php echo $i; ?>"
							<?php if (isset($_POST['tipOpt']) && $_POST['tipOpt'] == $i) echo ' checked="checked"'; ?>>
						<?php echo $i."%"; ?>
					<?php } ?><br>
					<input type="radio" name="tipOpt" value="custom" 
						<?php if (isset($_POST['tipOpt']) && $_POST['tipOpt'] == 'custom') echo ' checked="checked"'; ?>>
					Custom: <input type="text" name="tipCust" value="<?php if (isset($_POST['tipCust'])) echo $_POST['tipCust']; ?>">%<br>
				</div>
				<div id="split" <?php if (isset($_POST['fix']) && $_POST['fix'] == 'split') echo ' style="background-color: red;"'; ?>>
					Split: <input type="text" name="split" value="<?php if (isset($_POST['split'])) echo $_POST['split']; ?>"> Person(s)<br>
				</div>
				<input id="submit" class="submit" type="submit" name="submit">
			</form>
			<div id="result" <?php if (isset($_POST['fix']) == false) echo ' style="color: #3cb371;"'; ?>>
				<?php if (isset($_POST['fix'])) { ?>
					You have invalid or missing information!<br>Please fix the red section and try again!
				<?php } elseif (isset($_POST['tipAmt']) && isset($_POST['totAmt'])) { ?>
					Tip: $<?php echo $_POST['tipAmt']; ?><br>
					Total: $<?php echo $_POST['totAmt']; ?><br>
				<?php } if (isset($_POST['tipEach']) && isset($_POST['totEach'])) { ?>
					Tip each: $<?php echo $_POST['tipEach']; ?><br>
					Total each: $<?php echo $_POST['totEach']; ?><br>
				<?php } ?>
			</div>
		</div>
	</body>
</html>