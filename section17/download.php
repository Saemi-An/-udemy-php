<?php
header('Content-Type: image/jpg');
header('Content-Disposition: attachment; filename=티그레 녹차.jpg');
header('Content-Length: ' . filesize(__DIR__ . '/' . '녹차 티그레.jpg'));

readfile(__DIR__ . '/' . '녹차 티그레.jpg');