<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>hn-reader</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.2.0/normalize.min.css">
    <style>
        @import 'https://fonts.googleapis.com/css?family=Lato';
        html {
            font-size: 16px;
        }
        body {
            font-family: Lato;
            color: #3d3d3d;
            background-color: #efefef;
            padding: 0.5rem;
            line-height: 1.4;
        }
        a {
            text-decoration: none;
            color: DarkOrange;
        }
        h1 {
            font-size: 1.25rem;
        }
        time {
            font-size: .75rem;
        }
        .masonry article > time,
        .comments {
            display: block;
        }
        h1,
        time {
            margin: 0 0 .5rem 0;
        }
        .masonry {
            -webkit-column-count: 4;
            -moz-column-count: 4;
            column-count: 4;
            -webkit-column-gap: 0;
            -moz-column-gap: 0;
            column-gap: 0;
        }
        @media (max-width: 1200px) {
            .masonry {
                -webkit-column-count: 3;
                -moz-column-count: 3;
                column-count: 3;
            }
        }
        @media (max-width: 1000px) {
            .masonry {
                -webkit-column-count: 2;
                -moz-column-count: 2;
                column-count: 2;
            }
        }
        @media (max-width: 600px) {
            .masonry {
                -webkit-column-count: 1;
                -moz-column-count: 1;
                column-count: 1;
            }
        }
        .masonry article {
            background-color: #fff;
            -webkit-column-break-inside: avoid;
            page-break-inside: avoid;
            break-inside: avoid;
            background-color: #fff;
            padding: 1rem;
            margin: 1rem .5rem;
        }
    </style>
</head>
<body>

<?php 
date_default_timezone_set('UTC');
$feed = "https://news.ycombinator.com/rss";
$xml = simplexml_load_file($feed);
// Traverse xml tree to items
$entries = $xml->xpath("//item");
?>

    <div class="masonry">
    <?php foreach ($entries as $entry): ?>
        <article>
            <h1><a href="<?= $entry->link ?>"><?= $entry->title ?></a></h1>
            <time><?= date('d.m.y', strtotime($entry->pubDate)) ?></time>
            <a class="comments" href="<?= $entry->comments ?>">Comments</a>
        </article>
    <?php endforeach ?>
    </div>

</body>
</html>
