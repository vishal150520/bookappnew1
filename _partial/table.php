<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<style>
    .outer {
        height: 200vh;
    }

    .innr {
        width: 90%;
        padding: 2px;
        margin: auto;
        height: 100vh;
        overflow: scroll;
        border: solid 2px black;
        scroll-behavior: smooth;
        scroll-snap-type: mandatory;
    }

    @import url('https://fonts.googleapis.com/css2?family=Exo:ital,wght@1,300&family=Suez+One&display=swap');

    .outer h3 {
        width: 90%;
        font-family: 'Suez One', serif;
        margin: auto;
        letter-spacing: 1px;
        text-align: justify;
        background-color: aqua;
        margin: 20px auto;
        border: solid 1px black;
        padding: 5px;
    }

    .innr tr {
        width: 100%;
        height: 50px;
        text-align: center;
    }

    .tble-head {
        font-weight: bold;
        outline: solid 2px brown;
        font-family: 'Suez One', serif;
        font-size: 1.2rem;
        letter-spacing: 0.7px;
    }

    .tble-head td,
    .tble-bdy td {
        min-width: 180px;
        width: 100%;
        padding-left: 5px;
        outline: solid 1px rgb(231, 69, 69);
        border-collapse: separate;
        box-sizing: border-box;
    }

    .tble-bdy td {
        height: 130px;
        font-family: 'Exo', sans-serif;
        font-size: 1.07rem;
    }

    .tble-bdy td img {
        width: 100%;
        height: 100%;
    }

    .tble-bdy td button {
        padding: 6px 25px !important;
        letter-spacing: 0.7px;
    }
    .tble-bdy td:nth-child(1),
    .tble-head td:nth-child(1) {
        min-width: 0px;
        width: 15%;
    }
    .tble-bdy td:nth-child(2),
    .tble-head td:nth-child(2) {
        min-width: 0px;
        width: 30%;
    }
    @media only screen and (max-width:900px){
        .tble-bdy td:nth-child(2),
    .tble-head td:nth-child(2) {
        min-width: 150px;
    }
    .outer h3{
        font-size: 1.4rem;
    }
    .tble-bdy td:nth-child(1),
    .tble-head td:nth-child(1) {
        min-width: 50px;
    }
    }
</style>

<body>
    <div class="outer">
        <h3>All the data of Pdf book name with images here</h3>
        <div class="innr">
            <table>
                <thead class="tble-head">
                    <tr>
                        <td>Id</td>
                        <td>Book Image</td>
                        <td>Book Pdf</td>
                        <td colspan="2" >Action</td>
                    </tr>
                </thead>
                <?php
                include 'dbconn.php';
                $selectquery = "SELECT * FROM `books`";
                $query = mysqli_query($conn, $selectquery);
                while($result = mysqli_fetch_assoc($query)){
                    ?>
                <tbody class="tble-bdy">
                    <tr>
                        <td><?php echo $result['id'] ?></td>
                        <td><img src="<?php echo $result['pic'] ?>" alt=""></td>
                        <td><a href="<?php echo $result['pdf'] ?>" ><?php echo $result['bookname'] ?></a></td>
                        <td><a class="btn btn-outline-primary" href="_partial/update.php?id=<?php echo $result['id']; ?>">Edit</a></td>
                        <td><a class="btn btn-outline-danger" href="_partial/delete.php?id=<?php echo $result['id']; ?>">Delete</a></td>
                        
                    </tr>
                    
                </tbody>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>