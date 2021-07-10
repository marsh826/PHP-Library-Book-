<?php
function addBook($name, $surname, $nationality, $yob, $yod, $bt, $ot, $yop, $genre, $sold,
$lan, $cip, $bp, $ps, $userID){
    global $conn;
    try {
        $conn->beginTransaction();
        //Author Data
        $stmt = $conn->prepare("INSERT INTO author(Name, Surname, Nationality, BirthYear, DeathYear)
        VALUES(:name, :surname, :nationality, :yob, :yod);");
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':surname', $surname);
        $stmt->bindValue(':nationality', $nationality);
        $stmt->bindValue(':yob', $yob);
        $stmt->bindValue(':yod', $yod);
        $stmt->execute();

        //Book Data
        $lastauthorID = $conn->lastInsertID();
        $stmt = $conn->prepare("INSERT INTO book(BookTitle, OriginalTitle, YearofPublication, Genre, 
        MillionsSold, LanguageWritten, CoverImagePath, AuthorID)
        VALUES(:bt, :ot, :yop, :genre, :sold, :lan, :cip, :authorid);");
        $stmt->bindValue(':bt', $bt);
        $stmt->bindValue(':ot', $ot);
        $stmt->bindValue(':yop', $yop);
        $stmt->bindValue(':genre', $genre);
        $stmt->bindValue(':sold', $sold);
        $stmt->bindValue(':lan', $lan);
        $stmt->bindValue(':cip', $cip);
        $stmt->bindValue(':authorid',$lastauthorID);
        $stmt->execute();

        //BookPlot Data
        $lastbookID = $conn->lastInsertID();
        $stmt = $conn->prepare("INSERT INTO bookplot(Plot, PlotSource, BookID) 
        VALUES(:bp, :ps, :bookid);");
        $stmt->bindValue(':bp', $bp);
        $stmt->bindValue(':ps', $ps);
        $stmt->bindValue(':bookid', $lastbookID);
        $stmt->execute();

        //Changelog Date Create Insert. This inserts date created, bookid and userid.
        $datecreated = (date('y-m-d h:m:s'));
        $lastbookID = $conn->lastInsertID();
        $stmt = $conn->prepare("INSERT INTO changelog(DateCreated, BookID, UserID)
        VALUES(:datecreated, :bookid, :userid);");
        $stmt->bindValue(':datecreated', $datecreated);
        $stmt->bindValue(':bookid', $lastbookID);
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

function addBook2($existauthor, $bt, $ot, $yop, $genre, $sold,
$lan, $cip, $bp, $ps, $userID){
    global $conn;
    try {
        $conn->beginTransaction();
        //Author Data already exist

        //Book Data
        $stmt = $conn->prepare("INSERT INTO book(BookTitle, OriginalTitle, YearofPublication, Genre, 
        MillionsSold, LanguageWritten, CoverImagePath, AuthorID)
        VALUES(:bt, :ot, :yop, :genre, :sold, :lan, :cip, :authorid);");
        $stmt->bindValue(':bt', $bt);
        $stmt->bindValue(':ot', $ot);
        $stmt->bindValue(':yop', $yop);
        $stmt->bindValue(':genre', $genre);
        $stmt->bindValue(':sold', $sold);
        $stmt->bindValue(':lan', $lan);
        $stmt->bindValue(':cip', $cip);
        $stmt->bindValue(':authorid',$existauthor);
        $stmt->execute();

        //BookPlot Data
        $lastbookID = $conn->lastInsertID();
        $stmt = $conn->prepare("INSERT INTO bookplot(Plot, PlotSource, BookID) 
        VALUES(:bp, :ps, :bookid);");
        $stmt->bindValue(':bp', $bp);
        $stmt->bindValue(':ps', $ps);
        $stmt->bindValue(':bookid', $lastbookID);
        $stmt->execute();

        //Changelog Date Create Insert. This inserts date created, bookid and userid.
        $datecreated = (date('y-m-d h:m:s'));
        $stmt = $conn->prepare("INSERT INTO changelog(DateCreated, BookID, UserID)
        VALUES(:datecreated, :bookid, :userid);");
        $stmt->bindValue(':datecreated', $datecreated);
        $stmt->bindValue(':bookid', $lastbookID);
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
