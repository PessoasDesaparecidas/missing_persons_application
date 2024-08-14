<?php
session_start();
function set_session($key, $value)
{
  $_SESSION[$key] = $value;
}
