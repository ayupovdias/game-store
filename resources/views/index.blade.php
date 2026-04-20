<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Advertisement</title>
    <script
        src="https://code.jquery.com/jquery-4.0.0.js"
        integrity="sha256-9fsHeVnKBvqh3FB2HYu7g2xseAZ5MlN6Kz/qnkASV8U="
        crossorigin="anonymous">

    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<div class="container">

    @include("layout.header")
    <?php
        $games=array();
        $games[0]["title"]="Minecraft";
        $games[0]["description"]="Minecraft is a block-based sandbox survival game. The game drops players into a wide-open procedurally generated world where everything is made of blocks that the players can break down and place elsewhere, rearranging things as they see fit";
        $games[0]["genres"]="Survival, First person, Sandbox";
        $games[0]["price"]=10000;

        $games[1]["title"]="Half life 2";
        $games[1]["description"]="Half-Life 2, or HL2 (short), was released on November 16, 2004 by Valve Corporation. Half-Life 2 is a FPS science-fiction sequel from the game Half-Life. In addition, it's the game which Garry's Mod is derived from, the latter originally being a mod for the former, before being made into a game in its own right";
        $games[1]["genres"]="Shooter, Action-adventure";
        $games[1]["price"]=2000;

        $games[2]["title"]="Battlefield 5";
        $games[2]["description"]="Battlefield V, also known as Battlefield 5, BFV or BF5 (development code-name 'Casablanca') is the sixteenth installment in the Battlefield Series developed by DICE and published by EA.";
        $games[2]["genres"]="Shooter, Battle royale";
        $games[2]["price"]=35000;

        $games[3]["title"]="Call of Duty Black Ops 3";
        $games[3]["description"]="The Black Ops series goes further into the future with Call of Duty: Black Ops 3 adding new tech, gadgets and abilities to the FPS gameplay.";
        $games[3]["genres"]="Shooter, Battle royale";
        $games[3]["price"]=40000;

        $games[4]["title"]="Terraria";
        $games[4]["description"]="Terraria is a platform RPG, released by Re-Logic in 2011. In this open world RPG, the player are free to explore, mine and transform the landscape, while engaging in combat against enemies";
        $games[4]["genres"]="Survival, Sandbox";
        $games[4]["price"]=5000;
    ?>


     <div class="mt-3 d-flex align-items-center">
        <img src="images/poster.png" class="w-25 h-50">
        <button style="margin-top:-450px" class="btn btn-outline-danger x">X</button>
        <div>
            <div class="row mt-3">
                <h3 class="col-3">Name</h3>
                <h3 class="col-6">Description</h3>
                <h3 class="col-2">Genres</h3>
                <h3 class="col-1">Price</h3>
            </div>
            <?php
            for($i=0;$i<count($games);$i++){
                echo "<div class='row mt-3'>
                        <h3 class='col-3 fw-bold-none fs-4'>{$games[$i]["title"]}</h3>
                        <h3 class='col-6 fs-6'>{$games[$i]["description"]}</h3>
                        <h3 class='col-2 fs-6'>{$games[$i]["genres"]}</h3>
                        <h3 class='col-1 fs-5'>{$games[$i]["price"]}тг</h3>
               </div>";
            }
            ?>
        </div>
    </div>
    @include("layout.footer")
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function () {
            $(".x").click(function () {
                $("img").hide("fast")
                $(this).slideUp("fast")
            })
        })
    </script>

</body>
</html>
