<?php 
		$year = $_POST['year'];
		if (empty($year)) 
			$year_error = "Year is required";
		$make = $_POST['make'];
		if (empty($make))
			$make_error = "Make is required";
		$model = $_POST['model_error'];
		if (empty($model))
			$model_error = "Model is required";
		if (!isset($_POST['Mileage']))
			$mileage_error = "Mileage is required";
		if (!isset($_POST['Condition']))
			$condition_error = "Condition is required";


		//PHP receive only selected checkboxes. Not selected checkboxes are not send by browser
		//So author[] is unknown to PHP unless the user has selected at least one index
		if(isset($_POST['author']))
			$author_arr = $_POST['author'];
		else
			$author_error = "Must select at least one author";
			
		if (!empty($year_error) || !empty($make_error) || !empty($model_error ||
			!empty($mileage_error) || !empty($condition_error)))
			$inputError = true;
		//===========================================================================
		if ($inputError == false) {
			//Books Query:
			$query_books = "INSERT INTO books (ID, Title, Category, ISBN, Price )";
			$query_books .= "VALUES ('$bookid' ,'$title', '$category', '$isbn', $price )";
      
			if (!($result = $pdo->query($query_books))) {
				print( "<p>Could not execute books query!</p>" );
				die("</body></html>" );
			} else {
				echo "<h2>Books table was successfully updated</h2>";
			}	
			foreach ($author_arr as $author) {
				$aid = $authors_ids[$author];
				$query_books_authors = "INSERT INTO books_authors (BID, AID)";
				$query_books_authors .= "VALUES ('$bookid' , '$aid')";
				if (!($result = $pdo->query($query_books_authors))) {
					print( "<p>Could not execute books-authors query!</p>" );
					die("</body></html>");
				} 
			}
			echo "<h2>Books-Authors table was successfully updated with " . 
				 count($author_arr) . " rows</h2>";
			//All book ids and titles that are authored by each author whose name was checked in the 
			//form during the insert operation:
			foreach ($author_arr as $author) {
				$query_author_titles = "SELECT books.Title FROM books, authors, books_authors ";
				$query_author_titles .= "WHERE books.ID = books_authors.BID AND authors.ID = books_authors.AID ";
				$query_author_titles .= "AND authors.Name = \"$author\"";
				if (!($result = $pdo->query($query_author_titles))) {
					print( "<p>Could not execute select book titles for each author query!</p>" );
					die("</body></html>");
				} 
				else {
					echo "<p><strong>All books authord by " . "$author" . ":</strong></p>";
					while ($row = $result->fetch(PDO::FETCH_NUM)) {
						foreach ( $row as $value ) 
							print( "$value" . "<br>");
					} 
				}
			}
			$displayForm = false;
			echo "<p><a href=\"BooksDBInsertDeleteAllOne.php\">Add some more?</a></p>\n";
		}
?>