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

foreach ($stories->channel->item as $item) {
    $title = (string)$item->title;
    $pubDate = (string)$item->pubDate;

    echo "<h2>Title: $title</h2>";
    echo "<p>Publication Date: $pubDate</p>";
    echo "<hr>";
}

?>
