<!DOCTYPE html>
<html>
<head>
    <title>News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<div class="container">
    @include("layouts.header")
    <?php
    $news = array();
    $news[0]["title"] = "Starfield Blasts Off On PlayStation 5 Next Month";
    $news[0]["date"] = "Mar 17, 2026 at 01:38 PM";
    $news[0]["author"] = "Marcus Stewart";
    $news[0]["image"] = "images/news0.webp";
    $news[0]["content"] = "<p>Bethesda’s open-world sci-fi RPG Starfield is leaping to a new star system. And by that, we mean PlayStation 5, which happens on April 7.</p>
<p>Starfield first launched for Xbox Series X/S and PC in September 2023, and centers on players controlling a space miner who pilots a customizable ship to visit explorable planets within the Milky Way galaxy to solve an ancient mystery. The PlayStation 5 version will include every post-launch update as well as the upcoming Free Lanes update, which goes live for everyone on the same day.</p>
<p>Gameplay takes advantage of the DualSense controller’s adaptive triggers to add a unique feel to different weapons, and the controller’s light bar will indicate the health of both your character and your starship. The touchpad can also be used as a shortcut for switching between points-of-view, opening the map, and using the hand scanner.</p>";

    $news[1]["title"] = "Marvel Maximum Collection Arrives This Month";
    $news[1]["date"] = "Mar 13, 2026 at 09:34 AM";
    $news[1]["author"] = "Marcus Stewart";
    $news[1]["image"] = "images/news1.webp";
    $news[1]["content"] = "<p>Marvel Maximum Collection, the retro compilation of six Marvel arcade and early console games, has a release date,  and it’s only a couple of weeks away. You can take a trip down comic book memory lane on March 27.</p>
<p>The collection of classic Konami sidescrolling action games is being assembled by Limited Run Games, and it will be available in both digital and physical formats. The collection includes titles from across Arcade, NES, Super Nintendo, and Sega Genesis, most of which have never been ported to other modern platforms. Here is the full line-up:</p>
<ul>
<li>X-Men: The Arcade Game (Arcad) </li>
<li>Captain America and The Avengers (Arcade, Sega Genesis, NES)</li>
<li>Spider-Man/Venom: Maximum Carnage (Super Nintendo, Sega Genesis)</li>
<li>Spider-Man/Venom: Separation Anxiety (Super Nintendo, Sega Genesis)</li>
<li>Spider-Man/X-Men: Arcade’s Revenge (Super Nintendo, Sega Genesis, Game Boy, Game Gear)</li>
<li>Silver Surfer (NES)</li>
</ul>";

    $news[2]["title"] = "Crimson Desert Specs For PC, Console, And Other Platforms Revealed";
    $news[2]["date"] = "Mar 10, 2026 at 05:13 PM";
    $news[2]["author"] = "Dias Ayupov";
    $news[2]["image"] = "images/news2.webp";
    $news[2]["content"] = "<p>Pearl Abyss has revealed the specifications for its upcoming open-world RPG Crimson Desert. Whether you plan to play the game on PC, console, Mac, or even the Xbox ROG Ally, you’ll now know exactly how powerful your machine needs to be when the game launches next week on March 19.</p>
<p><b>Performance Specs</b></p>
<p><b>Minimum:</b> Upscaled 1080p (from 900p) 30 FPS</p>
<p><b>Low:</b> 1080p/30 FPS</p>
<p><b>Recommended:</b> 1080p/60 FPS, 4K/30 FPS</p>
<p><b>High:</b> 1440p/60 FPS</p>
<p><b>Ultra:</b> 4K/60 FPS</p>
<p><b>GPU</b></p>
<p><b>Minimum:</b> AMD Radeon RX 5500 XT Nvidia GeForce GTX 1060</p>
<p><b>Low:</b> AMD Radeon RX 6500 XT Nvidia GeForce GTX 1660</p>
<p><b>Recommended:</b> AMD Radeon RX6700 XT Nvidia GeForce RTX 2080</p>
<p><b>High: </b>AMD Radeon RX 7700 XT Nvidia GeForce RTX 4070</p>
<p><b>Ultra:</b> AMD Radeon RX 9070 Nvidia GeForce RTX 5070 Ti</p>

<p><b>CPU</b></p>
<p><b>Minimum: </b>AMD Ryzen 5 2600X Intel i5-8500</p>
<p><b>Low:</b> AMD Ryzen 5 2600X Intendo i5-8500</p>
<p><b>Recommended:</b> AMD Ryzen 5 5600 Intel i5-11600K</p>
<p><b>High:</b> AMD Ryzen 5 7600X Intel i5-12600K</p>
<p><b>Ultra: </b>AMD Ryzen 7 7700X Intel i5-13600K</p>

<p><b>RAM</b></p>
<p><b>All:</b> 16 GB</p>
";

    $news[3]["title"] = "The Video Games You Should Play This Weekend";
    $news[3]["date"] = "Mar 06, 2026 at 03:56 PM";
    $news[3]["author"] = "Kyle Hilliard";
    $news[3]["image"] = "images/news3.webp";
    $news[3]["content"] = "<p>Welcome to Friday! Between responding to all my LinkedIn notifications from folks congratulating me on my one-year anniversary at Game Informer, I have put together our weekly posting of weekend games to play. Of course, I have been with Game Informer since 2011, but it’s a complicated story, and I appreciate all the friendly, if not entirely accurate, well-wishes. Also, the important detail is that it has been a year since our grand return last year, and we’re feeling good!</p>
<p><b>Pokémon Pokopia</b></p>
<p><i>Marcus Stewart</i></p>
<p>I’m what you would call a lapsed Pokémon fan. I was 10 when Pokémon Red and Blue first hit the U.S., and I was absolutely obsessed with the franchise during that magical first generation as a kid who also wanted to be the very best. However, I fell off the franchise hard during Gen 2 (partially because my GBA with my in-progress copy of Gold was stolen) and never fully got back into it, save for sporadic check-ins like the 2016 Pokémon Go craze. Still, I’ve retained a soft spot for the franchise despite watching it grow from afar and have waited for it to offer something more interesting and, frankly, weirder than the standard RPGs to draw me back in.</p>
<p>When I first laid eyes on Pokémon Pokopia and its derpy-faced Ditto protagonist, I was charmed from the get-go. I enjoyed what I played of the Dragon Quest Builders games and had fun with Animal Crossing: New Horizons, so a Pokémon-themed amalgamation of those experiences sounded super appealing. Plus, again, the premise of a Ditto masquerading as a barely passable human is delightfully stupid. I’m still very early in the game, but I’m drawn to its low-key post-apocalyptic world (humanity is dead missing!), and I can already feel its cozy hooks digging into me as my to-do list starts to populate. Plus, with the real world seemingly falling apart in various ways, it feels good to put a different one back together. The lesson: be the Ditto that copies the person you want to see in this world.</p>";


    echo "<div class='w-75 m-auto'>";
    for ($i = 0; $i < count($news); $i++) {
        echo "<h2 class='text-center'>" . $news[$i]["title"] . "</h2>" . "<br>";
        echo "<p class='fs-5 text-center fw-bold'>Date: " . $news[$i]["date"] . "<br>" . "Author: " . $news[$i]['author'] . "</p>" . "<br>";
        $picture = $news[$i]["image"];
        echo "<img src=$picture class='w-100'>";
        echo "<span class='fs-5'>" . $news[$i]["content"] . "</span>" . "<br>";
        echo "<hr>";
    }
    echo "</div>";
    ?>
    @include("layouts.footer")

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous">
</script>
</body>
</html>
