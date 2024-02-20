<main class="main-entry">
    <h2>Enter a number</h2>

    <form class="main-entry__form" id="enterNumber" method="GET" action="<?php echo $_SERVER["PHP_SELF"];?>">

    <!-- <label for="first"></label> -->
    <input type="text" class="main-entry__input" name="num" id="num" aria-labelledby="enterNumber" maxlength="2" autocomplete="off" autofocus required ></input>
    <button class="main-entry__button">GO!</button>
    <br><br>


    </form>
</main>