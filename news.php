<?php

$file_url = "http://feeds.abcnews.com/abcnews/usheadlines";

$content = file_get_contents($file_url);
if (!$content) {
    echo "No content!";
    exit;
}

$stories = simplexml_load_string($content);
if (!$stories) {
    echo "Something wrong with the news stories";
    exit;
}

echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>';
echo '<title>News Grid</title>';
echo '<link rel="stylesheet" type="text/css" href="assets/styles.css">';
echo '</head>';
echo '<body>';

echo '<div class="grid-container">';

foreach ($stories->channel->item as $item) {
    $title = (string)$item->title;
    $link = (string)$item->link;
    $pubDate = (string)$item->pubDate;
    $description = (string)$item->description;

    echo '<div class="grid-item">'; 
    echo "<h2>$title</h2>";
    echo "<p><strong>Date:</strong> $pubDate</p>";
    echo "<p><strong>Description:</strong> $description</p>";
    echo "<p><a href=\"$link\">Read more</a></p>";
    echo '</div>';
}

echo '</div>';

echo '</body>';
echo '</html>';

?>
