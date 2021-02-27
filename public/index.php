<form action="search.php" method="get">
    <input name="comment" type="text">
    <input type="submit" value="Найти">
</form>
<ul>
<?php if ($results) {
  foreach ($results as $item):?>
        <li>
            post:
            <br>
            <?php echo $item["title"];?>
            <br>
            comments:
            <br>
            <?php echo $item["body"]; ?>comments
        </li>
    <?php endforeach;
};?>
</ul>
