<?php 
session_start();
		$year = $_SESSION["year"];
		$make = $_SESSION["make"];
		$model = $_SESSION["model"];
		if(isset($_POST['Mileage']))
			$mileage = $_SESSION["mileage"];
		else
			$mileage_error = "Mileage is required";
		
		if(isset($_POST['Condition']))
			$condition = $_SESSION["condition"];
		else
			$condition_error = "Condition is required";

		if (!empty($mileage_error) || !empty($condition_error))
			$inputError = true;

//===========================================================================
 if ($inputError == false) {
	$query = "SELECT Price, id FROM cars where Year = :year and Make = :make and Model = :model";
	$stmt = $pdo->prepare($query);
	$stmt->bindValue(':year', $year);
	$stmt->bindValue(':make', $make);
	$stmt->bindValue(':model', $model);
	$stmt->execute();
	$_SESSION["basePrice"] = $stmt->fetchColumn();
	$stmt->execute();
	$cid = $stmt->fetchColumn(1);

	$checked_arr = $_POST['check'];
	$options = count($checked_arr)*50;

	if ($condition == 1){
		$conPrice = $_SESSION["basePrice"];
	}else if ($condition == 2){
		$conPrice = $_SESSION["basePrice"] * (1.05);
	}else if ($condition ==3){
		$conPrice = $_SESSION["basePrice"] * (1.1);
	}else if ($condition == 4){
		$conPrice = $_SESSION["basePrice"] * (1.15);
	}

	if($mileage == 1){
		$degReduction = $_SESSION["basePrice"] * .01;
	}else if($mileage == 2){
		$degReduction = $_SESSION["basePrice"] * .05;
	}else if($mileage == 3){
		$degReduction = $_SESSION["basePrice"] * .1;
	}else if ($mileage == 4){
		$degReduction = $_SESSION["basePrice"] * .15;
	}else if ($mileage == 5){
		$degReduction = $_SESSION["basePrice"] * .20;
	}
	$displayForm = false;
	$_SESSION["finalValue"] = $conPrice + $options -$degReduction;
	$dealer = $_SESSION["finalValue"] *1.15;
	$cpo = $_SESSION["finalValue"] * 1.1;

	echo "<p>The private owner value of your vehicle is: " . $_SESSION["finalValue"] . "</p>";
	echo "<p>The suggested retail price of your vehicle is: " . $dealer. "</p>";
	echo "<p>The certified preowned price of your vehicle is: " . $cpo. "</p>";




	$query_history = "INSERT INTO car_owners (CID, OWID, BasePrice, PrivatePrice, dealer, cpo) VALUES (:cid,:owid,:baseprice,:privateprice,:dealer,:cpo)";
	$hist = $pdo->prepare($query_history);
	$hist->bindValue(':cid', $cid);
	$hist->bindValue(':owid', $owid);
	$hist->bindValue(':baseprice', $_SESSION["basePrice"]);
	$hist->bindValue(':privateprice', $_SESSION["finalValue"]);
	$hist->bindValue(':dealer', $dealer);
	$hist->bindValue(':cpo', $cpo);
	$hist->execute();


 }
?>