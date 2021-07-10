<?php
function updateBook($authorid, $name, $surname, $nationality, $yob, $yod, $bookid, $bt, $ot, $yop, $genre, $sold,
$lan, $cip, $bpid, $plot, $ps, $userID) {
    global $conn;
    try {
        $conn->beginTransaction(); 
        //Update author table
        $editauthor = "UPDATE author Set Name = :name, Surname = :surname, Nationality = :nationality,
        BirthYear = :yob, DeathYear = :yod Where AuthorID = :authorid";
        $stmt = $conn->prepare($editauthor);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':surname', $surname);
        $stmt->bindValue(':nationality', $nationality);
        $stmt->bindValue(':yob', $yob);
        $stmt->bindValue(':yod', $yod);
        $stmt->bindValue(':authorid', $authorid);
        $stmt->execute();

        //Update book table
        $editbook = "UPDATE book Set BookTitle = :bt, OriginalTitle = :ot, YearofPublication = :yop,
        Genre = :genre, MillionsSold = :sold, LanguageWritten = :lan, AuthorID = :authorid, 
        CoverImagePath = :cip Where BookID = :bookid";
        $stmt = $conn->prepare($editbook);
        $stmt->bindValue(':bt', $bt);
        $stmt->bindValue(':ot', $ot);
        $stmt->bindValue(':yop', $yop);
        $stmt->bindValue(':genre', $genre);
        $stmt->bindValue(':sold', $sold);
        $stmt->bindValue(':lan', $lan);
        $stmt->bindValue(':authorid',$authorid);
        $stmt->bindValue(':cip', $cip);
        $stmt->bindValue(':bookid', $bookid);
        $stmt->execute();

        //Update bookplot table
        $editbookplot = "UPDATE bookplot SET BookID = :bookid, Plot = :plot, PlotSource = :ps 
        Where BookPlotID = :bpid ";
        $stmt = $conn->prepare($editbookplot);
        $stmt->bindValue(':bookid', $bookid);
        $stmt->bindValue(':plot', $plot);
        $stmt->bindValue(':ps', $ps);
        $stmt->bindValue(':bpid', $bpid);
        $stmt->execute();

        //edit changelog table, prepared statement
        $UpdateChangelog = "UPDATE changelog SET DateChanged = :datechanged,
        UserID = :userid Where BookID = :bookid";
        $datechanged = (date('y-m-d h:m:s'));
        $stmt = $conn->prepare($UpdateChangelog);
        // bind parameters
        $stmt->bindValue(':datechanged', $datechanged);
        $stmt->bindValue(':bookid', $bookid);
        $stmt->bindValue(':userid', $userID);
        $stmt->execute();
        //commit
        $conn->commit();
    }
    catch(PDOException $ex) {
        $conn->rollBack();
        throw $ex;
    }
  }
?>