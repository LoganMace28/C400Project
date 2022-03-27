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
	$query = "SELECT Price FROM cars where Year = :year and Make = :make and Model = :model";
	$stmt = $pdo->prepare($query);
	$stmt->bindValue(':year', $year);
	$stmt->bindValue(':make', $make);
	$stmt->bindValue(':model', $model);
	$stmt->execute();
	$_SESSION["basePrice"] = $stmt->fetchColumn();

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

	$_SESSION["finalValue"] = $conPrice + $options -$degReduction;
	//echo $conPrice ." " . $options . " " . $degReduction . " mileage value: ". $mileage ;
	echo "The True value of your vehicle is: " . $_SESSION["finalValue"];

	//$trueValue = $_SESSION["basePrice"] * 

	// foreach ($pdo->query($query) as $row) {
	// 	print $row['Price'] . "\t";

	// if (!($result = $pdo->query($query))) {
	// 	print( "<p>Could not execute query!</p>" );
	// 	die("</body></html>");
	// } 
	// else {

	 
}
// 	foreach ($author_arr as $author) {
// 		$aid = $authors_ids[$author];
// 		$query_books_authors = "INSERT INTO books_authors (BID, AID)";
// 		$query_books_authors .= "VALUES ('$bookid' , '$aid')";
// 		if (!($result = $pdo->query($query_books_authors))) {
// 			print("<p>Could not execute books-authors query!</p>");
// 			die("</body></html>");
// 		}
// 	}
// 	echo "<h2>Books-Authors table was successfully updated with " .
// 		count($author_arr) . " rows</h2>";
// 	//All book ids and titles that are authored by each author whose name was checked in the 
// 	//form during the insert operation:
// 	foreach ($author_arr as $author) {
// 		$query_author_titles = "SELECT books.Title FROM books, authors, books_authors ";
// 		$query_author_titles .= "WHERE books.ID = books_authors.BID AND authors.ID = books_authors.AID ";
// 		$query_author_titles .= "AND authors.Name = \"$author\"";
// 		if (!($result = $pdo->query($query_author_titles))) {
// 			print("<p>Could not execute select book titles for each author query!</p>");
// 			die("</body></html>");
// 		} else {
// 			echo "<p><strong>All books authord by " . "$author" . ":</strong></p>";
// 			while ($row = $result->fetch(PDO::FETCH_NUM)) {
// 				foreach ($row as $value)
// 					print("$value" . "<br>");
// 			}
// 		}
// 	}
// 	$displayForm = true;
// 	echo "<p><a href=\"BooksDBInsertDeleteAllOne.php\">Add some more?</a></p>\n";
// }
?>