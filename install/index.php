<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($servername, $username, $password);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "CREATE DATABASE quizzy";
    if ($conn->query($sql)) {
        echo "Created successfully";
    } else {
        echo "Error creating database: " . $conn->error . " | Please remove existing database from phpmyadmin.";
    }
    $conn->select_db('quizzy');
    $conn->query("CREATE TABLE IF NOT EXISTS `questions` ( `queid` int(11) NOT NULL, `question` varchar(200) NOT NULL, `option_1` varchar(50) NOT NULL, `option_2` varchar(50) NOT NULL, `option_3` varchar(50) NOT NULL, `option_4` varchar(50) NOT NULL, `correct_ans` int(11) NOT NULL )");
    $conn->query("CREATE TABLE IF NOT EXISTS `users` ( `username` varchar(10) NOT NULL, `fullname` varchar(60) NOT NULL, `password` varchar(20) CHARACTER SET macroman COLLATE macroman_bin NOT NULL, `quizmarks` int(11) NOT NULL, `highestmarks` int(11) NOT NULL )");
    $conn->query(" INSERT INTO `questions` (`queid`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `correct_ans`) VALUES (1, 'How old is the Earth?', '5 million years old', '10 million years old', '4.5 billion years old', '10 billion years old', 3), (2, 'Which is the largest ocean on our planet?', 'The Pacific Ocean', 'The Atlantic Ocean', 'The Indian Ocean', 'The Arctic Ocean', 1), (3, 'Which extinct bird lived on Mauritius?', 'The Phoenix', 'The Dodo', 'The Emu', 'The Great Auk', 2), (4, 'How old are the oldest trees?', '3000 years old.', '6000 years old.', '9000 years old.', '12000 years old.', 2), (5, 'Which is the longest mountain range on the planet?', 'The Himalayas', 'The Rockies', 'The Andes', 'The Alps', 3), (6, 'Which is the highest waterfall in the world?', 'Niagara', 'Angel', 'Iguazú', 'Victoria', 2), (7, 'Who was the first explorer to reach the South Pole?', 'Roald Amundsen', 'Ernest Shackleton', 'Robert Falcon Scott', 'Buzz Aldrin', 1), (8, 'What do you call the variation of life forms within an ecosystem?', 'Evolution', 'Biology', 'Biodiversity', 'Ecology', 3), (9, 'Above what altitude are travelers considered to be astronauts?', '30 kms', '50 kms', '80 kms', '100 kms', 3), (10, 'Where is the Earth located in the Solar System?', 'It\'s the fourth planet', 'It\'s the third planet', 'It\'s the second planet', 'It\'s the first planet', 2)");
    $conn->query("INSERT INTO `users` (`username`, `fullname`, `password`, `quizmarks`, `highestmarks`) VALUES ('xian', 'Malik Zubayer Ul Haider', '1234', 30, 30)");
    $conn->close();
    echo "<a href='/'>Get back to login</a>";
?>
