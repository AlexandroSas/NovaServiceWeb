<?php
    # Comments
    // Comments
    /* 
        Multiple lines
        Comments
    */

    echo 'Print in the Page';
    echo 'Hello', 123;                              # Can use multiple elements
    print 123;                                      # Can print only one element
    print_r([1,2,3]);                               # Can print Arrays
    var_dump('Hello');                              # Show some info about the Element
    var_export('Hello');                            # Print with the quotes

    $name = 'Alexandro';
    $age = 23;
     
    echo $name . ' is ' . $age . ' years old';
    echo "${name} is ${age} years old";

    define('HOST', 'localhost');                    # Constants

    # Arrays
    $numbers = [1,44,55];
    $fruits = array('apple','orange', 'pear');
    $hex = [
        'red' => '#f00',
        'green' => '#0f0',
        'blue' => '#00f'
    ];
    $multi = [
        [
            'name' => 'Alexandro',
            'age' => 23
        ],
        [
            'name' => 'Anastasia',
            'age' => 21
        ]
    ];

    echo $fruits[0];
    echo $hex['red'];


    # Cookies
    setcookie('name', 'Brad', time() + 86400 * 30);

    if(isset($_COOKIE['name'])){
        echo $_COOKIE['name'];
    }

    setcookie('name', '', time() - 86400);


    ## Session

    # Login
    if($username == 'Alexandro' && $password == '1234'){
        $_SESSION['username'] = $username;
        header('Location: ./dashboard.php');        
    } else {
        echo 'Incorrect Login';
    }
    
    # Dashboard
    session_start();
    if(isset($_SESSION['username'])){
        $name = $_SESSION['username'];
        echo "Helo ${name}";
    } else {
        echo "Welcome Guest";
    }

    # Logout
    session_start();
    session_destroy();
    header('Location: ./index.php');

    ## Database
    define('DB_HOST', 'localhost');
    define('DB_USER', 'NovaService');
    define('DB_PASS', 'Nova2022');
    define('DB_NAME', 'test');

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if($conn->connect_error){
        die('Connection Failed ' . $conn->connect_error);
    }

    $sql = 'SELECT * FROM user';
    $result = mysqli_query($conn, $sql);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    # INSERT
    $sql = 'INSERT INTO user () VALUES ()';
    if(mysqli_query($conn, $sql)){
        header('Location: ./qualcosa.php');
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }


?>