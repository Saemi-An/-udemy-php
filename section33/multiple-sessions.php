<?php

session_start();

if ( session_id() === '')  {
    session_start();
}
